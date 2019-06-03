<?php namespace Modules\Admin\Http\Controllers;

use Illuminate\Database\DatabaseManager;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Tag;
use Modules\Admin\Validators\TagValidator;
use Pingpong\Modules\Json;
use Pingpong\Modules\Routing\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Symfony\Component\HttpFoundation\Response;

class TagsController extends Controller
{

    protected $db;
    protected $validator;

    public function __construct(DatabaseManager $db, TagValidator $validator)
    {
        $this->db = $db;
        $this->validator = $validator;
    }

    public function index()
    {
        $tags = Tag::orderBy('id', 'desc')->paginate(10);
        return view('admin::tags.index', compact('tags'));
    }

    public function json(){
        $tags = Tag::orderBy('id', 'desc')->get(['name as text', 'id as value']);
        return \Illuminate\Support\Facades\Response::json($tags);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                $model = new Tag();
                $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
                $model->newTag($request->all());
            } catch (ValidatorException $e) {
                $errors = $e->getMessageBag()->toArray();
                return view('admin::tags.create',compact('request'))->with(['errors' => $errors]);
            }
            return redirect('admin/tags')->with('message', ['content' => 'Registro criado com sucesso!', 'type' => 'success']);
        }
        return view('admin::tags.create');
    }

    public function edit($id, Request $request)
    {
        $tag = Tag::find($id);
        if ($request->isMethod('post')) {
            try {
                $mPost = new Tag();
                $data = $request->all();
                $data['name']  =  $data['name'] == $tag->name ? $data['name'].$id : $data['name'];
                $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
                $mPost->editTag($request->all(), $tag);
            } catch (ValidatorException $e) {
                $errors = $e->getMessageBag()->toArray();
                return view('admin::tags.edit',compact('tag', 'request'))->with(['errors' => $errors]);
            }

            return redirect('admin/tags')->with('message', ['content' => 'Registro editado com sucesso!', 'type' => 'success']);
        }
        return view('admin::tags.edit', compact('tag'));
    }

    public function delete($id){
        try{
            $mPost = Tag::find($id);
            $mPost->delete();
        }catch (\Exception $e){
            return redirect('admin/tags')->with('message', ['content' => 'Não foi possivel excluir o registro!', 'type' => 'danger']);
        }
        return redirect('admin/tags')->with('message', ['content' => 'Registro excluido com sucesso!', 'type' => 'success']);
    }


}