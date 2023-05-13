<!doctype html>
<html lang="en">
  <head>
  	<title>Login 08</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet"   href="{{asset('front/login/admin/css/style.css')}}">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<!-- <h2 class="heading-section"></h2> -->
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center mb-5">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<!-- <h3 class="text-center mb-4">Admin Login</h3> -->
						<form method="POST" action="{{ route('admin.login') }}" class="login-form">
							@csrf

							<div class="form-group">
		      			<input id="email" type="email" class="form-control rounded-left @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
						  @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <span style="color:red">
                                            @if(Session::has('message'))
                                            {{ Session::get('message') }}
                                           @endif
                                        </span>
					</div>
	            <div class="form-group d-flex">
	              <input id="password" type="password" class="form-control rounded-left @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">
				  @error('password')
				  <span class="invalid-feedback" role="alert">
					  <strong>{{ $message }}</strong>
				  </span>
			  @enderror
				</div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#">Forgot Password</a>
								</div>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="btn btn-primary rounded submit p-3 px-5">Get Started</button>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	
  <script src="js/main.js"  href="{{asset('front/login/admin/js/main.js')}}"></script>

	</body>
</html>

