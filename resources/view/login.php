@extends('layouts.app')

@section('title', 'LOGIN')

@section('content')
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Masuk ke Garuda Hub</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&amp;family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="auth">

  <aside class="auth__aside">
    <svg class="auth__pattern" aria-hidden="true">
      <defs>
        <pattern id="kawung" width="56" height="56" patternUnits="userSpaceOnUse">
          <g class="kawung">
            <ellipse cx="28" cy="14" rx="10" ry="14"/>
            <ellipse cx="28" cy="42" rx="10" ry="14"/>
            <ellipse cx="14" cy="28" rx="14" ry="10"/>
            <ellipse cx="42" cy="28" rx="14" ry="10"/>
          </g>
        </pattern>
      </defs>
      <rect width="100%" height="100%" fill="url(#kawung)"/>
    </svg>

    <div class="brand">
      <svg class="brand__logo" viewBox="0 0 36 36" aria-hidden="true">
        <rect class="bg" width="36" height="36" rx="10"/>
        <circle class="wing" cx="18" cy="9" r="3.2"/>
        <path class="wing" d="M16 14C11 12 6 12 2 8c1 8 6 13 13 14z"/>
        <path class="wing" d="M20 14c5-2 10-2 14-6-1 8-6 13-13 14z"/>
        <path class="wing" d="M15 24l3 9 3-9z"/>
      </svg>
      <div class="brand__name">Garuda Hub</div>
    </div>

    <div class="auth__pitch">
      <h2 class="auth__headline">Selamat datang kembali di rumah belanja Nusantara.</h2>
      <p class="auth__lead">Masuk untuk melanjutkan belanja, memantau pesanan, atau mengelola toko Anda.</p>
      <ul class="perks">
        <li><span class="bullet" aria-hidden="true"><svg class="icon"><path d="M5 12l5 5 9-10"/></svg></span>Produk dari penjual di seluruh Nusantara</li>
        <li><span class="bullet" aria-hidden="true"><svg class="icon"><path d="M5 12l5 5 9-10"/></svg></span>Pantau pesanan dan penjualan dalam satu tempat</li>
        <li><span class="bullet" aria-hidden="true"><svg class="icon"><path d="M5 12l5 5 9-10"/></svg></span>Voucher dan promo kampanye setiap pekan</li>
      </ul>
    </div>

    <div class="auth__copy">© 2026 Garuda Hub. Semua hak dilindungi.</div>
  </aside>

  <main class="auth__main">
    <div class="auth-card">
      <div>
        <div class="auth-card__bar"></div>
        <h1 class="auth-card__title">Masuk</h1>
        <p class="auth-card__sub">Gunakan email atau nomor ponsel yang terdaftar.</p>
      </div>

      <form class="form" action="index.html">
        <div class="field">
          <label class="field__label" for="id">Email atau nomor ponsel</label>
          <input class="input" id="id" name="id" type="text" autocomplete="username" placeholder="nama@email.com" required>
        </div>

        <div class="field">
          <div class="field__row">
            <label class="field__label" for="pw">Kata sandi</label>
            <a class="link-red" href="#">Lupa kata sandi?</a>
          </div>
          <div class="input-wrap">
            <input class="input" id="pw" name="password" type="password" autocomplete="current-password" placeholder="Masukkan kata sandi" required>
            <button type="button" class="input-wrap__btn" data-toggle-password="#pw" aria-pressed="false">Tampilkan</button>
          </div>
        </div>

        <label class="check"><input type="checkbox" name="remember"> Ingat saya di perangkat ini</label>

        <button type="submit" class="btn btn--red btn--block">Masuk</button>
      </form>

      <div class="divider"><span>atau</span></div>

      <a class="btn btn--gold-soft btn--block" href="#">
        <svg class="icon" aria-hidden="true"><path d="M7 2h10a1 1 0 011 1v18a1 1 0 01-1 1H7a1 1 0 01-1-1V3a1 1 0 011-1z M11 18h2"/></svg>
        Masuk dengan kode OTP
      </a>

      <p class="auth-card__foot">Belum punya akun? <a class="link-red" href="register.html">Daftar sekarang</a></p>
    </div>
  </main>
</div>

<script src="js/app.js"></script>
</body>
</html>

@endsection