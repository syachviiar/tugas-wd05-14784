<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register | Klinik</title>

  <!-- Styles -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>Admin V3</b>LTE</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Daftar akun baru</p>

        {{-- Tampilkan error validasi --}}
        @if ($errors->any())
      <div class="alert alert-danger">
        <ul style="margin: 0">
        @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
        </ul>
      </div>
    @endif

        <form action="{{ route('register') }}" method="POST">
          @csrf
          <div class="input-group mb-3">
            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
            <div class="input-group-append">
              <div class="input-group-text"><span class="fas fa-user"></span></div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
            <div class="input-group-append">
              <div class="input-group-text"><span class="fas fa-map-marker-alt"></span></div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" name="no_hp" class="form-control" placeholder="No HP" required>
            <div class="input-group-append">
              <div class="input-group-text"><span class="fas fa-phone"></span></div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text"><span class="fas fa-envelope"></span></div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text"><span class="fas fa-lock"></span></div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi Password"
              required>
            <div class="input-group-append">
              <div class="input-group-text"><span class="fas fa-lock"></span></div>
            </div>
          </div>

          {{-- Pilih Role: dokter / pasien --}}
          <div class="mb-3">
            <select name="role" placeholder="Pilih Role" class="form-control" required>
              <option value="">Pilih Role</option>
              <option value="dokter">Dokter</option>
              <option value="pasien">Pasien</option>
            </select>
          </div>

          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                <label for="agreeTerms">
                  Saya setuju dengan <a href="#">syarat & ketentuan</a>
                </label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Daftar</button>
            </div>
          </div>
        </form>

        <a href="{{ route('login') }}" class="text-center">Sudah punya akun? Login</a>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>

</html>