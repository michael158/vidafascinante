<?php namespace Modules\Admin\Http\Controllers;

use Illuminate\Database\DatabaseManager;
use Modules\Admin\Entities\Category;
use Illuminate\Http\Request;
use Modules\Admin\Validators\CategoryValidator;
use Pingpong\Modules\Routing\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class CategoriesController extends Controller
{

    protected $db;
    protected $validator;

    public function __construct(DatabaseManager $db, CategoryValidator $validator)
    {
        $this->db = $db;
        $this->validator = $validator;
    }

    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);

        return view('admin::categories.index', compact('categories'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                $model = new Category();
                $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
                $model->newCateogory($request->all());
            } catch (ValidatorException $e) {
                $errors = $e->getMessageBag()->toArray();
                return view('admin::categories.create',compact('request'))->with(['errors' => $errors]);
            }
            return redirect('admin/categories')->with('message', ['content' => 'Registro criado com sucesso!', 'type' => 'success']);
        }
        return view('admin::categories.create');
    }

    public function edit($id, Request $request)
    {
        $category = Category::find($id);

        if ($request->isMethod('post')) {
            try {
                $mPost = new Category();
                $data = $request->all();
                $data['name']  =  $data['name'] == $category->name ? $data['name'].$id : $data['name'];
                $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
                $mPost->editCategory($request->all(), $category);
            } catch (ValidatorException $e) {
                $errors = $e->getMessageBag()->toArray();
                return view('admin::categories.edit',compact('category', 'request'))->with(['errors' => $errors]);
            }

            return redirect('admin/categories')->with('message', ['content' => 'Registro editado com sucesso!', 'type' => 'success']);
        }
        return view('admin::categories.edit', compact('category'));
    }

    public function delete($id){
        try{
            $mPost = Category::find($id);
            $mPost->delete();
        }catch (\Exception $e){
            return redirect('admin/categories')->with('message', ['content' => 'Não foi possivel excluir o registro!', 'type' => 'danger']);
        }
        return redirect('admin/categories')->with('message', ['content' => 'Registro excluido com sucesso!', 'type' => 'success']);
    }


}