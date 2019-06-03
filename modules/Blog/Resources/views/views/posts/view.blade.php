@include('blog::layouts.head' , $post)
@extends('blog::layouts.template', $categories)
@section('content')
    <section id="content">
        <div class="container">
            @if(Auth::check())
                @if(!$post->active)
                    <div class="alert alert-warning text-center" role="alert">
                        <strong>Atenção!</strong> Este post está em modo de <b>revisão</b> e só será visivel ao público
                        quando for <b>ativado para visualização!</b>
                    </div>
                @endif

                @if($post->activated_at > \Carbon\Carbon::now())
                    <div class="alert alert-info text-center" role="alert">
                        <strong>Post programado!</strong> Este post está programado para ser postado em:
                        <strong>{{ \App\My\Util::dateFormatTime($post->activated_at) }}</strong>
                    </div>
                @endif
            @endif

            <div class="row">
                <div class="col-lg-8">
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
                    <div class=" post-list">
                        <div class="post">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="title text-center">
                                        <span class="categorie">
                                            {{ $post->categorie->name }}
                                        </span>
                                        <h2>
                                            {{$post->title}}
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
                                        {{--</div>--}}
                                    </div>

                                    <div class="post-image">
                                        <img itemprop="image" src="{{ env('APP_ENV') == 'production' ?  url('uploads/posts/cover/'. $post->image) : env('APP_URL') . '/uploads/posts/cover/'. $post->image  }}"
                                             class="img-responsive">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="content">
                                                <article>
                                                    <p>{!!$post->content !!}</p>
                                                </article>

                                                @if(Agent::isDesktop())
                                                    <div class="row">
                                                        <div class="col-lg-12">

                                                            <div id="top-advertising">
                                                                <script async
                                                                        src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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

                                                        </div>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tags" style="padding: 10px">
                                        <?php $tags = $post->tags->sortBy('name')  ?>
                                        @foreach($tags as $tag)
                                            <a href="{{ url('tag/'. $tag->name) }}"><span class="badge"><i
                                                            class="fa fa-tag"></i> {{$tag->name}}</span></a>
                                        @endforeach
                                    </div>


                                    <hr>
                                    <div class="social newtork" style="padding: 10px">
                                        <div class="fb-like"
                                             data-href="{{ url($post->slug) }}"
                                             data-layout="button_count" data-action="like" data-show-faces="true"
                                             data-share="true"></div>

                                        <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
                                        <span class="pull-right">
                                       <a href="{{ url($post->slug.'#disqus_thread') }}"
                                          data-disqus-identifier="{{ $post->id }}"></a></span>
                                    </div>

                                    <hr>
                                    <div class="user-description" style="padding-right: 5px">
                                        <div class="row">
                                            <div class="col-lg-3 col-xs-12">
                                                <center>
                                                    <img src="{{ env('APP_ENV') == 'production' ? url('uploads/users/'. $post->user->image) : env('APP_URL') . '/uploads/users/'. $post->user->image }}"
                                                         class="img-responsive img-circle" style="max-width: 150px">
                                                </center>
                                            </div>
                                            <div class="col-lg-9 col-xs-12">
                                                <h3 class="center-on-xs center-on-md author-title">{{ $post->user->name }}
                                                    <div class="social-lg visible-lg-inline" style="display: inline">
                                                        <a href="{{ !empty($post->user->facebook) ? $post->user->facebook : '# ' }}" {{ !empty($post->user->facebook) ? 'target="_blank"' : null }}><i
                                                                    class="fa fa-facebook"></i></a>
                                                        <a href="{{ !empty($post->user->twitter) ? $post->user->twitter : '# ' }}" {{ !empty($post->user->twitter) ? 'target="_blank"' : null }}><i
                                                                    class="fa fa-twitter"></i></a>
                                                        <a href="{{ !empty($post->user->youtube) ? $post->user->youtube : '# ' }}" {{ !empty($post->user->youtube) ? 'target="_blank"' : null }}><i
                                                                    class="fa fa-youtube-play"></i></a>
                                                        <a href="{{ !empty($post->user->instagram) ? $post->user->instagram : '# ' }}" {{ !empty($post->user->instagram) ? 'target="_blank"' : null }}><i
                                                                    class="fa fa-instagram"></i></a>
                                                        <a href="{{ !empty($post->user->google_plus) ? $post->user->google_plus : '# ' }}" {{ !empty($post->user->google_plus) ? 'target="_blank"' : null }}><i
                                                                    class="fa fa-google-plus"></i></a>
                                                        <a href="#"><i
                                                                    class="fa fa-snapchat-square"></i></a>
                                                    </div>
                                                </h3>
                                                <p class="text-justify-on-xs center-on-md center-on-xs description">{!! $post->user->description !!}</p>

                                                <div class="social center-on-md center-on-xs visible-md visible-sm visible-xs">
                                                    <a href="{{ !empty($post->user->facebook) ? $post->user->facebook : '# ' }}" {{ !empty($post->user->facebook) ? 'target="_blank"' : null }}><i
                                                                class="fa fa-facebook fa-2x"></i></a>
                                                    <a href="{{ !empty($post->user->twitter) ? $post->user->twitter : '# ' }}" {{ !empty($post->user->twitter) ? 'target="_blank"' : null }}><i
                                                                class="fa fa-twitter fa-2x"></i></a>
                                                    <a href="{{ !empty($post->user->youtube) ? $post->user->youtube : '# ' }}" {{ !empty($post->user->youtube) ? 'target="_blank"' : null }}><i
                                                                class="fa fa-youtube-play fa-2x"></i></a>
                                                    <a href="{{ !empty($post->user->instagram) ? $post->user->instagram : '# ' }}" {{ !empty($post->user->instagram) ? 'target="_blank"' : null }}><i
                                                                class="fa fa-instagram fa-2x"></i></a>
                                                    <a href="{{ !empty($post->user->google_plus) ? $post->user->google_plus : '# ' }}" {{ !empty($post->user->google_plus) ? 'target="_blank"' : null }}><i
                                                                class="fa fa-google-plus fa-2x"></i></a>
                                                    <a href="#"><i
                                                                class="fa fa-snapchat-square fa-2x"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="recommended" style="margin-top: 20px; padding: 10px">
                                        <h4>Você tambem vai gostar de:</h4>

                                        @foreach($recommended as $recommended)
                                            <div class="col-md-3" style="padding: 5px">
                                                <div class="thumbnail"
                                                     style="padding: 0!important;">
                                                    <img src="{{ env('APP_ENV') == 'production' ? url('uploads/posts/cover/'. $recommended->image) : env('APP_URL') . '/uploads/posts/cover/'. $recommended->image }}">
                                                    <div class="caption">
                                                        <h5>
                                                            <a href="{{ url($recommended->slug) }}">{{ $recommended->title }}</a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($post->active)
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3>Comentários</h3>

                                <div id="disqus_thread"></div>
                                <script>
                                    /**
                                     * RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                     * LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
                                     */
                                    var disqus_config = function () {
                                        this.page.url = '{{ url($post->slug) }}'; // Replace PAGE_URL with your page's canonical URL variable
                                        this.page.identifier = '{{ $post->id }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                        this.page.title = '{{ $post->title }}';
                                    };
                                    (function () { // DON'T EDIT BELOW THIS LINE
                                        var d = document, s = d.createElement('script');

                                        s.src = '//vidafascinante.disqus.com/embed.js';

                                        s.setAttribute('data-timestamp', +new Date());
                                        (d.head || d.body).appendChild(s);
                                    })();

                                </script>

                                <noscript>Please enable JavaScript to view the <a
                                            href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a>
                                </noscript>
                            </div>
                        </div>
                    @endif
                </div>
                @if(Agent::isDesktop())
                    <div class="col-lg-4 visible-lg" id="side-right">
                        @include('blog::layouts.user-description', $user)
                        @include('blog::layouts.facebook')
                        @include('blog::layouts.most-read')
                        @include('blog::layouts.adversiting ')
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
@section('javascript')
    @include('blog::layouts.baseScript')
    <script async type="text/javascript" src="{{url('js/twitter.js')}}"></script>
    <script async type="text/javascript" src="{{url('js/facebook.js')}}"></script>
@endsection