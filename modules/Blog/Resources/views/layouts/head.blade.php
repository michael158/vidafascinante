<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#"
      xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{url('img/favicon.ico')}}"/>
    <title>Vida Fascinante</title>
    <meta name="description" content="Vida Fascinante é um blog de comportamento e estilo de vida que te anima a viver, conhecer e amar: beleza, entretenimento, a vida e muito mais, pois tudo é feito e mostrado com muito amor e carinho." />
    <link type="text/css" rel="stylesheet" href="{{url('css/bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{url('css/font-awesome.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{url('css/app.css')}}?v={{ env('APP_VERSION') }}"/>
    {{--<link type="text/css" rel="stylesheet" href="{{url('css/custom.css')}}"/>--}}

    <meta name="p:domain_verify" content="92110dd769398974ec952b22fe3fef08"/>

    @if(isset($post))
        <meta property="fb:app_id" content="603117079842547">
        <meta property="og:type" content="article">
        <meta property="og:url" content="{{ url($post->slug) }}">
        <meta property="og:title" content="{{ $post->title }} - Vida Fascinante">
        <meta property="og:image" content="{{ url('uploads/posts/cover/'. $post->image) }}">
        <meta property="og:description" content="{{ App\My\Resume::build()->intelligentResume($post->content , true)}} ">
        <meta property="article:author" content="{{ $post->user->name }} ">
        <meta property="article:published_time" content="{{ $post->activated_at }} ">

        <meta name="twitter:card" content="summary"/>
        <meta name="twitter:site" content="{{ url($post->slug) }}"/>
        <meta name="twitter:title" content="{{ $post->title }} - Vida Fascinante"/>
        <meta name="twitter:description" content="{{  App\My\Resume::build()->intelligentResume($post->content, true) }}"/>
        <meta name="twitter:image" content="{{ url('uploads/posts/'. $post->image) }}"/>
@endif
<!-- Chrome, Firefox OS, Opera and Vivaldi -->
    <meta name="theme-color" content="#45ADA8">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#45ADA8">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#45ADA8">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

    <!-- GOOGLE ADS [INICIO] -->
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-5673729830440008",
            enable_page_level_ads: true
        });
    </script>
    <!-- GOOGLE ADS [FIM] -->

    <!-- SMART LOOK [INICIO] -->
    <script type="text/javascript">
        window.smartlook||(function(d) {
            var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName('head')[0];
            var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
            c.charset='utf-8';c.src='//rec.smartlook.com/recorder.js';h.appendChild(c);
        })(document);
        smartlook('init', 'd55c9fbd34ba8bf134a7f68f88e4974ff8cbc529');
    </script>
    <!-- SMART LOOK [FIM] -->
</head>

