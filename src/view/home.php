<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Proyek - Garuda-Hub</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,700;9..144,800&family=Onest:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="asset/css/home.css">
</head>
<body>

<header class="menu-atas">
  <div class="menu-atas-isi">
    <a class="brand" href="?page=home">
      <svg class="brand-logo" viewBox="0 0 36 36" aria-hidden="true">
        <rect class="bg" width="36" height="36" rx="10"/>
        <circle class="wing" cx="18" cy="9" r="3.2"/>
        <path class="wing" d="M16 14C11 12 6 12 2 8c1 8 6 13 13 14z"/>
        <path class="wing" d="M20 14c5-2 10-2 14-6-1 8-6 13-13 14z"/>
        <path class="wing" d="M15 24l3 9 3-9z"/>
      </svg>
      <strong>Garuda-Hub</strong>
    </a>

    <nav aria-label="Menu utama">
      <a href="?page=home" class="aktif">Proyek</a>
      <?php if ($u): ?>
        <?php if ($u['role'] === 'klien'): ?>
          <a href="?page=post">Pasang Proyek</a>
          <a href="?page=dashboardklie">Dasbor</a>
        <?php elseif ($u['role'] === 'developer'): ?>
          <a href="?page=dashboard">Dasbor</a>
        <?php elseif ($u['role'] === 'admin'): ?>
          <a href="?page=admin">Admin</a>
        <?php endif; ?>
      <?php endif; ?>
    </nav>

    <div class="pengguna">
      <?php if ($u): ?>
        <span><?= e($u['nama']) ?> (<?= e($u['role']) ?>)</span>
        <form class="form-keluar" method="post" action="?page=logout">
          <?= csrf_field() ?>
          <button type="submit" class="keluar">Keluar</button>
        </form>
      <?php else: ?>
        <a href="?page=login" class="btn">Masuk</a>
        <a href="?page=register" class="btn">Daftar</a>
      <?php endif; ?>
    </div>
  </div>
</header>

<main class="konten">
  <?php if ($f): ?>
    <div class="flash <?= e($f[1]) ?>"><?= e($f[0]) ?></div>
  <?php endif; ?>

  <section class="hero-cari">
    <h1>Daftar Proyek</h1>
    <form class="form-cari" method="get" action="">
      <input type="hidden" name="page" value="home">
      <input type="text" name="q" maxlength="<?= PROJ_CARI_MAX ?>" placeholder="Cari judul atau kategori..." value="<?= e($s) ?>">
      <button type="submit">Cari</button>
    </form>

    <?php if ($s !== ''): ?>
      <p class="info-cari">Hasil pencarian untuk: <b><?= e($s) ?></b> (<?= count($rows) ?> proyek)</p>
    <?php endif; ?>
  </section>

  <section class="daftar-proyek">
    <?php if (!$rows): ?>
      <div class="kartu kosong">
        <p>Belum ada proyek yang cocok.</p>
      </div>
    <?php else: ?>
      <?php foreach ($rows as$p): ?>
        <article class="kartu-proyek">
          <div class="kartu-proyek__atas">
            <h2>
              <a href="?page=project&amp;id=<?= (int)$p['id'] ?>"><?= e($p['judul']) ?></a>
            </h2>
            <span class="status <?= e($p['status']) ?>"><?= e(ucfirst((string)$p['status'])) ?></span>
          </div>

          <p class="meta">
            Kategori: <strong><?= e($p['kategori']) ?></strong> •
            Klien: <strong><?= e($p['klien']) ?></strong> •
            Budget: <strong><?= rp($p['budget_min']) ?> - <?= rp($p['budget_max']) ?></strong> •
            Batas: <strong><?= e($p['batas_lelang']) ?></strong> •
            <strong><?= (int)$p['jml'] ?></strong> penawaran
          </p>

          <p class="deskripsi">
            <?= e(mb_strimwidth((string)$p['deskripsi'], 0, 160, '...')) ?>
          </p>
        </article>
      <?php endforeach; ?>
    <?php endif; ?>
  </section>
</main>

</body>
</html>