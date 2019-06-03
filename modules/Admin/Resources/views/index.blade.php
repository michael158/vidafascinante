@extends('admin::layouts.template')
@section('content')
    @include('admin::layouts.breadcrumb', $data = ['title' => 'Dashboard', 'action' => '#'])
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="actions" style="float: left;">
                        <a href="javascript:;" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"></i> Novo Post </a>
                        <a class="btn btn-icon-only btn-default btn-sm fullscreen" href="javascript:;"
                           data-original-title="" title="Tela Inteira">
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    @include('admin::layouts.baseScript')
@endsection