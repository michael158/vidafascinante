<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
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
    <link href="{{ url('assets/admin/css/bootstrap-datetimepicker.min.css')  }}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <!-- END PAGE LEVEL PLUGIN STYLES -->
    <!-- BEGIN THEME STYLES -->[
    <link href="{{ url('assets/admin/css/components.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('assets/admin/css/plugins.css')  }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('assets/admin/css/layout.css')  }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('assets/admin/css/themes/light.css')  }}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{ url('assets/admin/css/custom.css')  }}" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <!-- <link rel="shortcut icon" href="favicon.ico"/> -->
</head>
<!-- END HEAD -->
<body class="page-sidebar-closed-hide-logo ">
<!-- BEGIN PAGE HEADER -->
@include('admin::layouts.header')
<!-- END PAGE HEADER -->

<!-- BEGIN SIDEBAR -->
@include('admin::layouts.sidebar')
<!-- BEGIN SIDEBAR -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        Widget settings form goes here
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn blue">Save changes</button>
                        <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- BEGIN PAGE CONTENT-->
        @if(session('message'))
            <div class="alert alert-{{session('message')['type']}}">
                <button class="close" data-close="alert"></button>
                <span> {{ session('message')['content'] }}</span>
            </div>
        @endif

        @yield('content')
    </div>
    <!-- END PAGE CONTENT-->
</div>



<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
@yield('javascript')
<script src="{{ url('assets/admin/js/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/js/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/js/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/js/jquery.cokie.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/js/jquery.uniform.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/js/jquery.bootpag.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ url('assets/admin/js/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/js/bootstrap-datetimepicker.pt-BR.js') }}" type="text/javascript"></script>


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
        Metronic.init(); // init metronic core componets
        Layout.init(); // init layout
        QuickSidebar.init() // init quick sidebar
        Demo.init();
        UIGeneral.init();
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
</html>