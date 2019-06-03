@extends('admin::layouts.template')
@section('content')
    @include('admin::layouts.breadcrumb', $data = ['title' => 'Tags', 'action' => 'Novo'])
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                </div>
                <div class="portlet-body">
                  @include('admin::layouts.validation')
                    <form id="form-tags" method="POST">
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
    @include('admin::tags.script.create')
@endsection