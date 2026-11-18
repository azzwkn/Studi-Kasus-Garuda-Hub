<?php
$totalUsers = count($users);
$jmlKlien = 0;
$jmlDev = 0;
$jmlAdmin = 0;
foreach ($users as $usr) {
    if (($usr['role'] ?? '') === 'klien') $jmlKlien++;
    elseif (($usr['role'] ?? '') === 'developer') $jmlDev++;
    elseif (($usr['role'] ?? '') === 'admin') $jmlAdmin++;
}

$totalProyek = count($projects);
$proyekTerbuka = 0;
$proyekDitutup = 0;
foreach ($projects as $prj) {
    if (($prj['status'] ?? '') === 'terbuka') $proyekTerbuka++;
    else $proyekDitutup++;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Panel Admin - Garuda-Hub</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,700;9..144,800&family=Onest:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="asset/css/admin.css">
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
      <a href="?page=admin" class="aktif" aria-current="page">Admin</a>
    </nav>

    <div class="pengguna">
      <div class="avatar"><?= e(mb_strtoupper(mb_substr($u['nama'], 0, 1))) ?></div>
      <div>
        <strong><?= e($u['nama']) ?></strong>
        <span>Administrator</span>
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
      <h1>Panel Administrasi</h1>
      <p class="subjudul">Kelola peran pengguna, moderasi akun, dan pantau pelelangan proyek aktif.</p>
    </div>
  </div>

  <?php if ($f): ?>
    <div class="<?= $f[1] === 'err' ? 'pesan-galat' : 'pesan-sukses' ?>" role="status">
      <?= e($f[0]) ?>
    </div>
  <?php endif; ?>

  <!-- Ringkasan Statistik -->
  <section class="ringkasan" aria-label="Ringkasan data sistem">
    <div class="kpi">
      <span class="kpi__label">Total Pengguna</span>
      <strong class="kpi__nilai"><?= $totalUsers ?></strong>
      <span class="kpi__ket"><?= $jmlKlien ?> Klien • <?= $jmlDev ?> Developer • <?= $jmlAdmin ?> Admin</span>
    </div>
    <div class="kpi">
      <span class="kpi__label">Total Proyek</span>
      <strong class="kpi__nilai"><?= $totalProyek ?></strong>
      <span class="kpi__ket">Seluruh proyek terdaftar</span>
    </div>
    <div class="kpi">
      <span class="kpi__label">Lelang Terbuka</span>
      <strong class="kpi__nilai kpi__nilai--hijau"><?= $proyekTerbuka ?></strong>
      <span class="kpi__ket">Sedang menerima penawaran</span>
    </div>
    <div class="kpi">
      <span class="kpi__label">Lelang Ditutup</span>
      <strong class="kpi__nilai kpi__nilai--merah"><?= $proyekDitutup ?></strong>
      <span class="kpi__ket">Selesai / pemenang dipilih</span>
    </div>
  </section>

  <!-- Tabel Kelola User -->
  <section class="kartu">
    <div class="kartu__kepala">
      <div>
        <h2>Kelola User</h2>
        <p class="kartu__sub">Ubah peran pengguna atau hapus akun beserta seluruh proyek dan penawarannya.</p>
      </div>
      <input type="search" id="cari-user" class="input-cari" placeholder="Cari nama atau email..." aria-label="Cari user">
    </div>

    <div class="tabel-bungkus">
      <table id="tabel-user">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Peran</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $x): ?>
            <?php $id = (int)$x['id']; ?>
            <tr>
              <td class="id-kolom">#<?= $id ?></td>
              <td class="nama-kolom"><?= e($x['nama']) ?></td>
              <td><?= e($x['email']) ?></td>
              <td>
                <span class="badge-role role-<?= e($x['role']) ?>">
                  <?= e(ucfirst((string)$x['role'])) ?>
                </span>
              </td>
              <td>
                <?php if ($id === $u['id']): ?>
                  <span class="akun-anda">(akun Anda)</span>
                <?php else: ?>
                  <div class="aksi-grup">
                    <form class="form-inline" method="post" action="?page=admin">
                      <?= csrf_field() ?>
                      <input type="hidden" name="act" value="role">
                      <input type="hidden" name="user_id" value="<?= $id ?>">
                      <select name="role" class="pilih-role" aria-label="Peran untuk <?= e($x['nama']) ?>">
                        <?php foreach (ROLES as $r): ?>
                          <option value="<?= e($r) ?>"<?= $r === $x['role'] ? ' selected' : '' ?>><?= e(ucfirst($r)) ?></option>
                        <?php endforeach; ?>
                      </select>
                      <button type="submit" class="btn-ubah">Ubah</button>
                    </form>

                    <form class="form-inline" method="post" action="?page=admin" onsubmit="return confirm('Hapus user <?= e($x['nama']) ?> secara permanen? Semua proyek dan penawaran milik user ini akan ikut terhapus.')">
                      <?= csrf_field() ?>
                      <input type="hidden" name="act" value="del_user">
                      <input type="hidden" name="user_id" value="<?= $id ?>">
                      <button type="submit" class="btn-hapus">Hapus</button>
                    </form>
                  </div>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </section>

  <!-- Tabel Kelola Proyek -->
  <section class="kartu">
    <div class="kartu__kepala">
      <div>
        <h2>Kelola Proyek</h2>
        <p class="kartu__sub">Klik judul proyek untuk meninjau detail sebelum melakukan penghapusan.</p>
      </div>
      <input type="search" id="cari-proyek" class="input-cari" placeholder="Cari judul proyek atau klien..." aria-label="Cari proyek">
    </div>

    <?php if (!$projects): ?>
      <p class="kosong">Belum ada proyek yang terdaftar di sistem.</p>
    <?php else: ?>
      <div class="tabel-bungkus">
        <table id="tabel-proyek">
          <thead>
            <tr>
              <th>ID</th>
              <th>Judul Proyek</th>
              <th>Klien</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($projects as $p): ?>
              <?php $pid = (int)$p['id']; ?>
              <tr>
                <td class="id-kolom">#<?= $pid ?></td>
                <td>
                  <a class="judul-proyek" href="?page=project&amp;id=<?= $pid ?>"><?= e($p['judul']) ?></a>
                </td>
                <td><?= e($p['klien']) ?></td>
                <td>
                  <span class="status <?= e($p['status']) ?>"><?= e(ucfirst((string)$p['status'])) ?></span>
                </td>
                <td>
                  <form class="form-inline" method="post" action="?page=admin" onsubmit="return confirm('Hapus proyek ini secara permanen? Semua penawaran pada proyek ini juga akan ikut terhapus.')">
                    <?= csrf_field() ?>
                    <input type="hidden" name="act" value="del_project">
                    <input type="hidden" name="project_id" value="<?= $pid ?>">
                    <button type="submit" class="btn-hapus">Hapus</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </section>

  <p class="catatan-batas">
    Catatan: Tindakan penghapusan user maupun proyek bersifat permanen dan tidak dapat dibatalkan. Anda tidak dapat mengubah peran atau menghapus akun Anda sendiri.
  </p>
</main>

<script>
function pasangFilterTabel(inputId, tabelId) {
  const input = document.getElementById(inputId);
  const tabel = document.getElementById(tabelId);
  if (!input || !tabel) return;
  input.addEventListener('input', function () {
    const kata = this.value.toLowerCase().trim();
    tabel.querySelectorAll('tbody tr').forEach(function (baris) {
      baris.style.display = baris.textContent.toLowerCase().includes(kata) ? '' : 'none';
    });
  });
}
pasangFilterTabel('cari-user', 'tabel-user');
pasangFilterTabel('cari-proyek', 'tabel-proyek');
</script>
</body>
</html>