@extends('admin::layouts.template')
@section('content')
    @include('admin::layouts.breadcrumb', $data = ['title' => 'Posts', 'action' => 'Editar'])
    <link rel="stylesheet" href="{{  url('assets/admin/plugins/select2/select2.min.css') }}">
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                </div>
                <div class="portlet-body">
                    @include('admin::layouts.validation')
                    <form id="form-posts" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Título</label>
                                <div class="input-icon">
                                    <i class="fa fa-bell-o"></i>
                                    <input type="text" name="title" class="form-control"
                                           value="{{ empty($request->title) ? $post->title : $request->title }}"
                                           placeholder="Título" required="required">
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Imagem Capa</label>
                                <div class="input-icon">
                                    <i class="fa fa-bell-o"></i>
                                    <input type="file" name="capa" id="input-image" class="form-control"
                                           placeholder="Capa">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-body {{ empty($post->image) ? 'hide' : null }}">
                                    <div class="form-group">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <img src="{{ url('uploads/posts/cover/'. $post->image) }}"
                                                     class="img-responsive"
                                                     id="img-preview">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Categoria</label>
                                <select name="category_id" class="form-control" required="required">
                                    <option value="">-- Selecione --</option>
                                    @foreach($categories as $item)
                                        @if(empty($request->category_id))
                                            <option value="{{ $item->id }}" {{ $item->id == $post->category_id ? 'selected="selected"' : null }}>{{ $item->name }}</option>
                                        @else
                                            <option value="{{ $item->id }}" {{ $item->id == $request->category_id ? 'selected="selected"' : null }}>{{ $item->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Tags</label>
                                <select name="tags[]" class="form-control" multiple id="tags" required="required">
                                    @foreach($tags as $key => $item)
                                        {{ $selected = null }}
                                        @if(empty($request->tags))
                                            @foreach($post->tags as $tag)
                                                @if($item->id == $tag->id)
                                                    {{ $selected = 'selected="selected"'}}
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach($request->tags as $tag)
                                                @if($item->id == $tag)
                                                    {{ $selected = 'selected="selected"'}}
                                                @endif
                                            @endforeach
                                        @endif
                                        <option value="{{ $item->id }}" {{ $selected }}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label">Agendar Post?</label>
                                    <div class="input-icon">
                                        <i class="fa fa-calendar"></i>
                                        <input type="text" name="schedule_date" value="{{ $post->active ? \App\My\Util::dateFormatTime($post->activated_at) : null }}" class="form-control  datepicker">
                                    </div>
                                </div>
                            </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Conteudo</label>
                                <textarea rows="20" name="content" class="form-control"
                                          id="post-editor">{{ empty($request->content) ? $post->content : $request->content }}</textarea>
                            </div>
                        </div>
                        <div class="form-actions text-center" style="margin-top: 20px">
                            <button type="submit" class="btn green" style="width: 60%">Salvar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    @include('admin::layouts.baseScript')
    @include('admin::posts.script.create')
    <script type="text/javascript" src="{{ url('assets/admin/plugins/select2/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/admin/plugins/tinymce/tinymce.min.js') }}"></script>
@endsection