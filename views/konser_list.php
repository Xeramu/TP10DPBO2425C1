<?php require_once __DIR__ . '/template/header.php'; ?>

<h2 class="mt-4 text-2xl font-bold">Daftar Konser</h2>

<a href="index.php?entity=konser&action=add" class="text-blue-500">Tambah Konser</a>

<table class="w-full border mt-4">
    <tr>
        <th>Nama Konser</th>
        <th>Lokasi</th>
        <th>Tanggal</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($konserList as $k): ?>
        <tr>
            <td class="border px-3 py-2"><?= htmlspecialchars($k['nama_konser']); ?></td>
            <td class="border px-3 py-2"><?= htmlspecialchars($k['lokasi']); ?></td>
            <td class="border px-3 py-2"><?= htmlspecialchars($k['tanggal']); ?></td>
            <td class="border px-3 py-2">
                <a href="index.php?entity=konser&action=edit&id=<?= $k['konser_id']; ?>">Edit</a> |
                <a href="index.php?entity=konser&action=delete&id=<?= $k['konser_id']; ?>"
                   onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once __DIR__ . '/template/footer.php'; ?>
