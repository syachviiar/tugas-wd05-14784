<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>HealthLink - Sistem Kesehatan Profesional</title>
  <meta name="description" content="HealthLink - Layanan Kesehatan Digital Profesional, Terhubung, dan Cepat. Sistem kesehatan modern untuk semua kebutuhan medis Anda.">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary-color: #003049;
      --secondary-color: #669bbc;
      --background: #f8f9fa;
      --text-dark: #1c1c1c;
      --white: #fff;
      --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: var(--background);
      color: var(--text-dark);
      line-height: 1.6;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    .container {
      width: 90%;
      max-width: 1200px;
      margin: auto;
    }

    /* Header */
    header {
      background: var(--white);
      padding: 1rem 0;
      box-shadow: var(--shadow);
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    header .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header nav {
      display: flex;
      gap: 1.5rem;
      align-items: center;
    }

    header nav a.btn {
      text-decoration: none !important;
      font-weight: 600;
      border-radius: 0.5rem;
    }
    
    .btn {
      padding: 0.6rem 1.2rem;
      border: none;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .btn-primary {
      background-color: var(--primary-color);
      color: var(--white);
    }

    .btn-large {
      padding: 0.9rem 2rem;
      font-size: 1.1rem;
      font-weight: 600;
      border-radius: 0.75rem;
      box-shadow: 0 6px 16px rgba(0, 48, 73, 0.15);
    }

    .btn:hover {
      background-color: var(--secondary-color);
      color: var(--white);
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(102, 155, 188, 0.3);
    }

    header nav a {
      position: relative;
      font-weight: 500;
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
      transition: background-color 0.3s, color 0.3s;
    }

    header nav a:hover {
      background-color: rgba(102, 155, 188, 0.2); /* secondary color dengan transparansi */
      color: var(--primary-color);
    }

    /* Hero */
    .hero {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 2rem;
    padding: 4rem 0;
    background: var(--white);
    }

    .hero > div {
    flex: 1 1 50%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    min-width: 300px;
    }

    .hero img {
    width: 100%;
    height: auto;
    max-width: 500px;
    margin: 0 auto;
    border-radius: 1rem;
    box-shadow: var(--shadow);
    display: block;
    }

    .hero h2 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    color: var(--primary-color);
    }

    .hero p {
    font-size: 1.1rem;
    margin-bottom: 1.5rem;
    max-width: 600px;
    }

    .hero a {
    display: inline-block;
    margin-top: 0.5rem;
    }

    /* Features */
    .features {
      background: #e3e8ef;
      padding: 4rem 1rem;
    }

    .features h2 {
      text-align: center;
      margin-bottom: 2rem;
      color: var(--primary-color);
      font-size: 2rem;
    }

    .features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 1.5rem;
    }

    .feature-card {
      background: white;
      padding: 1.5rem;
      border-radius: 0.75rem;
      box-shadow: var(--shadow);
      transition: transform 0.3s ease;
    }

    .feature-card:hover {
      transform: translateY(-5px);
    }

    .feature-card h4 {
      margin-bottom: 0.5rem;
      color: var(--primary-color);
    }

    /* Testimonials */
    .testimonials {
      padding: 4rem 1rem;
      background: var(--white);
    }

    .testimonials h2 {
      text-align: center;
      margin-bottom: 2rem;
      color: var(--primary-color);
      font-size: 2rem;
    }

    .testimonial-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 1.5rem;
    }

    .testimonial-card {
      background: #f1f3f5;
      padding: 1.25rem;
      border-radius: 0.75rem;
      box-shadow: var(--shadow);
      opacity: 0;
      transform: translateY(20px);
      transition: all 0.6s ease-out;
    }

    .testimonial-card.active {
      opacity: 1;
      transform: translateY(0);
    }

    .testimonial-card strong {
      display: block;
      margin-top: 0.5rem;
      color: var(--primary-color);
    }

    .scroll-animate {
      opacity: 0;
      transform: translateY(20px) scale(0.98);
      transition: all 0.6s ease-out;
    }

    .scroll-animate.active {
      opacity: 1;
      transform: translateY(0) scale(1);
    }

    /* Footer */
    footer {
      background: #1d3557;
      color: var(--white);
      text-align: center;
      padding: 2rem 1rem;
    }

    @media (max-width: 768px) {
      .hero {
        flex-direction: column;
        text-align: center;
      }
    }
  </style>
