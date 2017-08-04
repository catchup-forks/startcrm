@extends('layouts.plane')

@section('body')
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}</a>
        </div>
        <!-- /.navbar-header -->

        <ul align="right" class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> {{ Auth::user()->profile->fullname }} <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{ route('user.profile') }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="{{ route('user.settings') }}"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out fa-fw"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li {{ (Route::is('home') ? 'class=active' : '') }}>
                        <a href="{{ route('home') }}"><i class="fa fa-home fa-fw"></i> Home</a>
                    </li>
                    <li {{ (Route::is('project.index') ? 'class=active' : '') }}>
                        <a href="{{ route('project.index') }}"><i class="fa fa-archive fa-fw"></i> Projects</a>
                        <!-- /.nav-second-level -->
                    </li>
                    <li {{ (Route::is('event.journey') ? 'class=active' : '') }}>
                        <a href="{{ route('event.journey') }}"><i class="fa fa-line-chart fa-fw"></i> Journey</a>
                    </li>
                    <li >
                        <a href="#"><i class="fa fa-university fa-fw"></i> Courses<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li {{ (Route::is('course.assigned') ? 'class=active' : '') }}>
                                <a href="{{ route('course.assigned') }}">Assigned</a>
                            </li>
                            <li {{ (Route::is('course.non-assigned') ? 'class=active' : '') }}>
                                <a href="{{ route('course.non-assigned' ) }}">Non-assigned</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    @if (Auth::user()->is_admin)
                    <li >
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Admin<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li {{ (Route::is('admin.annoucement') ? 'class=active' : '') }}>
                                <a href="{{ route('admin.annoucement') }}">Manage Annoucements</a>
                            </li>
                            <li {{ ((Route::getCurrentRoute()->getPrefix() === 'admin/users') ? 'class=active' : '') }}>
                                <a href="{{ route('admin.users' ) }}">Manage Users</a>
                            </li>
                            <li {{ (Route::is('admin.courses') ? 'class=active' : '') }}>
                                <a href="{{ route('admin.courses') }}">Manage Courses</a>
                            </li>
                            <li {{ (Route::is('admin.committees') ? 'class=active' : '') }}>
                                <a href="{{ route('admin.committees') }}">Manage Committees</a>
                            </li>
                            <li {{ (Route::is('admin.awards') ? 'class=active' : '') }}>
                                <a href="{{ route('admin.awards') }}">Manage Awards</a>
                            </li>
                            <li {{ (Route::is('admin.projects') ? 'class=active' : '') }}>
                                <a href="{{ route('admin.projects') }}">Manage Projects</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    @endif
                    <li {{ (Route::is('support') ? 'class=active' : '') }}>
                        <a href="{{ route('support') }}"><i class="fa fa-life-ring fa-fw"></i> Support</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                @if (Session::has('message'))
                <br />
                @include('widgets.alert', array('class'=>session('class'), 'dismissable'=>true, 'message'=> session('message')))
                @endif
                <h3 class="portal-header">@yield('page_heading')</h3>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row" style="padding-top:5px;">
            @yield('section')

        </div>
        <!-- /#page-wrapper -->
    </div>
</div>
@stop
