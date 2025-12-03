<?php require_once __DIR__ . '/template/header.php'; ?>

<h2 class="mt-4 text-2xl">Daftar Users</h2>

<a href="index.php?entity=users&action=add" class="text-blue-500">Tambah User</a>

<table class="w-full border mt-4">
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($userList as $u): ?>
        <tr>
            <td class="border px-4 py-2"><?= htmlspecialchars($u['nama']); ?></td>
            <td class="border px-4 py-2"><?= htmlspecialchars($u['email']); ?></td>
            <td class="border px-4 py-2">
                <a href="index.php?entity=users&action=edit&id=<?= $u['user_id']; ?>">Edit</a> |
                <a href="index.php?entity=users&action=delete&id=<?= $u['user_id']; ?>" 
                   onclick="return confirm('Delete this user?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once __DIR__ . '/template/footer.php'; ?>
