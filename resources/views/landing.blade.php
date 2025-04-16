<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Poliklinik</title>
  <style>
    /* Reset & Global */
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Arial', sans-serif;
      background-color: #f0f8ff;
      margin: 0;
      padding: 0;
      color: #333;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* Container utama */
    .container {
      max-width: 600px;
      margin: auto;
      padding: 40px 20px;
      text-align: center;
      flex-grow: 1;
    }

    h1 {
      font-size: 2.5rem;
      color: #2d4b76;
      margin-bottom: 20px;
    }

    p {
      font-size: 1.2rem;
      color: #555;
      margin-bottom: 30px;
    }

    /* Tombol Login & Register */
    .auth-links a {
      display: inline-block;
      margin: 10px;
      padding: 12px 24px;
      font-size: 1rem;
      border-radius: 30px;
      background-color: #ffffff;
      color: #2d4b76;
      border: 2px solid #2d4b76;
      transition: all 0.3s ease;
    }

    .auth-links a:hover {
      background-color: #58a6a6;
      color: white;
      border-color: #58a6a6;
    }

    /* Footer */
    footer {
      background-color: #ffffff;
      text-align: center;
      padding: 20px 0;
      font-size: 0.95rem;
      color: #777;
      box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.05);
    }

    /* Responsif */
    @media (max-width: 768px) {
      h1 {
        font-size: 2rem;
      }

      p {
        font-size: 1rem;
      }

      .auth-links a {
        font-size: 0.95rem;
        padding: 10px 20px;
        margin: 8px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Selamat Datang di Poliklinik</h1>
    <p>Silakan login sebagai dokter atau pasien.</p>
    <div class="auth-links">
      <a href="{{ route('login') }}">Login</a>
      <a href="{{ route('register') }}">Register</a>
    </div>
  </div>

  <footer>
    <p>&copy; 2025 Poliklinik Sehat. Semua hak dilindungi.</p>
  </footer>
</body>
</html>