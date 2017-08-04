@extends('layouts.dashboard')
@section('page_heading','Manage Users')
@section('section')

@include('portal.admin.users.tablinks')

<div class="col-xs-12">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Username</th>
                <th>Full Name</th>
                <th>Rank</th>
                <th>Type</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td class="col-xs-1">{{ $user->username }}</td>
                <td class="col-xs-4">{{ $user->fullname }}</td>
                <td class="col-xs-1">{{ $user->rank }}</td>
                <td class="col-xs-1">{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-primary">Make Admin</button>
                    <button type="button" class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@stop
