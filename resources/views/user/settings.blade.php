@extends('layouts.dashboard')
@section('page_heading','Settings')
@section('section')

<div class="col-lg-12">
    @include('widgets.alert', array('class'=>'info', 'message'=> 'Password length must be at least 8 characters and contain 1 uppercase, lowercase and number/special character'))
</div>
<div class="col-lg-7 col-md-10">
    @section ('changepass_panel_title', 'Change Password')
    @section ('changepass_panel_body')
        <?php $error_class = 'col-md-offset-4 col-md-8'; ?>
        {{ Form::open(['route' => 'user.changepass', 'method' => 'post', 'class' => 'form-horizontal']) }}
        <div class="form-group">
            <label for="currpass" class="control-label col-md-4">Current password:</label>
            <div class="col-md-6">
                <input type="password" name="currpass" value="" class="form-control" autofocus required>
            </div>
            @include('portal.partials.errormsg', array('field'=>'currpass', 'class' => $error_class))
        </div>

        <div class="form-group">
            <label for="newpass" class="control-label col-md-4">New password:</label>
            <div class="col-md-6">
                <input type="password" name="newpass" value="" class="form-control" required>
            </div>
            @include('portal.partials.errormsg', array('field'=>'newpass', 'class' => $error_class))
        </div>

        <div class="form-group">
            <label for="retypepass" class="control-label col-md-4">Retype password:</label>
            <div class="col-md-6">
                <input type="password" name="retypepass" value="" class="form-control" required>
            </div>
            @include('portal.partials.errormsg', array('field'=>'retypepass', 'class' => $error_class))
        </div>

        <div class="form-group">
            <div class="col-md-offset-4 col-md-1 col-xs-offset-4 col-xs-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        {{ Form::close() }}

    @endsection
    @include('widgets.panel', array('header'=>true, 'as'=>'changepass'))
</div>

@stop
