<body>
<header>
    <section id="menu">
        <nav class="navbar navbar-default nav-no-margin-bottom navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#menu-options" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse {{ Agent::isDesktop() ? 'text-center'  : null }}"
                     id="menu-options">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url() }}" class="with-circle">início</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle with-circle" data-toggle="dropdown">categorias <span
                                        class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @foreach($categories as $category)
                                    @if(!$category->main)
                                        <li><a href="{{ url('category/'. $category->name) }}">{{$category->name}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        @foreach($categories as $category)
                            @if($category->main)
                                <li><a href="{{ url('category/'. $category->name) }}"
                                       class="with-circle">{{$category->name}}</a></li>
                            @endif
                        @endforeach
                        <li><a href="{{ url('/contato/blog') }}">contato</a></li>
                    </ul>

                    {{--<ul class="nav navbar-nav navbar-right">--}}
                    {{--<li id="search">--}}
                    {{--<a href="#"><i class="fa fa-search fa-2x"></i></a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

    </section>

    @if(Agent::isDesktop())
        <section id="logo">
            <center>
                <a href="{{url()}}"><img src="{{url('img/nova_logo.png')}}"></a>
            </center>
        </section>
    @endif
</header>

<!-- MAIS RECENTES [INICIO] -->
@if(Agent::isDesktop())
    @include('blog::layouts.most-recent', $mostRecent)
@endif
<!-- MAIS RECENTES [FIM] -->

@yield('content')
<div class="scrollbox">
    <a href="#" class="btn scrollToTop"><i class="fa fa-angle-up fa-2x"></i> </a>
</div>

<!-- INSTAGRAM [INICIO] -->
@include('blog::layouts.instagram')
<!--INSTAGRAM [FIM] -->

<footer>
    <div class="container">
        <p class="text-center">{{date('Y')}} © <a href="{{ url() }}">vidafascinante.com</a> - Todos
            os
            direitos
            reservados</p>
    </div>
</footer>
@yield('javascript')
@if(Agent::isDesktop())
    <script type="text/javascript" src="{{ url("js/instagram.js?v=" . env('APP_VERSION')) }}"></script>
    <script>
        $LAB
            .script('{{url("js/instagram.js?v=" . env('APP_VERSION'))}}').wait()
            .script('{{url("js/pinterest.js?v=" . env('APP_VERSION'))}}').wait()
            .script('{{url("js/facebook.js?v=" . env('APP_VERSION'))}}');
    </script>
@endif
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-77729294-1', 'auto');
    ga('send', 'pageview');

</script>


<script id="dsq-count-scr" src="//vidafascinante.disqus.com/count.js" async></script>
</body>
</html>