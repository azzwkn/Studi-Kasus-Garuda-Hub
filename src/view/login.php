<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Masuk ke Garuda Hub</title>
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
      <h2 class="auth__headline">Selamat datang kembali di Garuda-Hub.</h2>
      <p class="auth__lead">Masuk untuk memasang proyek IT, mengajukan penawaran terbaik, atau memantau progres lelang Anda.</p>
      <ul class="perks">
        <li><span class="bullet" aria-hidden="true"><svg class="icon"><path d="M5 12l5 5 9-10"/></svg></span>PProyek IT terkurasi dari klien di seluruh Nusantara</li>
        <li><span class="bullet" aria-hidden="true"><svg class="icon"><path d="M5 12l5 5 9-10"/></svg></span>Kelola lelang, penawaran, dan pemenang dalam satu tempat</li>
        <li><span class="bullet" aria-hidden="true"><svg class="icon"><path d="M5 12l5 5 9-10"/></svg></span>Proses transparan antara klien dan developer terpercaya</li>
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

      <?php if (!empty($err)): ?>
        <div style="background:#fee2e2; color:#991b1b; padding:10px 14px; border-radius:8px; margin-bottom:14px; font-size:14px;">
          <?= e($err) ?>
        </div>
      <?php endif; ?>

      <form class="form" method="post" action="?page=login">
        <?= csrf_field() ?>

        <div class="field">
          <label class="field__label" for="id">Email</label>
          <input class="input" id="id" name="email" type="email" maxlength="100" autocomplete="username" placeholder="nama@email.com" value="<?= e($email ?? '') ?>" required>
        </div>

        <div class="field">
          <div class="field__row">
            <label class="field__label" for="pw">Kata sandi</label>
          </div>
          <div class="input-wrap">
            <input class="input" id="pw" name="password" type="password" autocomplete="current-password" placeholder="Masukkan kata sandi" required>
            <button type="button" class="input-wrap__btn" data-toggle-password="#pw" aria-pressed="false">Tampilkan</button>
          </div>
        </div>


        <button type="submit" class="btn btn--red btn--block">Masuk</button>
      </form>

      <p class="auth-card__foot">Belum punya akun? <a class="link-red" href="?page=register">Daftar sekarang</a></p>
    </div>
  </main>
</div>

<script src="asset/js/app.js"></script>
</body>
</html>