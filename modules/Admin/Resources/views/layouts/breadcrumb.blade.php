<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>{{ $data['title'] }}
            <small>{{ $data['action'] }}</small>
        </h1>
    </div>
    <!-- END PAGE TITLE -->
</div>
<!-- END PAGE HEAD -->
<!-- BEGIN PAGE BREADCRUMB -->
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="index.html">Dashboard</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="#">{{ $data['title']  }}</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="#">{{ $data['action'] }}</a>
    </li>
</ul>