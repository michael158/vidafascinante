<html lang="en"><!--<![endif]--><!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>Vida Fascinante | Admin Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="{{ url('assets/admin/css/font-awesome.min.css')  }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('assets/admin/css/simple-line-icons.min.css')  }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('assets/admin/css/bootstrap.min.css')  }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('assets/admin/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('assets/admin/css/bootstrap-switch.min.css')  }}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <link href="{{ url('assets/admin/css/jquery.gritter.css')  }}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGIN STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="{{ url('assets/admin/css/components.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('assets/admin/css/plugins.css')  }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('assets/admin/css/layout.css')  }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('assets/admin/css/themes/light.css')  }}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{ url('assets/admin/css/custom.css')  }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('assets/admin/css/login-soft.css')  }}" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <!-- <link rel="shortcut icon" href="favicon.ico"/> -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login" cz-shortcut-listen="true">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="index.html">
        <img src="{{url('img/logo-4.png')}}" alt="" width="300">
    </a>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="{{url('admin/auth/login')}}" method="post">
        {!! csrf_field() !!}
        <h3 class="form-title text-center">Administração</h3>
        @if(session('message'))
            <div class="alert alert-danger">
                <button class="close" data-close="alert"></button>
                <span> {{ session('message') }}</span>
            </div>
        @endif
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email"
                       name="email">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Senha"
                       name="password">
            </div>
        </div>
        <div class="form-actions" style="padding-bottom: 45px">
            <button type="submit" class="btn blue pull-right">
                Entrar
            </button>
        </div>
    </form>
    <!-- END LOGIN FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
    {{ date('Y')}} © <a href="http://www.vidafascinante.com" target="_blank">Vida Fascinante</a> - Todos os direitos
    reservados.
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
{{--<script src="../../assets/global/plugins/respond.min.js"></script>--}}
{{--<script src="../../assets/global/plugins/excanvas.min.js"></script>--}}
<![endif]-->
<script src="{{ url('assets/admin/js/jquery.min.js') }}" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{ url('assets/admin/js/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/js/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/js/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/js/jquery.cokie.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/js/jquery.uniform.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/js/jquery.bootpag.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/js/jquery.backstretch.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<script src="{{ url('assets/admin/js/jquery.gritter.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ url('assets/admin/js/metronic.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/js/layout.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/js/quick-sidebar.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/js/demo.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/js/ui-general.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
//        Login.init();
        Demo.init();
        // init background slide images
        $.backstretch([
                    '{{ url('assets/admin/media/bg/1.jpg') }}',
                    '{{ url('assets/admin/media/bg/2.jpg') }}',
                    '{{ url('assets/admin/media/bg/3.jpg') }}',
                    '{{ url('assets/admin/media/bg/4.jpg') }}',
                ], {
                    fade: 1000,
                    duration: 8000
                }
        );
    });
</script>
<!-- END JAVASCRIPTS -->

<!-- END BODY -->
</body>
</html>