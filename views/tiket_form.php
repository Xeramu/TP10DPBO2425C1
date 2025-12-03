<?php require_once 'views/template/header.php'; ?>

<h2 class="text-xl mb-4">
    <?= isset($tiket) ? 'Edit Tiket' : 'Tambah Tiket'; ?>
</h2>

<form action="index.php?entity=tiket&action=<?= isset($tiket) ? 'update&id='.$tiket['tiket_id'] : 'save' ?>" 
      method="POST" class="space-y-4">

    <div>
        <label>Konser:</label>
        <select name="konser_id" class="border p-2 w-full" required>
            <?php foreach ($konserList as $k): ?>
                <option value="<?= $k['konser_id']; ?>"
                    <?= isset($tiket) && $tiket['konser_id'] == $k['konser_id'] ? 'selected' : '' ?>>
                    <?= $k['nama_konser']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label>Kategori:</label>
        <input type="text" name="kategori" 
               value="<?= isset($tiket) ? $tiket['kategori'] : '' ?>" 
               class="border p-2 w-full" required>
    </div>

    <div>
        <label>Harga:</label>
        <input type="number" name="harga" 
               value="<?= isset($tiket) ? $tiket['harga'] : '' ?>" 
               class="border p-2 w-full" required>
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
</form>

<?php require_once 'views/template/footer.php'; ?>
