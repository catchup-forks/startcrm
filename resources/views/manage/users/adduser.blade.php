@extends('layouts.dashboard')
@section('page_heading','Manage Users')
@section('section')

@include('manage.users.tablinks')

<div class="col-lg-7 col-xs-12">
    @component('admin.widgets.panel')
        @slot('panelTitle', 'Add User')
        @slot('panelBody')
        {{ Form::open(['route' => 'manage.users.create', 'method' => 'post', 'class' => 'form-horizontal']) }}
        <?php $error_class = 'col-md-offset-3 col-md-9 col-sm-offset-4 col-sm-8'; ?>
        <div class="form-group">
            <label for="username" class="control-label col-md-3 col-sm-4">Username:</label>
            <div class="col-lg-5 col-md-6 col-sm-7 {{ $errors->has('username') ? 'has-error' : '' }}">
                <input type="text" name="username" value="{{ old('username') }}" class="form-control" autofocus required>
            </div>
            @include('partials.errormsg', array('field'=>'username', 'class' => $error_class))
        </div>

        <div class="form-group">
            <label for="is_admin" class="control-label col-md-3 col-sm-4">Make admin?</label>
            <div class="col-md-8 col-sm-8 {{ $errors->has('is_admin') ? 'has-error' : '' }}">
                <label class="radio-inline">
                    <input type="radio" name="is_admin" value="1" {{ (old('is_admin') == 1) ? 'checked' : '' }}>Yes
                </label>
                <label class="radio-inline">
                    <input type="radio" name="is_admin" value="0" {{ (old('is_admin', 0) == 0) ? 'checked' : '' }}>No
                </label>
            </div>
            @include('partials.errormsg', array('field'=>'is_admin', 'class' => $error_class))
        </div>

        <div class="form-group">
            <label for="is_expert" class="control-label col-md-3 col-sm-4">Make expert?</label>
            <div class="col-md-8 col-sm-8 {{ $errors->has('is_expert') ? 'has-error' : '' }}">
                <label class="radio-inline">
                    <input type="radio" name="is_expert" value="1" {{ (old('is_expert') == 1) ? 'checked' : '' }}>Yes
                </label>
                <label class="radio-inline">
                    <input type="radio" name="is_expert" value="0" {{ (old('is_expert', 0) == 0) ? 'checked' : '' }}>No
                </label>
            </div>
            @include('partials.errormsg', array('field'=>'is_expert', 'class' => $error_class))
        </div>

        <div class="form-group">
            <div class="col-md-offset-3 col-md-1 col-sm-offset-4 col-sm-1 col-xs-offset-4 col-xs-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        {{ Form::close() }}
        @endslot
    @endcomponent
    
</div>

@stop
