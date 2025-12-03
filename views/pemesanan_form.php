<?php require_once __DIR__ . '/template/header.php'; ?>

<h2 class="text-xl mb-4">
    <?= isset($pesanan) ? 'Edit Pemesanan' : 'Tambah Pemesanan'; ?>
</h2>

<form action="index.php?entity=pemesanan&action=<?= isset($pesanan) ? 'update&id='.$pesanan['pesanan_id'] : 'save' ?>"
      method="POST" class="space-y-4">

    <div>
        <label>User:</label>
        <select name="user_id" class="border p-2 w-full" required>
            <?php foreach ($usersList as $u): ?>
                <option value="<?= $u['user_id']; ?>"
                    <?= isset($pesanan) && $pesanan['user_id'] == $u['user_id'] ? 'selected' : '' ?>>
                    <?= $u['nama']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label>Tiket:</label>
        <select name="tiket_id" class="border p-2 w-full" required>
            <?php foreach ($tiketList as $t): ?>
                <option value="<?= $t['tiket_id']; ?>"
                    <?= isset($pesanan) && $pesanan['tiket_id'] == $t['tiket_id'] ? 'selected' : '' ?>>
                    <?= $t['nama_konser'].' - '.$t['kategori'].' (Rp '.number_format($t['harga']).')'; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label>Jumlah Tiket:</label>
        <input type="number" name="jumlah"
               value="<?= isset($pesanan) ? $pesanan['jumlah'] : '' ?>"
               class="border p-2 w-full" required min="1">
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
</form>

<?php require_once __DIR__ . '/template/footer.php'; ?>
