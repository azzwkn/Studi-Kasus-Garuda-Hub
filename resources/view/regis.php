@extends('layouts.app')

@section('title', 'REGISTRASI')

@section('content')
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar di Garuda Hub</title>
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
      <h2 class="auth__headline">Mulai belanja atau berjualan dari satu akun.</h2>
      <p class="auth__lead">Daftar gratis, lalu pilih peran Anda sebagai pembeli atau penjual.</p>
      <ol class="steps">
        <li><span class="bullet" aria-hidden="true">1</span><div><div class="steps__title">Isi data diri</div><div class="steps__text">Nama, email, dan nomor ponsel aktif.</div></div></li>
        <li><span class="bullet" aria-hidden="true">2</span><div><div class="steps__title">Pilih peran</div><div class="steps__text">Daftar sebagai pembeli, atau buka toko sebagai penjual.</div></div></li>
        <li><span class="bullet" aria-hidden="true">3</span><div><div class="steps__title">Masuk dan mulai</div><div class="steps__text">Akun siap dipakai setelah Anda masuk.</div></div></li>
      </ol>
    </div>

    <div class="auth__copy">© 2026 Garuda Hub. Semua hak dilindungi.</div>
  </aside>

  <main class="auth__main">
    <div class="auth-card auth-card--wide">
      <div>
        <div class="auth-card__bar"></div>
        <h1 class="auth-card__title">Buat Akun</h1>
        <p class="auth-card__sub">Cukup beberapa menit untuk bergabung.</p>
      </div>

      <div class="segmented segmented--full" role="group" aria-label="Daftar sebagai">
        <button type="button" class="segmented__btn" data-role="buyer" aria-pressed="true">Pembeli</button>
        <button type="button" class="segmented__btn" data-role="seller" aria-pressed="false">Penjual</button>
      </div>

      <form class="form" action="login.html">
        <div class="field">
          <label class="field__label" for="nama">Nama lengkap</label>
          <input class="input" id="nama" name="nama" type="text" autocomplete="name" placeholder="Nama sesuai identitas" required>
        </div>

        <div class="field" id="seller-field" hidden>
          <label class="field__label" for="toko">Nama toko</label>
          <input class="input" id="toko" name="toko" type="text" placeholder="Contoh: Batik Nusantara">
          <span class="field__hint">Nama toko tampil di halaman produk dan dapat diubah nanti.</span>
        </div>

        <div class="field">
          <label class="field__label" for="email">Email</label>
          <input class="input" id="email" name="email" type="email" autocomplete="email" placeholder="nama@email.com" required>
        </div>

        <div class="field">
          <label class="field__label" for="hp">Nomor ponsel</label>
          <div class="phone">
            <span class="phone__code">+62</span>
            <input class="input" id="hp" name="hp" type="tel" autocomplete="tel-national" placeholder="812 3456 7890" required>
          </div>
        </div>

        <div class="field">
          <label class="field__label" for="pw">Kata sandi</label>
          <div class="input-wrap">
            <input class="input" id="pw" name="password" type="password" autocomplete="new-password" placeholder="Minimal 8 karakter" minlength="8" required>
            <button type="button" class="input-wrap__btn" data-toggle-password="#pw" aria-pressed="false">Tampilkan</button>
          </div>
          <span class="field__hint">Gunakan kombinasi huruf, angka, dan simbol agar lebih aman.</span>
        </div>

        <label class="check check--top">
          <input type="checkbox" name="setuju" required>
          <span>Saya menyetujui <a class="link-red" href="#">Syarat &amp; Ketentuan</a> dan <a class="link-red" href="#">Kebijakan Privasi</a> Garuda Hub.</span>
        </label>

        <button type="submit" class="btn btn--red btn--block" id="submit-label">Buat Akun</button>
      </form>

      <p class="auth-card__foot">Sudah punya akun? <a class="link-red" href="login.html">Masuk</a></p>
    </div>
  </main>
</div>

<script src="js/app.js"></script>
</body>
</html>
@endsection
