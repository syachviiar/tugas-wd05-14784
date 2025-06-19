<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi | HealthLink</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary-color: #003049;
      --secondary-color: #669bbc;
      --bg-color: #f9fafb;
      --white: #ffffff;
      --shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Inter', sans-serif;
    }

    body {
      background-color: var(--bg-color);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 2rem;
    }

    .register-container {
      background: var(--white);
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: var(--shadow);
      max-width: 900px;
      width: 100%;
    }

    h2 {
      text-align: center;
      color: var(--primary-color);
      margin-bottom: 1.5rem;
    }

    .row {
      display: flex;
      gap: 2rem;
      flex-wrap: wrap;
    }

    .form-group {
      margin-bottom: 1rem;
    }

    .form-group label {
      font-weight: 600;
      margin-bottom: 0.25rem;
      display: block;
      font-size: 0.95rem;
    }

    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 0.75rem;
      border-radius: 0.5rem;
      border: 1px solid #ccc;
      font-size: 0.95rem;
    }

    .form-check {
      margin-top: 1rem;
    }

    .form-check-label {
      font-size: 0.9rem;
    }

    .btn {
      padding: 0.75rem;
      border-radius: 0.5rem;
      font-weight: 600;
      font-size: 1rem;
      cursor: pointer;
      border: none;
      width: 100%;
    }

    .btn-primary {
      background-color: var(--primary-color);
      color: var(--white);
    }

    .btn-primary:hover {
      background-color: var(--secondary-color);
    }

    .btn-secondary {
      background-color: #ccc;
      color: #333;
    }

    .alert {
      padding: 1rem;
      border-radius: 0.5rem;
      margin-bottom: 1rem;
    }

    .alert-danger {
      background: #ffe0e0;
      color: #b10000;
    }

    .alert-success {
      background: #d4fcd4;
      color: #207520;
    }

    .text-center {
      text-align: center;
    }

    .invalid-feedback {
      color: #d00;
      font-size: 0.85rem;
    }

    .col-half {
      flex: 1;
      min-width: 280px;
    }

    .form-footer {
      margin-top: 1.5rem;
      text-align: center;
      font-size: 0.9rem;
    }

    .form-footer a {
      color: var(--secondary-color);
      text-decoration: none;
    }

    .form-footer a:hover {
      text-decoration: underline;
    }

  </style>
</head>
<body>

<div class="register-container">
  <h2><i class="fas fa-user-plus mr-2"></i>Daftar Akun Pasien</h2>

  {{-- Alert Section --}}
  @if($errors->any())
    <div class="alert alert-danger">
      <strong>Terjadi kesalahan:</strong>
      <ul>
        @foreach($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  @if(session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
  @endif

  {{-- Form --}}
  <form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="row">
      <div class="col-half">
        <div class="form-group">
          <label for="nama">Nama Lengkap *</label>
          <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required>
        </div>

        <div class="form-group">
          <label for="email">Email *</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
          <label for="password">Password *</label>
          <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
          <label for="password_confirmation">Konfirmasi Password *</label>
          <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
      </div>

      <div class="col-half">
        <div class="form-group">
          <label for="no_ktp">Nomor KTP *</label>
          <input type="text" id="no_ktp" name="no_ktp" maxlength="16" value="{{ old('no_ktp') }}" required>
        </div>

        <div class="form-group">
          <label for="no_hp">Nomor HP *</label>
          <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required>
        </div>

        <div class="form-group">
          <label for="alamat">Alamat *</label>
          <textarea id="alamat" name="alamat" rows="4" required>{{ old('alamat') }}</textarea>
        </div>
      </div>
    </div>

    <div class="form-check" style="display: flex; align-items: center; font-size: 1.25rem;">
      <input type="checkbox" id="terms" name="terms" value="1" 
             {{ old('terms') ? 'checked' : '' }} required
             style="width: 24px; height: 24px; margin-right: 12px;">
      <label class="form-check-label" for="terms" style="cursor: pointer;">
        Saya menyetujui <strong>syarat & ketentuan</strong> *
      </label>
    </div>    

    <div class="row" style="margin-top: 1.5rem">
      <div class="col-half">
        <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
      </div>
    </div>
  </form>

  <div class="form-footer">
    Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
  </div>
</div>

{{-- Optional Font Awesome for icons --}}
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>
</html>
