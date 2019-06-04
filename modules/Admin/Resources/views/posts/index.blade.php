@extends('admin::layouts.template')
@section('content')
    @include('admin::layouts.breadcrumb', $data = ['title' => 'Posts', 'action' => 'Listar'])
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="actions" style="float: left;">
                        <a href="{{ url('admin/posts/create') }}" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"></i> Novo Post </a>
                        <a class="btn btn-icon-only btn-default btn-sm fullscreen" href="javascript:;"
                           data-original-title="" title="Tela Inteira">
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-bordered table-striped table-hover" style="margin-top: 10px">
                        <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Publicado em</th>
                            <th>Status</th>
                            <th>Visualizações</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td><a href="{{ url($post->slug) }}" target="_blank"> {{ $post->title }}</a></td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ !empty($post->activated_at) ? utf8_encode(App\My\Util::dateFormatTime($post->activated_at)) : 'Não ativado' }}</td>
                                <td>
                                    @if($post->activated_at > \Carbon\Carbon::now())
                                        <span class="badge badge-warning"> Programado</span>
                                        @else
                                        <span class="badge badge-{{ $post->active == 1 ? 'success' : 'info' }}"> {{ $post->active == 1? 'Ativo' : 'Revisão' }}</span>
                                    @endif
                                </td>

                                <td>{{ $post->views }}</td>
                                <td>
                                    @if(Auth()->user()->admin)
                                        <a href="{{ url('admin/posts/edit/'. $post->id) }}" class="btn btn-xs btn-success tooltips"
                                           title="Editar"><i class="fa fa-pencil"></i> </a>
                                        <a href="{{ url('admin/posts/activate/'. $post->id) }}" class="btn btn-xs {{ $post->active ? 'btn-default' : 'btn-info' }} tooltips"
                                           title="Ativar Post" {{ $post->active ? 'disabled="disabled"' : null }}><i class="fa fa-check"></i> </a>
                                        <a href="#modal-delete" data-href="{{ url('admin/posts/delete/'. $post->id) }}"
                                           data-toggle="modal" class="btn btn-xs btn-danger tooltips btn-delete" title="Excluir"><i
                                                    class="fa fa-close"></i> </a>

                                        @elseif($post->users_id == Auth()->user()->id)
                                            <a href="{{ url('admin/posts/edit/'. $post->id) }}" class="btn btn-xs btn-success tooltips"
                                               title="Editar"><i class="fa fa-pencil"></i> </a>
                                            <a href="{{ url('admin/posts/activate/'. $post->id) }}" class="btn btn-xs {{ $post->active ? 'btn-default' : 'btn-info' }} tooltips"
                                               title="Ativar Post" {{ $post->active ? 'disabled="disabled"' : null }}><i class="fa fa-check"></i> </a>
                                            <a href="#modal-delete" data-href="{{ url('admin/posts/delete/'. $post->id) }}"
                                               data-toggle="modal" class="btn btn-xs btn-danger tooltips btn-delete" title="Excluir"><i
                                                        class="fa fa-close"></i> </a>

                                    @endif

                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    <p>Mostrando os registros de <b>{{$posts->firstItem()}}</b> até <b>{{$posts->lastItem()}}</b> do
                        total de <b>{{$posts->total()}}</b> registros</p>
                    <div class="pagination">
                        {!! $posts->render() !!}
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