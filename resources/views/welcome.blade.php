<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page - The Goat</title>
  
  <style>
  body {
    background-color: #192a56;

    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
  }

  .container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

 .login-form {
  background-color: rgba(255, 255, 255, 0.8);
  padding: 50px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  text-align: center;
  width: 30%;
  height: 50%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
  

  .login-form h1 {
    margin-bottom: 20px;
  }

  .login-form input {
    display: block;
    width: 100%;
    padding: 10px;
    margin-bottom: 25px;
    border-radius: 5px;
    border: 1px solid #ccc;
  }

  .login-form button {
    display: block;
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: none;
    background-color: #2980b9;
    color: #fff;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-bottom: 30px;
  }

  /* Center align the buttons */
  .login-form button.login {
    margin-left: auto;
    margin-right: auto;
  }

  /* Add different hover effects */
  .login-form button.login:hover {
    background-color: #1a5276;
  }



  p.sapi_windows_cp_conv {
    color: blue;
  }

  p span {
    color: blue;
    cursor: pointer;
    
  }

  .login-form img {
    max-width: 150px;
  margin-bottom: 20px;
    /* margin-bottom: 10px; */
  }



  @keyframes fillingAnimation {
  0% {
    background-color: transparent;
    color: white;
    border: 2px solid white;
  }
  50% {
    background-color: white;
    color: #2980b9;
    border: none;
  }
  100% {
    background-color: #2980b9;
    color: white;
    border: none;
  }
}

.filling-effect {
  animation: fillingAnimation 2s ease-in-out;
}

  /* Responsive modifications */
  @media (max-width: 768px) {
    .login-form {
      width: 50%;
      height: 40%;
    }
    .login-form img {
      max-width: 150px;
    }
  }

  a
  {
    text-decoration: none;
  }

  @media (max-width: 480px) {
  .login-form {
    height: 45%; /* Decrease the height to 35% */
  }
  .login-form img {
    max-width: 80px; /* Decrease the maximum width to 80px */
  }
}
</style>

</head>

<body>
<div class="container">
  <div class="login-form">
    <div class="text-center">
      <img  src="{{ asset('assets/THE GOAT LOGO.png') }}" alt="Illustration" class="illustration img-fluid" style="max-width: 150px;">
    </div>
      <!-- <h1>The Goat</h1> -->

      <form method="POST" action="{{ route('loginn') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" required class="input-with-icon">
        @if(Session::has('email'))
        <span class="alert alert-info">{{ \Session::get('message') }}</span>
        @endif  
        <input type="password" name="password" placeholder="Password" required>
        @if($errors->has('password'))
        <span class="tect-danger">{{ $errors->first('password') }}</span>
        @endif  
        <button class="transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 ...">
  login
</button>
      </form>

      @if(session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
      @endif

      <a href=" {{ route('register') }} " class="signup">Signup</a>
      <p class="forgotpass">Forgot password? <span>Click here</span></p>
    </div>
  </div>
</body>

</html>