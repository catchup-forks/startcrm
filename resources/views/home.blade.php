@extends('layouts.dashboard')
@section('page_heading','Home')
@section('section')

<div class="col-lg-8">
    <!-- important -->
    @if (Auth::user()->isNew())
        @component('admin.widgets.panel')
            @slot('class', 'danger')
            @slot('panelTitle', 'Important: Actions Required')
            @slot('panelBody')
                <p>Please perform the following actions as soon as possible. This panel will disappear once you have completed both actions.</p>
                <ul>
                    <li><a href="{{ route('user.settings') }}">Change your password</a></li>
                    <li><a href="{{ route('user.profile') }}">Update your profile</a></li>
                </ul>
            @endslot
        @endcomponent
    @endif

    <!-- annoucements -->
    @component('admin.widgets.panel')
        @slot('class', 'info')
        @slot('panelTitle', 'Annoucements')
        @slot('panelBody')
            @if (count($annoucements) == 0)
                There are no annoucements for the past 3 months.
            @else
                @foreach ($annoucements as $ann)
                    <div align="right" style="font-size:85%;"><i>by {{ $ann->createdby() }} on {{ $ann->created_at->format('j F Y H:i:s') }}</i></div>
                    @component('admin.widgets.panel')
                        @slot('panelTitle', $ann->title)
                        @slot('panelBody')
                        <p>{!! nl2br(e($ann->content)) !!}</p>
                        @endslot
                    @endcomponent
                @endforeach
            @endif
        @endslot
    @endcomponent

</div>

<div class="col-lg-4">
    <!-- profile -->
    @component('admin.widgets.panel')
        @slot('panelTitle', 'Profile')
        @slot('panelBody')
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
        @endslot
    @endcomponent

    <!-- projects -->
    @component('admin.widgets.panel')
        @slot('panelTitle', 'Current Projects')
        @slot('panelBody')
            @if (count($curr_projs) == 0)
            You have no projects assigned currently.
            @else
            <ul>
                @foreach ($curr_projs as $proj)
                <li>{{ $proj->title }}</li>
                @endforeach
            </ul>
            @endif
        @endslot
    @endcomponent

    <!-- committees -->
    @component('admin.widgets.panel')
        @slot('panelTitle', 'Current Committees')
        @slot('panelBody')
            @if (count($curr_comms) == 0)
                You have no committees assigned currently.
            @else
                <ul>
                    @foreach ($curr_comms as $comm)
                    <li>{{ $comm->name }}</li>
                    @endforeach
                </ul>
            @endif
        @endslot
    @endcomponent
</div>

@stop
