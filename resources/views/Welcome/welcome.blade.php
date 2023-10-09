<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page - The Goat</title>
  
  <style>
  body {
    background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
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
    background-color: lightblue;
    padding: 50px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 50%;
    height: 70%;
    display: flex;
    flex-direction: column;
    align-items: center;
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
    max-width: 200px;
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
      height: 60%;
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
      width: 50%;
      height: 70%;
    }
    .login-form img {
      max-width: 100px;
    }
  }
</style>

</head>

<body>
  <div class="container">
    <div class="login-form">
      <!-- <img src="" alt="The Goat"> -->
      <div class="illustration-container">
        <img src="{{ asset('assets/best.png') }}" alt="Illustration" class="illustration">
      </div>
      <h1>The Goat</h1>

      <form method="POST" action="{{ route('loginn') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" required class="input-with-icon">
        <input type="password" name="password" placeholder="Password" required>
        <button class="transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 ...">
  login
</button>
      </form>

      @if(session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
      @endif

      <a href="#" class="signup">Signup</a>
      <p class="forgotpass">Forgot password? <span>Click here</span></p>
    </div>
  </div>
</body>

</html>