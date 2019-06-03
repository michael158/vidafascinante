@include('blog::layouts.head')
@extends('blog::layouts.template', $categories)
@section('content')
    <section id="content">
        <div class="container">
            @if(Agent::isDesktop())
                @include('blog::layouts.most-recent', $mostRecent)
            @endif
            <div class="row">
                <div class="col-lg-8 post-list">
                    @if(Agent::isDesktop())
                        <div id="top-advertising">
                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- Anuncio Topo -->
                            <ins class="adsbygoogle"
                                 style="display:block"
                                 data-ad-client="ca-pub-5673729830440008"
                                 data-ad-slot="9731345377"
                                 data-ad-format="auto"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                            @endif
                        </div>

                        <h3 style="margin-bottom: 30px">Resultados de busca por: <b>{{ app('request')->input('q') }}</b></h3>

                        @foreach($posts as $post)
                            <div class="post">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="title">
                                            <h3>
                                                <a href="{{ url($post['_source']['slug']) }}">{{$post['_source']['title']}}</a>
                                            </h3>
                                            <i>{{ App\My\Util::dateFormat($post['_source']['activated_at'])}} </i>

                                            <div class="information pull-right">
                                                <i class="fa fa-user"></i>
                                                <i>{{$post['_source']['author']}}</i>
                                                <div class="fb-like"
                                                     data-href="{{ url($post['_source']['slug']) }}"
                                                     data-layout="button_count" data-action="like"
                                                     data-show-faces="false"
                                                     data-share="false"></div>
                                            </div>
                                        </div>
                                        <div class="post-image">
                                            <a href="{{ url($post['_source']['slug']) }}"><img
                                                        src="{{ empty($post['_source']['image']) ? 'http://placehold.it/450x250' : url('uploads/posts/cover/'. $post['_source']['image']) }}"
                                                        class="img-responsive"></a>
                                        </div>
                                        <div class="content">
                                            <p>{!! $post['_source']['resume'] !!}</p>
                                        </div>

                                        <div class="tags">
                                            <?php $tags = $post['_source']['tags'];  ?>
                                            @foreach($tags as $tag)
                                                <a href="{{ url('tag/'. $tag['name']) }}"><span class="badge"><i
                                                                class="fa fa-tag"></i> {{$tag['name']}}</span></a>
                                            @endforeach
                                        </div>

                                        <div class="actions">
                                        <span class="pull-left" style="display: inline;">
                                            <i class="fa fa-comment-o" style="display: inline"></i>
                                       <a class="disqus-comment-count"
                                          href="{{ url($post['_source']['slug'].'#disqus_thread') }}"
                                          data-disqus-identifier="{{ $post['_id'] }}"></a>
                                        </span>

                                            <span class="pull-right"><a href="{{url( $post['_source']['slug'])}}"
                                                                        class="btn btn-primary">Continue Lendo...</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @if(count($posts) == 0)
                            <div class="alert alert-info text-center" role="alert">
                                <strong>Obs!</strong> Nenhum Post foi encontrado!
                                <br/><strong><a href="{{ url() }}"> Retornar para a pagina inicial</a></strong>
                            </div>
                        @endif
                </div>

                @if(Agent::isDesktop())
                    <div class="col-lg-4 visible-lg ">
                        @include('blog::layouts.user-description', $user)
                        @include('blog::layouts.facebook')
                        @include('blog::layouts.most-read', $mostRead)
                        @include('blog::layouts.instagram')
                        @include('blog::layouts.adversiting')
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
@section('javascript')
    @include('blog::layouts.baseScript')
    <script>
        $LAB
            .script('{{url("js/searchAnimate.js")}}').wait()
    </script>
@endsection
