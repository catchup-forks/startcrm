@extends ('layouts.navbar')
@section ('section')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <br /><br /><br />
            @if (Session::has('message'))
            @include('widgets.alert', array('class'=>'success', 'dismissable'=>true, 'message'=> session('message')))
            @endif
            @section ('login_panel_title','Please Sign In')
            @section ('login_panel_body')
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form role="form" method="POST" action="{{ route('login') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <fieldset>
                    <div class="form-group">
                        <input class="form-control" placeholder="Username" name="username" type="text" value="{{ old('username') }}" autofocus>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>Remember Me
                        </label>
                    </div>
                    <!-- Change this to a button or input when using this as a form -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-success btn-block">
                            Login
                        </button>
                    </div>
                </fieldset>
            </form>
            @endsection
            @include('widgets.panel', array('as'=>'login', 'header'=>true))
        </div>
    </div>
</div>
@stop