<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page - The Goat</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <style>
    body {
      background-color: #192a56;
      background-size: cover;
      background-position: center;
      min-height: 100vh;
      display: flex;
      align-items: center;
    }

    .card {
      background-color: rgba(255, 255, 255, 0.8);
      border: none;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .card-header {
      background-color: #192a56;
      color: #fff;
      border-bottom: none;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      padding: 20px;
      text-align: center;
    }

    .form-group label {
      color: #192a56;
      font-weight: bold;
    }

    .btn-primary {
      background-color: #192a56;
      border-color: #192a56;
    }

    .btn-primary:hover {
      background-color: #0c1430;
      border-color: #0c1430;
    }

    .btn-primary:focus {
      box-shadow: none;
    }
  </style>

</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card mt-5">
          <div class="card-header">
            <h1 class="mb-0">Register</h1>
          </div>
          <div class="card-body">
            <div class="text-center mb-4">
              <img  src="{{ asset('assets/THE GOAT LOGO.png') }}"alt="Illustration" class="illustration img-fluid" style="max-width: 150px;">
            </div>
            <form method="POST" action="{{ route('userregister') }}">
              @csrf
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
              </div>
              <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm your password" required>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>