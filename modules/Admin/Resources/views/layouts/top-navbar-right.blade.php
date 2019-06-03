<div class="page-top">
    <div class="top-menu">
        <ul class="nav navbar-nav pull-right">
            <li class="dropdown dropdown-user dropdown-dark">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<span class="username username-hide-on-mobile">
						{{ Auth::user()->name }} </span>

                    @if(!empty(Auth::user()->image))
                        <img alt="{{ Auth::user()->name }}" class="img-circle" src="{{ url('uploads/users/' . Auth::user()->image ) }}">
                    @endif
                </a>

                <ul class="dropdown-menu dropdown-menu-default">
                    <li>
                        <a href="{{  url('admin/auth/logout') }}">
                            <i class="icon-key"></i> Sair </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>