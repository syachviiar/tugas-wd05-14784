<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | HealthLink</title>
  
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary-color: #003049;
      --secondary-color: #669bbc;
      --background: #f8f9fa;
      --white: #ffffff;
      --danger-color: #dc3545;
      --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: var(--background);
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }

    .login-container {
      background: var(--white);
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: var(--shadow);
      width: 100%;
      max-width: 400px;
    }

    .login-container h2 {
      text-align: center;
      color: var(--primary-color);
      margin-bottom: 1rem;
    }

    .alert {
      background-color: var(--danger-color);
      color: #fff;
      padding: 0.75rem 1rem;
      border-radius: 0.5rem;
      margin-bottom: 1rem;
      font-size: 0.9rem;
      text-align: center;
    }

    .form-group {
      margin-bottom: 1rem;
    }

    .form-group input {
      width: 100%;
      padding: 0.75rem;
      border: 1px solid #ccc;
      border-radius: 0.5rem;
      font-size: 1rem;
    }

    .error-text {
      color: var(--danger-color);
      font-size: 0.85rem;
      margin-top: 0.25rem;
    }

    .btn {
      width: 100%;
      display: block;
      padding: 0.75rem;
      background-color: var(--primary-color);
      color: var(--white);
      font-weight: 600;
      border: none;
      border-radius: 0.5rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: var(--secondary-color);
    }

    .form-footer {
      margin-top: 1rem;
      text-align: center;
    }

    .form-footer a {
      color: var(--secondary-color);
      text-decoration: none;
      font-size: 0.9rem;
    }

    .form-footer a:hover {
      text-decoration: underline;
    }

    .remember {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 0.9rem;
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <a href="{{ url('/') }}" style="text-decoration: none;">
      <h2>
        Login ke <span style="color: var(--secondary-color)">HealthLink</span>
      </h2>
    </a>

    {{-- Notifikasi error global --}}
    @if ($errors->has('email'))
      <div class="alert">
        {{ $errors->first('email') }}
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="form-group">
        <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
        @if ($errors->has('email') && !session('error'))
          <div class="error-text">{{ $errors->first('email') }}</div>
        @endif
      </div>

      <div class="form-group">
        <input type="password" name="password" placeholder="Password" required>
        @if ($errors->has('password'))
          <div class="error-text">{{ $errors->first('password') }}</div>
        @endif
      </div>

      <div class="remember">
        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
        <label for="remember">Ingat saya</label>
      </div>

      <button type="submit" class="btn">Masuk</button>
    </form>

    <div class="form-footer">
      <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
    </div>
  </div>

</body>
</html>
