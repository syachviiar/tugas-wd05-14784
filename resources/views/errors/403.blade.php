<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>403 - Akses Ditolak</title>
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
      animation: bounce 1.2s infinite alternate;
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

    @keyframes bounce {
      0% { transform: translateY(0); }
      100% { transform: translateY(-10px); }
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
  <h1>403</h1>
  <h2>Akses Ditolak</h2>
  <p>Maaf, kamu tidak memiliki izin untuk mengakses halaman ini.</p>
  <a href="/">Kembali ke Beranda</a>
</body>
</html>