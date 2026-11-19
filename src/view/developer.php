<?php
$totalPenawaran = count($bids);
$jmlMenang = 0;
$jmlMenunggu = 0;
$jmlKalah = 0;

foreach ($bids as $item) {
    $isMenang = (int)($item['is_winner'] ?? 0) === 1;
    $statusProyek = (string)($item['status'] ?? '');
    if ($isMenang) {
        $jmlMenang++;
    } elseif ($statusProyek === 'terbuka') {
        $jmlMenunggu++;
    } else {
        $jmlKalah++;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dasbor Developer - Garuda-Hub</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,700;9..144,800&family=Onest:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="asset/css/developer.css">
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
      <a href="?page=home">Proyek</a>
      <a href="?page=dashboard" class="aktif" aria-current="page">Dasbor</a>
    </nav>

    <div class="pengguna">
      <div class="avatar"><?= e(mb_strtoupper(mb_substr($u['nama'], 0, 1))) ?></div>
      <div>
        <strong><?= e($u['nama']) ?></strong>
        <span>Developer</span>
      </div>
      <form class="form-keluar" method="post" action="?page=logout">
        <?= csrf_field() ?>
        <button type="submit" class="keluar">Keluar</button>
      </form>
    </div>
  </div>
</header>

<main class="konten">
  <div class="judul-halaman">
    <div>
      <h1>Penawaran Saya</h1>
      <p class="subjudul">Pantau seluruh penawaran yang telah Anda kirimkan dan status pemilihannya.</p>
    </div>
    <a class="tombol-utama" href="?page=home">Cari Proyek Terbuka</a>
  </div>

  <?php if ($f): ?>
    <div class="<?= $f[1] === 'err' ? 'pesan-galat' : 'pesan-sukses' ?>" role="status">
      <?= e($f[0]) ?>
    </div>
  <?php endif; ?>

  <!-- Ringkasan Statistik Penawaran -->
  <section class="ringkasan" aria-label="Ringkasan penawaran">
    <div class="kpi">
      <span class="kpi__label">Total Penawaran</span>
      <strong class="kpi__nilai"><?= $totalPenawaran ?></strong>
      <span class="kpi__ket">Proyek yang diikuti</span>
    </div>
    <div class="kpi">
      <span class="kpi__label">Terpilih Pemenang</span>
      <strong class="kpi__nilai kpi__nilai--emas"><?= $jmlMenang ?></strong>
      <span class="kpi__ket">Penawaran disetujui klien</span>
    </div>
    <div class="kpi">
      <span class="kpi__label">Menunggu Hasil</span>
      <strong class="kpi__nilai kpi__nilai--hijau"><?= $jmlMenunggu ?></strong>
      <span class="kpi__ket">Lelang masih terbuka</span>
    </div>
    <div class="kpi">
      <span class="kpi__label">Lelang Selesai</span>
      <strong class="kpi__nilai kpi__nilai--merah"><?= $jmlKalah ?></strong>
      <span class="kpi__ket">Ditutup / tidak terpilih</span>
    </div>
  </section>

  <!-- Tabel Penawaran Saya -->
  <section class="kartu">
    <div class="kartu__kepala">
      <div>
        <h2>Daftar Penawaran</h2>
        <p class="kartu__sub">Klik judul proyek untuk melihat detail lelang atau daftar penawar lainnya.</p>
      </div>
      <?php if ($bids): ?>
        <input type="search" id="cari-bid" class="input-cari" placeholder="Cari proyek atau klien..." aria-label="Cari penawaran">
      <?php endif; ?>
    </div>

    <?php if (!$bids): ?>
      <div class="kosong">
        <p>Anda belum mengajukan penawaran pada proyek mana pun.</p>
        <a class="tombol-utama" href="?page=home">Jelajahi Proyek Sekarang</a>
      </div>
    <?php else: ?>
      <div class="tabel-bungkus">
        <table id="tabel-bid">
          <thead>
            <tr>
              <th>Proyek</th>
              <th>Klien</th>
              <th>Harga Penawaran</th>
              <th>Durasi</th>
              <th>Batas Lelang</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($bids as $b): ?>
              <?php
                $pid = (int)($b['project_id'] ?? 0);
                $isMenang = (int)($b['is_winner'] ?? 0) === 1;
                $statusProyek = (string)($b['status'] ?? 'terbuka');
                $durasi = (int)($b['durasi'] ?? $b['durasi_hari'] ?? 0);
              ?>
              <tr class="<?= $isMenang ? 'baris-pemenang' : '' ?>">
                <td>
                  <a class="judul-proyek" href="?page=project&amp;id=<?= $pid ?>"><?= e($b['judul']) ?></a>
                </td>
                <td><?= e($b['klien']) ?></td>
                <td class="harga-kolom">Rp <?= number_format((int)$b['harga'], 0, ',', '.') ?></td>
                <td><?= $durasi ?> hari</td>
                <td><?= e((string)$b['batas_lelang']) ?></td>
                <td>
                  <div class="status-grup">
                    <span class="status <?= e($statusProyek) ?>"><?= e(ucfirst($statusProyek)) ?></span>
                    <?php if ($isMenang): ?>
                      <span class="badge-pemenang">★ Pemenang</span>
                    <?php endif; ?>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </section>

  <p class="catatan-batas">
    Catatan: Satu developer hanya dapat mengirim satu penawaran per proyek. Penawaran yang sudah dikirim tidak dapat diubah atau ditarik kembali.
  </p>
</main>

<script>
const inputCari = document.getElementById('cari-bid');
const tabelBid = document.getElementById('tabel-bid');
if (inputCari && tabelBid) {
  inputCari.addEventListener('input', function () {
    const kata = this.value.toLowerCase().trim();
    tabelBid.querySelectorAll('tbody tr').forEach(function (baris) {
      baris.style.display = baris.textContent.toLowerCase().includes(kata) ? '' : 'none';
    });
  });
}
</script>
</body>
</html>