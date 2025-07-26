<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700&display=swap">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css') }}">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.min.css') }}">

  <style>
    body {
      background: linear-gradient(to right, #DCC5B2, #FAF7F3);
      font-family: 'Source Sans Pro', sans-serif;
    }

    .login-box {
      margin-top: 7vh;
    }

    .card {
      border-radius: 15px;
      box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.15);
    }

    .login-logo a {
      font-weight: 700;
      color: #343a40;
    }

    .btn-primary {
      background-color: #6A5ACD;
      border-color: #6A5ACD;
    }

    .btn-primary:hover {
      background-color: #5a4ec0;
    }

    .input-group-text {
      background-color: #e9ecef;
    }

    .form-control:focus {
      border-color: #6A5ACD;
      box-shadow: none;
    }

    .social-auth-links .btn {
      border-radius: 25px;
      font-weight: 600;
    }

    .alert-danger {
      border-radius: 8px;
    }

    .text-danger {
      font-size: 0.85rem;
    }
  </style>
</head>
<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <a href="#">Login</a>
  </div>

  <div class="card">
    <div class="card-body login-card-body" style="background-color: #ffffff; border-radius: 15px;">

      @if (session('failed'))
        <div class="alert alert-danger">{{ session('failed') }}</div>
      @endif

      <p class="login-box-msg">Sign in to start your session</p>

      <form action="/login" method="POST">
        @csrf

        <div class="mb-3">
          @error('email') <small class="text-danger">{{ $message }}</small> @enderror
          <div class="input-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text"><span class="fas fa-envelope"></span></div>
            </div>
          </div>
        </div>

        <div class="mb-3">
          @error('password') <small class="text-danger">{{ $message }}</small> @enderror
          <div class="input-group">
            <input type="password" name="password" class="form-control" placeholder="Password" id="password" required>
            <div class="input-group-append show-password">
              <div class="input-group-text"><span class="fas fa-lock" id="password-lock"></span></div>
            </div>
          </div>
        </div>

        <div class="row align-items-center mb-3">
          <div class="col-6">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember">
              <label for="remember">Remember Me</label>
            </div>
          </div>
          <div class="col-6 text-right">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>

      <div class="text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in with Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in with Google+
        </a>
      </div>

      <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="#" class="text-center">Register a new membership</a>
      </p>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin-lte/dist/js/adminlte.min.js') }}"></script>

<script>
  $('.show-password').on('click', function () {
    var passwordField = $('#password');
    var passwordLockIcon = $('#password-lock');

    if (passwordField.attr('type') === 'password') {
      passwordField.attr('type', 'text');
      passwordLockIcon.removeClass('fa-lock').addClass('fa-unlock');
    } else {
      passwordField.attr('type', 'password');
      passwordLockIcon.removeClass('fa-unlock').addClass('fa-lock');
    }
  });
</script>

</body>
</html>
