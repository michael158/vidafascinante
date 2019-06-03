@extends('admin::layouts.template')
@section('content')
    @include('admin::layouts.breadcrumb', $data = ['title' => 'Categorias', 'action' => 'Editar'])
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                </div>
                <div class="portlet-body">
                    @include('admin::layouts.validation')
                    <form id="form-categories"  method="POST">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Nome</label>
                                <div class="input-icon">
                                    <i class="fa fa-bell-o"></i>
                                    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ empty($request->name) ? $category->name : $request->name }}" required="required">
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Menu Principal</label>
                                <select name="main" class="form-control" required="required">
                                    <option value="0">Não</option>
                                    @if(empty($request->admin))
                                        <option value="1" {{ $category->main == 1 ?  'selected="selected"' : null }}>
                                            Sim
                                        </option>
                                    @else
                                        <option value="1" {{ $request->main == 1 ?  'selected="selected"' : null }}>
                                            Sim
                                        </option>
                                    @endif
                                </select>
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
    @include('admin::categories.script.create')
@endsection