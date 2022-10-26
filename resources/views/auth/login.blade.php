@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Find easily a doctor and book online an appointment">
	<meta name="author" content="Ansonika">
	<title>Igresa a tu cuenta</title>

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
	<!-- BASE CSS -->
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/style.css')}}" rel="stylesheet">
	<link href="{{asset('css/menu.css')}}" rel="stylesheet">
	<link href="{{asset('css/vendors.css')}}" rel="stylesheet">
	<link href="{{asset('css/icon_fonts/css/all_icons_min.css')}}" rel="stylesheet">
    
	<!-- YOUR CUSTOM CSS -->
	<link href="css/custom.css" rel="stylesheet">

</head>

<body>

	<div class="layer"></div>
	<!-- Mobile menu overlay mask -->

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->
	
	<main>
		<div class="bg_color_2">
			<div class="container margin_60_35">
				<div id="login-2">
					<h1>Igresa a Clinicas San Juan Apostol!</h1>
					<form method="POST" action="{{ route('login') }}">
                        @csrf
						<div class="box_form clearfix">
							<div class="box_login last">
								<div class="form-group">
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo eléctronico">
								</div>
								<div class="form-group">
									<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
								</div>
								<div class="form-group">

									<input class="btn_1" type="submit" value="Iniciar Sesión">
								</div>
							</div>
						</div>
					</form>
				</div>
				<!-- /login -->
			</div>
		</div>
	</main>
	<!-- /main -->
	
	<footer>
		<div class="container margin_60_35">
			<hr>
			<div class="row">
				<div class="col-md-4">
					<div id="copy">© 2022 Clinica Dental San Juan Apostol</div>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->

	<div id="toTop"></div>
	<!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
	<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
	<script src="{{asset('js/common_scripts.min.js')}}"></script>
	<script src="{{asset('js/functions.js')}}"></script>

</body>
</html>
@endsection
