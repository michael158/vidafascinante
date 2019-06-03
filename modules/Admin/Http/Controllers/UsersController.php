<?php namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Entities\User;
use Modules\Admin\Validators\UserValidator;
use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class UsersController extends Controller {

	protected $validator;

	public function __construct(UserValidator $validator)
	{
		$this->validator = $validator;
	}

	public function index()
	{
		$users = User::orderBy('id', 'desc')->paginate(10);
		return view('admin::users.index', compact('users'));
	}


	public function create(Request $request){
		if($request->isMethod('post')){
			try{
				$mUser = new User();
				$this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
				$mUser->newUser($request->all());
			}catch (ValidatorException $e){
				$errors = $e->getMessageBag()->toArray();
				return view('admin::users.create', compact('request'))->with(['errors' => $errors]);
			}

			return redirect('admin/users')->with('message', ['content' => 'Registro criado com sucesso!', 'type' => 'success']);

		}

		return view('admin::users.create');
	}

	public function edit($id ,Request $request){
		$user = User::find($id);

		if($request->isMethod('post')){
			try{
				$mUser = new User();
				$data = $request->all();
				$data['email']  =  $data['email'] == $user->email ? $data['email'].$id : $data['email'];
                $saveData = $request->all();

				if(!isset($data['admin'])){
				    $data['admin'] = 0;
				    $saveData['admin'] = 0;
                }

				$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
				$mUser->editUser($saveData, $user);
			}catch (ValidatorException $e){
				$errors = $e->getMessageBag()->toArray();
				return view('admin::users.edit', compact('user','request'))->with(['errors' => $errors]);
			}

			return redirect('admin/users')->with('message', ['content' => 'Registro criado com sucesso!', 'type' => 'success']);
		}

		return view('admin::users.edit', compact('user'));

	}

	public function delete($id){
		try{
			$mPost = User::find($id);
			$mPost->delete();
		}catch (\Exception $e){
			return redirect('admin/users')->with('message', ['content' => 'Não foi possivel excluir o registro!', 'type' => 'danger']);
		}
		return redirect('admin/users')->with('message', ['content' => 'Registro excluido com sucesso!', 'type' => 'success']);
	}
	
}