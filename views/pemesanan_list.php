<?php require_once __DIR__ . '/template/header.php'; ?>

<h2 class="text-2xl mt-4">Daftar Pemesanan</h2>

<a href="index.php?entity=pemesanan&action=add" class="text-blue-500">Tambah Pesanan</a>

<table class="w-full border mt-4">
    <tr>
        <th>User</th>
        <th>Konser</th>
        <th>Kategori Tiket</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($pemesananList as $p): ?>
        <tr>
            <td class="border px-3 py-2"><?= $p['nama_user']; ?></td>
            <td class="border px-3 py-2"><?= $p['nama_konser']; ?></td>
            <td class="border px-3 py-2"><?= $p['kategori']; ?></td>
            <td class="border px-3 py-2"><?= $p['jumlah']; ?></td>
            <td class="border px-3 py-2">Rp <?= number_format($p['total']); ?></td>
            <td class="border px-3 py-2">
                <a href="index.php?entity=pemesanan&action=edit&id=<?= $p['pesanan_id']; ?>">Edit</a> |
                <a href="index.php?entity=pemesanan&action=delete&id=<?= $p['pesanan_id']; ?>" 
                   onclick="return confirm('Hapus pesanan ini?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once __DIR__ . '/template/footer.php'; ?>
