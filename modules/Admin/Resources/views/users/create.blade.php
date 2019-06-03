@extends('admin::layouts.template')
@section('content')
    @include('admin::layouts.breadcrumb', $data = ['title' => 'Usuários', 'action' => 'Novo'])
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
                                    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ @$request->name }}" required="required">
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

                        <div class="form-body hide">
                            <div class="form-group">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <img src="" class="img-responsive img-circle" id="img-preview" width="150">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Email</label>

                                <div class="input-icon">
                                    <i class="fa fa-bell-o"></i>
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ @$request->email }}" required="required">
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Senha</label>

                                <div class="input-icon">
                                    <i class="fa fa-bell-o"></i>
                                    <input type="password" name="password" class="form-control" placeholder="Senha" value="{{ @$request->password }}" required="required">
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Descrição</label>
                                <textarea name="description" class="form-control" required="required" rows="10">{{ @$request->description }}</textarea>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Tipo de Conta</label>
                                <select name="admin" class="form-control" required="required">
                                    <option value="0" {{ @$request->admin == 0 ? 'selected="selected"' : null }}>Colaborador</option>
                                    <option value="1" {{ @$request->admin == 1 ? 'selected="selected"' : null }}>Administrador</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Facebook</label>
                                <div class="input-icon">
                                    <i class="fa fa-bell-o"></i>
                                    <input type="text" name="facebook" class="form-control" placeholder="Facebook" value="{{ @$request->facebook }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Twitter</label>
                                <div class="input-icon">
                                    <i class="fa fa-bell-o"></i>
                                    <input type="text" name="twitter" class="form-control" placeholder="Twitter" value="{{ @$request->twitter }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Youtube</label>
                                <div class="input-icon">
                                    <i class="fa fa-bell-o"></i>
                                    <input type="text" name="youtube" class="form-control" placeholder="Youtube" value="{{ @$request->youtube }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Instagram</label>
                                <div class="input-icon">
                                    <i class="fa fa-bell-o"></i>
                                    <input type="text" name="instagram" class="form-control" placeholder="Instagram" value="{{ @$request->instagram }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Google +</label>
                                <div class="input-icon">
                                    <i class="fa fa-bell-o"></i>
                                    <input type="text" name="google_plus" class="form-control" placeholder="Google +" value="{{ @$request->google_plus }}">
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