@extends('admin::layouts.template')
@section('content')
    @include('admin::layouts.breadcrumb', $data = ['title' => 'Categorias', 'action' => 'Listar'])
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="actions" style="float: left;">
                        <a href="{{ url('admin/categories/create') }}" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"></i> Nova Categoria </a>
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
                            <th>Menu Principal</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $categorie)
                            <tr>
                                <td>{{ $categorie->name }}</td>
                                <td>{{ $categorie->main == 1 ? 'Sim' : 'Não' }}</td>
                                <td>
                                    <a href="{{ url('admin/categories/edit/'. $categorie->id) }}" class="btn btn-xs btn-success tooltips" title="Editar"><i class="fa fa-pencil"></i> </a>
                                    <a href="#modal-delete" data-href="{{ url('admin/categories/delete/'. $categorie->id) }}" data-toggle="modal" class="btn btn-xs btn-danger tooltips btn-delete" title="Excluir"><i class="fa fa-close" ></i> </a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                   <p>Mostrando os registros de <b>{{$categories->firstItem()}}</b> até <b>{{$categories->lastItem()}}</b> do total de <b>{{$categories->total()}}</b> registros</p>
                    <div class="pagination">
                        {!! $categories->render() !!}
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