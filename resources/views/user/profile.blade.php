@extends('layouts.dashboard')
@section('page_heading','Profile')
@section('section')

@push('module_styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
@endpush

<div class="col-md-3">
    <div class="row">
        <div class="col-md-12 col-xs-offset-1 col-xs-10">
            <img class="image-border" src="{{ asset($profile->getImageAssetPath()) }}" style="height: auto; width: 100%; object-fit: contain;"/>
            <br><br>
        </div>
    </div>
</div>

{{ Form::open(['route' => 'user.editprofile', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true]) }}
<div class="col-md-9">
    <?php $error_class = 'col-md-offset-2 col-md-10'; ?>
    <div class="col-md-offset-2 col-md-10">
        <p style="font-size:85%;"><b><i>Fields with an asterisk(*) are required</i></b></p>
    </div>
    <div class="form-group">
        <label for="fullname" class="control-label col-md-2">*Fullname:</label>
        <div class="col-md-5 {{ $errors->has('fullname') ? 'has-error' : '' }}">
            <input type="text" name="fullname" value="{{ old('fullname', $profile->fullname) }}" class="form-control" required>
        </div>
        @include('portal.partials.errormsg', array('field'=>'fullname', 'class' => $error_class))
    </div>

    <div class="form-group">
        <label for="dob" class="control-label col-md-2">*Date of birth:</label>
        <div class="col-md-4 {{ $errors->has('dob') ? 'has-error' : '' }}">
            <input type="text" id="dob" name="dob" value="{{ old('dob', $profile->dob->format('j F Y')) }}" class="form-control" required>
        </div>
        @include('portal.partials.errormsg', array('field'=>'dob', 'class' => $error_class))
    </div>

    <div class="form-group">
        <label for="age" class="control-label col-md-2">*Age:</label>
        <div class="col-md-2 {{ $errors->has('age') ? 'has-error' : '' }}">
            <input type="text" name="age" value="{{ old('age', $profile->age) }}" class="form-control" required>
        </div>
        @include('portal.partials.errormsg', array('field'=>'age', 'class' => $error_class))
    </div>

    <div class="form-group">
        <label for="gender" class="control-label col-md-2">*Gender:</label>
        <div class="col-md-6 {{ $errors->has('gender') ? 'has-error' : '' }}">
            @foreach ($genders as $gender)
            <label class="radio-inline">
                <input type="radio" name="gender" value="{{ $gender->id }}" {{ (old('gender', $profile->gender->id) == $gender->id) ? 'checked' : '' }}>
                {{ $gender->value }}
            </label>
            @endforeach
        </div>
        @include('portal.partials.errormsg', array('field'=>'gender', 'class' => $error_class))
    </div>

    <div class="form-group">
        <label for="email" class="control-label col-md-2">*Email:</label>
        <div class="col-md-5 {{ $errors->has('email') ? 'has-error' : '' }}">
            <input type="email" name="email" value="{{ old('email', $profile->email) }}" class="form-control" required>
        </div>
        @include('portal.partials.errormsg', array('field'=>'email', 'class' => $error_class))
    </div>

    <div class="form-group">
        <label for="mailaddr" class="control-label col-md-2">*Address:</label>
        <div class="col-md-8 {{ $errors->has('mailaddr') ? 'has-error' : '' }}">
            <textarea name="mailaddr" class="form-control" required rows=2>{{ old('mailaddr', $profile->mailaddr) }}</textarea>
        </div>
        @include('portal.partials.errormsg', array('field'=>'mailaddr', 'class' => $error_class))
    </div>

    <div class="form-group">
        <label for="contacthp" class="control-label col-md-2">Contact:</label>
        <div class="col-md-4 {{ $errors->has('contacthp') ? 'has-error' : '' }}">
            <div class="input-group">
                <span class="input-group-addon">(*Mobile)</span>
                <input type="text" name="contacthp" value="{{ old('contacthp', $profile->contacthp) }}" class="form-control" required>
            </div>
        </div>
        @include('portal.partials.errormsg', array('field'=>'contacthp', 'class' => $error_class))
    </div>

    <div class="form-group">
        <label for="contacthome" class="control-label col-md-2"></label>
        <div class="col-md-4 {{ $errors->has('contacthome') ? 'has-error' : '' }}">
            <div class="input-group">
                <span class="input-group-addon">(Home)</span>
                <input type="text" name="contacthome" value="{{ old('contacthome', $profile->contacthome) }}" class="form-control">
            </div>
        </div>
        @include('portal.partials.errormsg', array('field'=>'contacthome', 'class' => $error_class))
    </div>

    <div class="form-group">
        <label for="image" class="control-label col-md-2">Image:</label>
        <div class="col-md-8 {{ $errors->has('image') ? 'has-error' : '' }}">
            <input type="file" name="image" class="form-control" accept=".png, .jpg, .jpeg">
        </div>
        @include('portal.partials.errormsg', array('field'=>'image', 'class' => $error_class))
    </div>

</div>

<div class="col-sm-12">
    <hr>
    <div class="form-group">
        <div align="center">
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </div>
    </div>
</div>
{{ Form::close() }}

@push('module_scripts')
<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

<script>
    $('#dob').datepicker({
        format: "dd MM yyyy"
    });
</script>
@endpush

@stop
