<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 - Halaman Tidak Ditemukan</title>
  <style>
    :root {
      --primary: #003049;
      --accent: #d62828;
      --background: #f8f9fa;
      --text: #343a40;
      --muted: #6c757d;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-color: var(--background);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      text-align: center;
      padding: 80px 20px;
      color: var(--text);
    }

    h1 {
      font-size: 120px;
      color: var(--accent);
      animation: shake 1s infinite alternate;
    }

    h2 {
      font-size: 28px;
      margin-bottom: 15px;
    }

    p {
      font-size: 16px;
      color: var(--muted);
      margin-bottom: 30px;
    }

    a {
      padding: 12px 24px;
      background-color: var(--primary);
      color: #fff;
      text-decoration: none;
      border-radius: 8px;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    a:hover {
      background-color: #012a3e;
    }

    @keyframes shake {
      0% { transform: rotate(-1deg); }
      100% { transform: rotate(1deg); }
    }

    @media (max-width: 600px) {
      h1 {
        font-size: 80px;
      }

      h2 {
        font-size: 22px;
      }

      p {
        font-size: 14px;
      }
    }
  </style>
</head>
<body>
  <h1>404</h1>
  <h2>Oops! Halaman tidak ditemukan.</h2>
  <p>Halaman yang kamu cari mungkin telah dipindahkan, dihapus, atau tidak pernah ada.</p>
  <a href="/">Kembali ke Beranda</a>
</body>
</html>