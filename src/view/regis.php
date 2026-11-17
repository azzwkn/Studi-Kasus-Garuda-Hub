<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar di Garuda Hub</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&amp;family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap">
  <link rel="stylesheet" href="asset/css/regis%20n%20login.css">
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
      <h2 class="auth__headline">Mulai pasang proyek atau tawarkan keahlian Anda.</h2>
      <p class="auth__lead">Daftar gratis, lalu pilih peran Anda sebagai Klien atau Developer.</p>
      <ol class="steps">
        <li><span class="bullet" aria-hidden="true">1</span><div><div class="steps__title">Isi data diri</div><div class="steps__text">Nama lengkap dan alamat email aktif.</div></div></li>
        <li><span class="bullet" aria-hidden="true">2</span><div><div class="steps__title">Pilih peran</div><div class="steps__text">Daftar sebagai klien pembuat proyek, atau developer penawar jasa.</div></div></li>
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

      <?php if (!empty($err)): ?>
        <div style="background:#fee2e2; color:#991b1b; padding:10px 14px; border-radius:8px; margin-bottom:14px; font-size:14px;">
          <?= e($err) ?>
        </div>
      <?php endif; ?>

      <div class="segmented segmented--full" role="group" aria-label="Daftar sebagai">
        <button type="button" class="segmented__btn" data-role="klien" aria-pressed="<?= (($role ?? 'klien') === 'klien') ? 'true' : 'false' ?>" onclick="pilihPeran('klien', this)">Klien</button>
        <button type="button" class="segmented__btn" data-role="developer" aria-pressed="<?= (($role ?? 'klien') === 'developer') ? 'true' : 'false' ?>" onclick="pilihPeran('developer', this)">Developer</button>
      </div>

      <form class="form" method="post" action="?page=register">
        <?= csrf_field() ?>
        <input type="hidden" name="role" id="role-input" value="<?= e($role ?? 'klien') ?>">

        <div class="field">
          <label class="field__label" for="nama">Nama lengkap</label>
          <input class="input" id="nama" name="nama" type="text" maxlength="100" autocomplete="name" placeholder="Nama sesuai identitas" value="<?= e($nama ?? '') ?>" required>
        </div>