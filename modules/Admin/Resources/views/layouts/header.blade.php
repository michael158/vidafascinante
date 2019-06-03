<div class="page-header navbar">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="{{ url('/admin/') }}">
                <img src="{{ url('img/logo2.png') }}" alt="logo" class="logo-default" width="180" style="margin-top: 20px">
            </a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE ACTIONS -->
        <!-- DOC: Remove "hide" class to enable the page header actions -->
        <div class="page-actions">
            <div class="btn-group">
                <button type="button" class="btn red-haze btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <span class="hidden-sm hidden-xs">Ações&nbsp;</span><i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ url('/admin/posts/create') }}">
                            <i class="icon-docs"></i> Novo Post </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/users/create') }}">
                            <i class="icon-user"></i> Novo Usuário </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/tags/create') }}">
                            <i class="icon-tag"></i> Nova Tag </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/categories/create') }}">
                            <i class="icon-flag"></i> Nova Categoria </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END PAGE ACTIONS -->
        <!-- BEGIN PAGE TOP -->
        @include('admin::layouts.top-navbar-right')
    </div>
    <!-- END HEADER INNER -->
</div>