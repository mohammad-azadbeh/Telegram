<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner">
        <div class="page-header-inner">
            <div class="navbar-header">
                <a href="{{ url(config('quickadmin.homeRoute')) }}" class="navbar-brand">
                    {{ trans('quickadmin::admin.partials-topbar-title') }}
                </a>
            </div>
            <a href="javascript:;"
               class="menu-toggler responsive-toggler"
               data-toggle="collapse"
               data-target=".navbar-collapse">

                <i class="fa fa-caret-square-o-left">Test</i>

            </a>

            <div class="top-menu">
                <ul class="nav navbar-nav">

                    <li>

                        <div class="dropdown-menu-right">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                {{ Auth::user()->name }}
                                    <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="/profile">پروفایل</a></li>
                                <li><a href="#">خروج</a></li>
                            </ul>
                        </div>

                        &nbsp;
                    </li>
                    <li>
                        &nbsp;
                        <button class="btn btn-danger">En</button>
                    </li>
                    <li>
                        &nbsp;
                        <button class="btn btn-primary">فا</button>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>