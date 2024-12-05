<!doctype html>
<html lang="en">

<head>
	<title>Pengguna - Register</title>
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
				
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-6">
					<div class="login-wrap p-3">
						<h3 class="mb-4 text-center">Pengguna Register</h3>
						<div class="d-flex flex-column align-items-center justify-content-center mb-3">
							<a href="{{route('view')}}" class="">
								<i class="fa fa-home" style="font-size: 30px;"></i>
							</a>
						</div>
						<form action="{{route('register.submit')}}" method="post" class="signin-form">
							@csrf
                            <div class="form-group">
								<input type="text" class="form-control" name="name" placeholder="Name">
								<div class="text-danger">
									@error('name')
									{{$message}}
									@enderror
								</div>
							</div>

							<div class="form-group">
								<input type="text" class="form-control" name="username" placeholder="Username">
								<div class="text-danger">
									@error('username')
									{{$message}}
									@enderror
								</div>
							</div>

                            <div class="form-group">
								<input type="text" class="form-control" name="email" placeholder="Email">
								<div class="text-danger">
									@error('email')
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
								<button type="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>
							</div>

							<div class="w-100 text-center mt-3">
								<p>Sudah punya akun? <a href="{{ route('user.login') }}">Masuk di sini</a></p>
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
