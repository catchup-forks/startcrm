<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<title>{{ config('app.name', 'Laravel') }}</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>

	<link rel="stylesheet" href="{{ mix('assets/stylesheets/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/portal.css') }}"/>
    @stack('module_styles')
</head>
<body>
	@yield('body')
	<script src="{{ mix('assets/scripts/frontend.js') }}" type="text/javascript"></script>
    @stack('module_scripts')
</body>
</html>
