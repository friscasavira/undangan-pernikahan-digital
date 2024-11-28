<!doctype html>
<html lang="en">

<head>
	<title>Pengguna - Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{asset('login/css/style.css')}}">

	<style>
		.login-wrap {
			border: 1px solid rgba(255, 255, 255, 0.4);
			border-radius: 20px;
		}
	</style>
</head>

<body class="img js-fullheight" style="background-image: url({{ asset('login/images/bg.jpg') }})">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<!-- <h2 class="heading-section">Login Min</h2> -->
					@if ($errors->has('login_error'))
					<div class="alert alert-danger" style="border-radius:40px 40px 40px 40px;">
						{{ $errors->first('login_error')}}
					</div>
					@endif
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-6">
					<div class="login-wrap p-3">
						<h3 class="mb-4 text-center">Pengguna Login</h3>
						<form action="{{route('user.submit')}}" method="post" class="signin-form">
							@csrf
							<div class="form-group">
								<input type="text" class="form-control" name="username" placeholder="Username">
								<div class="text-danger">
									@error('username')
									{{$message}}
									@enderror
								</div>
							</div>

							<div class="form-group">
								<input id="password-field" type="password" class="form-control" name="password" placeholder="Password">
								<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								<div class="text-danger">
									@error('password')
									{{$message}}
									@enderror
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

    <script src="{{ asset('login/js/jquery.min.js') }}"></script>
    <script src="{{ asset('login/js/popper.js') }}"></script>
    <script src="{{ asset('login/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('login/js/main.js') }}"></script>
</body>

</html>
