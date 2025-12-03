<?php require_once __DIR__ . '/template/header.php'; ?>

<h2 class="mt-4 text-2xl font-semibold">Daftar Tiket</h2>

<a href="index.php?entity=tiket&action=add" class="text-blue-500">Tambah Tiket</a>

<table class="w-full border mt-4">
    <tr>
        <th>Konser</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($tiketList as $t): ?>
        <tr>
            <td class="border px-3 py-2"><?= htmlspecialchars($t['nama_konser']); ?></td>
            <td class="border px-3 py-2"><?= htmlspecialchars($t['kategori']); ?></td>
            <td class="border px-3 py-2">Rp <?= number_format($t['harga']); ?></td>
            <td class="border px-3 py-2">
                <a href="index.php?entity=tiket&action=edit&id=<?= $t['tiket_id']; ?>">Edit</a> |
                <a href="index.php?entity=tiket&action=delete&id=<?= $t['tiket_id']; ?>" 
                   onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once __DIR__ . '/template/footer.php'; ?>
