@extends('layouts.dashboard')
@section('page_heading','Home')
@section('section')

<div class="col-lg-8">
    <!-- important -->
    @if (Auth::user()->isNew())
    @section ('important_panel_title', 'Important: Actions Required')
    @section ('important_panel_body')
    <p>Please perform the following actions as soon as possible. This panel will disappear once you have completed both actions.</p>
    <ul>
        <li><a href="{{ route('user.settings') }}">Change your password</a></li>
        <li><a href="{{ route('user.profile') }}">Update your profile</a></li>
    </ul>
    @endsection
    @include('widgets.panel', array('class'=>'danger', 'header'=>true, 'as'=>'important'))
    @endif
    <!-- annoucements -->
    @section ('annoucements_panel_title', 'Annoucements')
    @section ('annoucements_panel_body')
    @if (count($annoucements) == 0)
    There are no annoucements for the past 3 months.
    @else
    @foreach ($annoucements as $ann)
    <div align="right" style="font-size:85%;"><i>by {{ $ann->createdby() }} on {{ $ann->created_at->format('j F Y H:i:s') }}</i></div>
    @section ('ann'.$ann->id.'_panel_title', $ann->title)
    @section ('ann'.$ann->id.'_panel_body')
    <p>{!! nl2br(e($ann->content)) !!}</p>
    @endsection
    @include('widgets.panel', array('header'=>true, 'as'=>'ann'.$ann->id))
    @endforeach
    @endif
    @endsection
    @include('widgets.panel', array('class'=>'primary', 'header'=>true, 'as'=>'annoucements'))
</div>

<div class="col-lg-4">
    <!-- profile -->
    @section ('profile_panel_title', 'Profile')
    @section ('profile_panel_body')
    <div align="center">
        <a href="{{ route('user.profile') }}">
            <img src="{{ asset($profile->getImageAssetPath()) }}" style="height: auto; width: 60%; object-fit: contain;"/>
        </a>
        <br><br>
        Name: {{ $profile->fullname }}
        <br>
        Rank: {{ $profile->rank->title }}
        @if (!$profile->isExpert())
        <br>
        Next Rank: {{ $profile->rank->nextrank }}
        <br>
        ({{ Auth::user()->hoursToRankUp() }} hours left)
        @endif
    </div>

    @endsection
    @include('widgets.panel', array('header'=>true, 'as'=>'profile'))
    <!-- projects -->
    @section ('projects_panel_title', 'Current Projects')
    @section ('projects_panel_body')
    @if (count($curr_projs) == 0)
    You have no projects assigned currently.
    @else
    <ul>
        @foreach ($curr_projs as $proj)
        <li>{{ $proj->title }}</li>
        @endforeach
    </ul>
    @endif
    @endsection
    @include('widgets.panel', array('header'=>true, 'as'=>'projects'))
    <!-- committees -->
    @section ('committees_panel_title', 'Current Committees')
    @section ('committees_panel_body')
    @if (count($curr_comms) == 0)
    You have no committees assigned currently.
    @else
    <ul>
        @foreach ($curr_comms as $comm)
        <li>{{ $comm->name }}</li>
        @endforeach
    </ul>
    @endif
    @endsection
    @include('widgets.panel', array('header'=>true, 'as'=>'committees'))
</div>

@stop
