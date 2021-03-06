@extends('layouts.dashboard')
@section('page_heading','Manage Annoucements')
@section('section')

<div class="col-lg-12">
    @include('admin.widgets.alert', array('class'=>'warning', 'message'=> 'Check for errors before clicking submit. You cannot edit nor delete the annoucement after it is created'))
</div>

<div class="col-lg-10">
    @component('admin.widgets.panel')
        @slot('panelTitle', 'Create Annoucement')
        @slot('panelBody')
        <div class="col-xs-12">
            <?php $error_class = 'col-lg-offset-1 col-lg-11 col-sm-offset-2 col-sm-10'; ?>
            {{ Form::open(['route' => 'manage.annoucement.create', 'method' => 'post', 'class' => 'form-horizontal']) }}
            <div class="form-group">
                <label for="title" class="control-label col-lg-1 col-sm-2">Title:</label>
                <div class="col-lg-11 col-sm-10 {{ $errors->has('title') ? 'has-error' : '' }}">
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control" autofocus required>
                </div>
                @include('partials.errormsg', array('field'=>'title', 'class' => $error_class))
            </div>

            <div class="form-group">
                <label for="content" class="control-label col-lg-1 col-sm-2">Content:</label>
                <div class="col-lg-11 col-sm-10 {{ $errors->has('content') ? 'has-error' : '' }}">
                    <textarea name="content" class="form-control" required rows=20>{{ old('content') }}</textarea>
                </div>
                @include('partials.errormsg', array('field'=>'content', 'class' => $error_class))
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 col-lg-offset-1 col-lg-11 col-xs-offset-4 col-xs-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
        @endslot
    @endcomponent

</div>


@stop
