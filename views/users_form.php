<?php require_once __DIR__ . '/template/header.php'; ?>

<h2 class="text-xl mb-4">
    <?= isset($user) ? 'Edit User' : 'Tambah User'; ?>
</h2>

<form action="index.php?entity=users&action=<?= isset($user) ? 'update&id='.$user['user_id'] : 'save' ?>" 
      method="POST" class="space-y-4">

    <div>
        <label>Nama:</label>
        <input type="text" name="nama" 
               value="<?= isset($user) ? $user['nama'] : '' ?>" 
               class="border p-2 w-full" required>
    </div>

    <div>
        <label>Email:</label>
        <input type="email" name="email" 
               value="<?= isset($user) ? $user['email'] : '' ?>" 
               class="border p-2 w-full" required>
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
</form>

<?php require_once __DIR__ . '/template/footer.php'; ?>
