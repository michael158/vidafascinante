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
                    {{--<div class="row">--}}
                        {{--<div class="col-md-8">--}}

                            {{--<center>--}}
                                {{--<sync-loader v-if="!loaded" style="margin-bottom: 100px; margin-top: 100px" color="#0D9890"></sync-loader>--}}
                            {{--</center>--}}

                            {{--<div class="post" v-for="post in posts.rows">--}}
                                {{--<div class="panel panel-default">--}}
                                    {{--<div class="panel-body">--}}
                                        {{--<div class="title text-center">--}}
                                  {{--<span class="categorie">--}}
                                    {{--{{ post.Category.name }}--}}
                                  {{--</span>--}}
                                            {{--<h2><a :href="post.slug">{{ post.title }}</a></h2>--}}
                                            {{--<span class="date">{{ formatDate(post.activated_at) }}</span>--}}
                                        {{--</div>--}}

                                        {{--<div class="post-image">--}}
                                            {{--<a :href="post.slug"><img--}}
                                                        {{--:src="'http://vidafascinante.com/uploads/posts/cover/' + post.image"--}}
                                                        {{--class="img-responsive"></a>--}}
                                        {{--</div>--}}

                                        {{--<div class="content" v-html="post.resume">--}}

                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<paginator :options="paginator"></paginator>--}}
                        {{--</div>--}}

                        {{--<side-right></side-right>--}}
                    {{--</div>--}}
                    @foreach($posts as $post)
                        <div class="post">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="title text-center">
                                        <span class="categorie">
                                            {{ $post->categorie->name }}
                                        </span>

                                        <h2><a href="{{ url($post->slug) }}">{{$post->title}}</a>
                                            @if(Auth::check())
                                                @if(!$post->active)
                                                    <span class="badge badge-info">Revisão</span>
                                                @endif
                                                @if($post->activated_at > \Carbon\Carbon::now())
                                                    <span class="badge badge-info">Revisão</span>
                                                    <span class="badge badge-warning">Programado</span>
                                                @endif
                                            @endif
                                        </h2>

                                        <i>{{ !empty($post->activated_at) ? utf8_encode(App\My\Util::dateFormat($post->activated_at)) : 'Não ativado'}} </i>

                                        {{--<div class="information pull-right">--}}
                                            {{--<i class="fa fa-user"></i>--}}
                                            {{--<i>{{$post->user->name}}</i>--}}
                                            {{----}}
                                            {{--<div class="fb-like"--}}
                                                 {{--data-href="{{ url($post->slug) }}"--}}
                                                 {{--data-layout="button_count" data-action="like"--}}
                                                 {{--data-show-faces="false"--}}
                                                 {{--data-share="false"></div>--}}
                                        {{--</div>--}}
                                    </div>
                                    <div class="post-image">
                                        <a href="{{ url($post->slug) }}"><img
                                                    src="{{ env('APP_ENV') == 'production' ? url('uploads/posts/cover/'. $post->image) : env('APP_URL') . '/uploads/posts/cover/'. $post->image  }}"
                                                    class="img-responsive"></a>
                                    </div>
                                    <div class="content">
                                        <p>{!! $post->resume !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="text-center">
                        {!! $posts->render() !!}
                    </div>

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