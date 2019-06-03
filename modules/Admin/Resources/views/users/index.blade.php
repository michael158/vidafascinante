@extends('admin::layouts.template')
@section('content')
@include('admin::layouts.breadcrumb', $data = ['title' => 'Usuários', 'action' => 'Listar'])
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="actions" style="float: left;">
                        @if(Auth()->user()->admin)
                            <a href="{{ url('admin/users/create') }}" class="btn btn-default btn-sm">
                                <i class="fa fa-plus"></i> Novo Usuário </a>
                        @endif
                        <a class="btn btn-icon-only btn-default btn-sm fullscreen" href="javascript:;"
                           data-original-title="" title="Tela Inteira">
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-bordered table-striped table-hover" style="margin-top: 10px">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Criado Em</th>
                            <th>Tipo de Conta</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ utf8_encode(App\My\Util::dateFormat($user->created_at)) }}</td>
                                <td>{{ $user->admin ? 'Administrador' : 'Colaborador' }}</td>
                                <td>
                                    @if(Auth()->user()->admin)
                                        <a href="{{url('admin/users/edit/'. $user->id)}}" title="Editar" class="btn btn-xs btn-success tooltips"><i class="fa fa-pencil"></i> </a>
                                        <a href="#modal-delete" data-toggle="modal" data-href="{{url('admin/users/delete/'. $user->id)}}" class="btn btn-xs btn-danger tooltips btn-delete" title="Excluir"><i class="fa fa-close"></i> </a>
                                        @elseif(Auth()->user()->id == $user->id)
                                            <a href="{{url('admin/users/edit/'. $user->id)}}" title="Editar" class="btn btn-xs btn-success tooltips"><i class="fa fa-pencil"></i> </a>
                                            <a href="#modal-delete" data-toggle="modal" data-href="{{url('admin/users/delete/'. $user->id)}}" class="btn btn-xs btn-danger tooltips btn-delete" title="Excluir"><i class="fa fa-close"></i> </a>
                                    @endif
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    <p>Mostrando os registros de <b>{{$users->firstItem()}}</b> até <b>{{$users->lastItem()}}</b> do total de <b>{{$users->total()}}</b> registros</p>
                    <div class="pagination">
                        {{ $users->render()  }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    @include('admin::layouts.baseScript')
    @include('admin::layouts.modal-delete')
@endsection
