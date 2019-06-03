@extends('admin::layouts.template')
@section('content')
    @include('admin::layouts.breadcrumb', $data = ['title' => 'Usuários', 'action' => 'Editar'])
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                </div>
                <div class="portlet-body">
                    @include('admin::layouts.validation')
                    <form id="form-users" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Nome</label>

                                <div class="input-icon">
                                    <i class="fa fa-bell-o"></i>
                                    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ empty($request->name) ? $user->name : $request->name }}" required="required">
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Foto de Perfil</label>

                                <div class="input-icon">
                                    <i class="fa fa-bell-o"></i>
                                    <input type="file" name="image" id="input-image" class="form-control"
                                           placeholder="Capa">
                                </div>
                            </div>
                        </div>

                        <div class="form-body {{ empty($user->image)  ? 'hide' : null }}">
                            <div class="form-group">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <img src="{{ url('uploads/users/'. $user->image) }}"
                                             class="img-responsive img-circle" id="img-preview" width="150">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Email</label>

                                <div class="input-icon">
                                    <i class="fa fa-bell-o"></i>
                                    <input type="email" name="email" class="form-control" value="{{ empty($request->email) ? $user->email : $request->email }}"
                                           placeholder="Email" required="required">
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Senha</label>

                                <div class="input-icon">
                                    <i class="fa fa-bell-o"></i>
                                    <input type="password" name="password" class="form-control" placeholder="Senha" value="{{  @$request->password }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Descrição</label>
                                <textarea name="description" class="form-control" required="required" rows="10">{{ empty($request->description) ? $user->description : $request->description }}</textarea>
                            </div>
                        </div>


                        @if(Auth()->user()->admin)
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label">Tipo de Conta</label>
                                    <select name="admin" class="form-control" required="required">
                                        <option value="0">Colaborador</option>
                                        @if(empty($request->admin))
                                            <option value="1" {{ $user->admin == 1 ?  'selected="selected"' : null }}>
                                                Administrador
                                            </option>
                                        @else
                                            <option value="1" {{ $request->admin == 1 ?  'selected="selected"' : null }}>
                                                Administrador
                                            </option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        @endif

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Facebook</label>
                                <div class="input-icon">
                                    <i class="fa fa-bell-o"></i>
                                    <input type="text" name="facebook" class="form-control" placeholder="Facebook" value="{{ empty($request->facebook) ? $user->facebook : $request->facebook }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Twitter</label>
                                <div class="input-icon">
                                    <i class="fa fa-bell-o"></i>
                                    <input type="text" name="twitter" class="form-control" placeholder="Twitter" value="{{ empty($request->twitter) ? $user->twitter : $request->twitter }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Youtube</label>
                                <div class="input-icon">
                                    <i class="fa fa-bell-o"></i>
                                    <input type="text" name="youtube" class="form-control" placeholder="Youtube" value="{{ empty($request->youtube) ? $user->youtube : $request->youtube }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Instagram</label>
                                <div class="input-icon">
                                    <i class="fa fa-bell-o"></i>
                                    <input type="text" name="instagram" class="form-control" placeholder="Instagram" value="{{ empty($request->instagram) ? $user->instagram : $request->instagram }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Google +</label>
                                <div class="input-icon">
                                    <i class="fa fa-bell-o"></i>
                                    <input type="text" name="google_plus" class="form-control" placeholder="Google +" value="{{ empty($request->google_plus) ? $user->google_plus : $request->google_plus }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn green">Salvar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    @include('admin::layouts.baseScript')
    @include('admin::users.script.create')
@endsection