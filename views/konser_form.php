<?php require_once 'views/template/header.php'; ?>

<h2 class="text-xl mb-4">
    <?= isset($konser) ? 'Edit Konser' : 'Tambah Konser'; ?>
</h2>

<form action="index.php?entity=konser&action=<?= isset($konser) ? 'update&id='.$konser['konser_id'] : 'save' ?>" 
      method="POST"
      class="space-y-4">

    <div>
        <label>Nama Konser:</label>
        <input type="text" name="nama_konser" 
               value="<?= isset($konser) ? $konser['nama_konser'] : '' ?>" 
               class="border p-2 w-full" required>
    </div>

    <div>
        <label>Lokasi:</label>
        <input type="text" name="lokasi" 
               value="<?= isset($konser) ? $konser['lokasi'] : '' ?>" 
               class="border p-2 w-full" required>
    </div>

    <div>
        <label>Tanggal:</label>
        <input type="date" name="tanggal" 
               value="<?= isset($konser) ? $konser['tanggal'] : '' ?>" 
               class="border p-2 w-full" required>
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
        Save
    </button>
</form>

<?php require_once __DIR__ . '/template/footer.php'; ?>
