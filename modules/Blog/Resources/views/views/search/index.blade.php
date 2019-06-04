@include('blog::layouts.head')
@extends('blog::layouts.template', $categories)
@section('content')
    <section id="content">
        <div class="container">
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
                        </div>
                    @endif

                    <h3>Resultados para a busca: {{ request()->get('q') }}</h3>

                    @foreach($posts as $post)
                        <div class="post">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="title text-center">
                                        <span class="categorie">
                                            {{ $post['_source']['categorie']['name'] }}
                                        </span>

                                        <h2><a href="{{ url($post['_source']['slug']) }}">{{$post['_source']['title']}}</a></h2>
                                        <i>{{  utf8_encode(App\My\Util::dateFormat($post['_source']['activated_at'])) }} </i>
                                    </div>


                                    <div class="post-image">
                                        <a href="{{ url($post['_source']['slug']) }}"><img
                                                    src="{{ env('APP_ENV') == 'production' ? url('uploads/posts/cover/'. $post['_source']['image']) : env('APP_URL') . '/uploads/posts/cover/'.$post['_source']['image']  }}"
                                                    class="img-responsive"></a>
                                    </div>
                                    <div class="content">
                                        <p>{!! $post['_source']['resume'] !!}</p>
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
                    <div class="col-lg-4 visible-lg" id="side-right">
                        @include('blog::layouts.user-description', $user)
                        @include('blog::layouts.facebook')
                        @include('blog::layouts.most-read')
                        @include('blog::layouts.adversiting')
                    </div>
                @endif

            </div>
        </div>
    </section>

@endsection
@section('javascript')
    @include('blog::layouts.baseScript')
@endsection