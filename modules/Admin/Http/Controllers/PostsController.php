<?php namespace Modules\Admin\Http\Controllers;

use App\Services\ElasticSearch\ElasticSearchService;
use App\Services\PostsSearchService;
use Illuminate\Database\DatabaseManager;
use Modules\Admin\Entities\Category;
use Modules\Admin\Entities\Post;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Tag;
use Modules\Admin\Validators\PostValidator;
use Pingpong\Modules\Routing\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class PostsController extends Controller
{

    protected $validator;

    public function __construct(PostValidator $validator)
    {
        $this->validator = $validator;
    }

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('admin::posts.index', compact('posts'));
    }

    public function create(Request $request)
    {
        $tags = Tag::build()->toSelect();
        $categories = Category::build()->toSelect();
        if ($request->isMethod('post')) {
            try {
                $model = new Post();
                $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
                $model->newPost($request->all());

            } catch (ValidatorException $e) {
                $errors = $e->getMessageBag()->toArray();
                return view('admin::posts.create', compact('tags', 'categories', 'request'))->with(['errors' => $errors]);
            }
            return redirect('admin/posts')->with('message', ['content' => 'Registro criado com sucesso!', 'type' => 'success']);
        }
        return view('admin::posts.create', compact('tags', 'categories'));
    }

    public function edit($id, Request $request)
    {
        $post = Post::find($id);
        $tags = Tag::build()->toSelect();
        $categories = Category::build()->toSelect();

        if ($request->isMethod('post')) {
            try {
                $mPost = new Post();
                $data = $request->all();
                $data['title'] = $data['title'] == $post->title ? $data['title'] . $id : $data['title'];
                $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
                $mPost->editPost($request->all(), $post);
            } catch (ValidatorException $e) {
                $errors = $e->getMessageBag()->toArray();
                return view('admin::posts.edit', compact('post', 'tags', 'categories', 'request'))->with(['errors' => $errors]);
            }

            return redirect('admin/posts')->with('message', ['content' => 'Registro editado com sucesso!', 'type' => 'success']);
        }
        return view('admin::posts.edit', compact('post', 'tags','categories'));
    }

    public function delete($id)
    {
        try {
            $mPost = Post::find($id);
            $mPost->delete();
        } catch (\Exception $e) {
            return redirect('admin/posts')->with('message', ['content' => 'Não foi possivel excluir o registro!', 'type' => 'danger']);
        }
        return redirect('admin/posts')->with('message', ['content' => 'Registro excluido com sucesso!', 'type' => 'success']);
    }

    public function activate($id)
    {
        try {
                $mPost = new Post();
                $mPost->activate($id);
                $post = Post::find($id);
            } catch (\Exception $e) {
            return redirect('admin/posts')->with('message', ['content' => $e->getMessage(), 'type' => 'danger']);
        }
        return redirect('admin/posts')->with('message', ['content' => 'Post ativado com sucesso!', 'type' => 'success']);
    }


}