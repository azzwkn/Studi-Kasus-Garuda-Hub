
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dasbor - Garuda-Hub</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,700;9..144,800&family=Onest:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/asset/css/klien/dashboard.css">
</head>
<body>

<header class="menu-atas">
  <div class="menu-atas-isi">
    <div class="brand">
      <div class="brand-logo">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3l2 4 3-2-1 5 6-3-3 6-4 1 1 4h-2l-2-3-2 3H8l1-4-4-1-3-6 6 3-1-5 3 2z"/></svg>
      </div>
      <strong>Garuda-Hub</strong>
    </div>

    <nav aria-label="Menu utama">
      <a href="?page=dashboard" class="aktif" aria-current="page">Dasbor</a>
      <a href="?page=home">Proyek</a>
      <a href="?page=post">Pasang Proyek</a>
    </nav>

    <div class="pengguna">
      <div class="avatar"><?= e(mb_strtoupper(mb_substr($u['nama'], 0, 1))) ?></div>
      <div><strong><?= e($u['nama']) ?></strong><span>Klien</span></div>
      <form method="post" action="?page=logout"><?= csrf_field() ?><button type="submit" class="keluar">Keluar</button></form>
    </div>
  </div>
</header>

<main class="konten">
  <div class="judul-halaman">
    <h1>Proyek Saya</h1>
    <a href="?page=post" class="btn">Pasang Proyek</a>
  </div>

  <?php if ($f): ?>
    <div class="<?= $f[1] === 'err' ? 'pesan-galat' : 'pesan-sukses' ?>" role="status"><?= e($f[0]) ?></div>
  <?php endif; ?>

  <section class="kartu">
    <?php if (!$proyek): ?>
      <div class="kosong">
        <p>Anda belum memasang proyek.</p>
        <a href="?page=post" class="btn">Pasang Proyek</a>
      </div>
    <?php else: ?>
      <div class="tabel-bungkus">
        <table>
          <thead>
            <tr>
              <th>Judul</th>
              <th>Status</th>
              <th>Budget</th>
              <th>Batas Lelang</th>
              <th class="angka">Penawaran</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($proyek as $p): ?>
              <tr>
                <td><a class="judul-proyek" href="?page=project&amp;id=<?= (int)$p['id'] ?>"><?= e($p['judul']) ?></a></td>
                <td><span class="status <?= e($p['status']) ?>"><?= e(ucfirst((string)$p['status'])) ?></span></td>
                <td><?= rp($p['budget_min']) ?> - <?= rp($p['budget_max']) ?></td>
                <td><?= e(date('d/m/Y', strtotime((string)$p['batas_lelang']))) ?></td>
                <td class="angka"><?= (int)$p['jml'] ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </section>
</main>
</main>
</body>
</html>