</head>
<body>

  <!-- Header -->
  <header>
    <div class="container">
      <h1>HealthLink</h1>
      <nav>
        <a href="#home">Beranda</a>
        <a href="#features">Fitur</a>
        <a href="#testimonials">Testimoni</a>
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
      </nav>
    </div>
  </header>

  <!-- Hero -->
  <section class="hero scroll-animate" id="home">
    <div class="container">
      <div>
        <h2>Sistem Kesehatan Digital Terdepan</h2>
        <p>HealthLink menghadirkan solusi medis modern berbasis teknologi digital, memudahkan pasien mengakses layanan kesehatan kapan saja dan di mana saja.</p>
          <a href="{{ route('register') }}" class="btn btn-primary btn-large">Daftar Sekarang</a>       
        </div>
      </div>
    </div>
  </section>  

  <!-- Features -->
  <section class="features scroll-animate" id="features">
    <div class="container">
      <h2>Fitur Unggulan</h2>
      <div class="features-grid">
        <div class="feature-card"><h4>Respons Cepat ⚡</h4><p>Tim kami selalu siap merespon kebutuhan Anda dengan cepat dan akurat.</p></div>
        <div class="feature-card"><h4>Akses 24/7 💬</h4><p>Konsultasi dan penanganan tersedia kapan saja, 24 jam penuh.</p></div>
        <div class="feature-card"><h4>Data Aman 🔒</h4><p>Sistem kami menjamin kerahasiaan dan keamanan seluruh informasi pasien.</p></div>
        <div class="feature-card"><h4>Integrasi Sistem 🔄</h4><p>Mendukung integrasi dengan rekam medis digital dan layanan farmasi.</p></div>
        <div class="feature-card"><h4>Tenaga Medis Profesional 🩺</h4><p>Ditangani oleh dokter dan tenaga medis bersertifikat dan berpengalaman.</p></div>
        <div class="feature-card"><h4>Reservasi Online 📅</h4><p>Pendaftaran kunjungan jadi mudah, cepat, dan tanpa antrean.</p></div>
        <div class="feature-card"><h4>Pelacakan Obat 💊</h4><p>Pasien dapat memantau status resep dan obat secara real-time.</p></div>
        <div class="feature-card"><h4>Riwayat Medis Digital 📂</h4><p>Lihat dan kelola seluruh riwayat kesehatan Anda dengan mudah.</p></div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="testimonials" id="testimonials">
    <div class="container">
      <h2>Apa Kata Pasien Kami?</h2>
      <div class="testimonial-grid">
        <div class="testimonial-card scroll-animate"><p>"Dokternya sabar, sistemnya rapi banget. Saya senang jadi pasien di sini."</p><strong>– Nadia</strong></div>
        <div class="testimonial-card scroll-animate"><p>"Proses daftar dan konsultasi sangat cepat dan efisien. Top!"</p><strong>– Rian</strong></div>
        <div class="testimonial-card scroll-animate"><p>"Semua bisa online, dari booking sampai lihat hasil lab. Praktis sekali."</p><strong>– Melisa</strong></div>
        <div class="testimonial-card scroll-animate"><p>"Tenaga medisnya profesional, sangat informatif dan ramah."</p><strong>– Farhan</strong></div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 HealthLink. Seluruh hak cipta dilindungi.</p>
  </footer>

  <!-- Scroll Animation JS -->
  <script>
    function animateScroll() {
      const elements = document.querySelectorAll('.scroll-animate');
      elements.forEach((el, index) => {
        const rect = el.getBoundingClientRect();
        const trigger = window.innerHeight * 0.85;
        if (rect.top < trigger) {
          setTimeout(() => {
            el.classList.add('active');
          }, index * 450);
        }
      });
    }
  
    window.addEventListener('scroll', animateScroll);
    window.addEventListener('load', animateScroll);
  </script>

</body>
</html>