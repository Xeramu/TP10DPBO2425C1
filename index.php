<?php
// Import semua ViewModel
require_once __DIR__ . '/viewmodels/KonserViewModel.php';
require_once __DIR__ . '/viewmodels/TiketViewModel.php';
require_once __DIR__ . '/viewmodels/PemesananViewModel.php';
require_once __DIR__ . '/viewmodels/UsersViewModel.php';

// Ambil parameter
$entity = isset($_GET['entity']) ? $_GET['entity'] : 'konser';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';


/*
|--------------------------------------------------------------------------
| 1. KONCER
|--------------------------------------------------------------------------
*/
if ($entity === 'konser') {

    $konserVM = new KonserViewModel();

    switch ($action) {

        case 'list':
            $konserList = $konserVM->getAllKonser();
            require_once 'views/konser_list.php';
            break;

        case 'add':
            require_once 'views/konser_form.php';
            break;

        case 'edit':
            $id = $_GET['id'];
            $konser = $konserVM->getKonserById($id);
            require_once 'views/konser_form.php';
            break;

        case 'save':
            $nama = $_POST['nama_konser'];
            $tanggal = $_POST['lokasi'];
            $lokasi = $_POST['tanggal'];

            $konserVM->addKonser($nama, $tanggal, $lokasi);
            header("Location: index.php?entity=konser&action=list");
            break;

        case 'update':
            $id = $_GET['id'];
            $nama = $_POST['nama_konser'];
            $tanggal = $_POST['lokasi'];
            $lokasi = $_POST['tanggal'];

            $konserVM->updateKonser($id, $nama, $tanggal, $lokasi);
            header("Location: index.php?entity=konser&action=list");
            break;

        case 'delete':
            $id = $_GET['id'];
            $konserVM->deleteKonser($id);
            header("Location: index.php?entity=konser&action=list");
            break;
    }


/*
|--------------------------------------------------------------------------
| 2. TIKET
|--------------------------------------------------------------------------
*/
} elseif ($entity === 'tiket') {

    $tiketVM = new TiketViewModel();
    $konserVM = new KonserViewModel(); // untuk dropdown konser

    switch ($action) {

        case 'list':
            $tiketList = $tiketVM->getAllTiket();
            require_once 'views/tiket_list.php';
            break;

        case 'add':
            $konserList = $konserVM->getAllKonser();
            require_once 'views/tiket_form.php';
            break;

        case 'edit':
            $id = $_GET['id'];
            $tiket = $tiketVM->getTiketById($id);
            $konserList = $konserVM->getAllKonser();
            require_once 'views/tiket_form.php';
            break;

        case 'save':
            $konser = $_POST['konser_id'];
            $kategori = $_POST['kategori'];
            $harga = $_POST['harga'];

            $tiketVM->addTiket($konser, $kategori, $harga);
            header("Location: index.php?entity=tiket&action=list");
            break;

        case 'update':
            $id = $_GET['id'];
            $konser = $_POST['konser_id'];
            $kategori = $_POST['kategori'];
            $harga = $_POST['harga'];

            $tiketVM->updateTiket($id, $konser, $kategori, $harga);
            header("Location: index.php?entity=tiket&action=list");
            break;

        case 'delete':
            $id = $_GET['id'];
            $tiketVM->deleteTiket($id);
            header("Location: index.php?entity=tiket&action=list");
            break;
    }


/*
|--------------------------------------------------------------------------
| 3. PEMESANAN
|--------------------------------------------------------------------------
*/
} elseif ($entity === 'pemesanan') {

    $userVM = new UserViewModel();
    $pemesananVM = new PemesananViewModel();
    $tiketVM = new TiketViewModel();

    switch ($action) {

        case 'list':
            $pemesananList = $pemesananVM->getAllPemesanan();
            require_once 'views/pemesanan_list.php';
            break;

        case 'add':
            $tiketList = $tiketVM->getAllTiket();
            $usersList = $userVM->getUserList();
            require_once 'views/pemesanan_form.php';
            break;

        case 'edit':
            $id = $_GET['id'];
            $pemesanan = $pemesananVM->getPemesananById($id);
            $tiketList = $tiketVM->getAllTiket();
            $usersList = $userVM->getUserList();
            require_once 'views/pemesanan_form.php';
            break;

        case 'save':
            $userId  = $_POST['user_id'];
            $tiketId = $_POST['tiket_id'];
            $jumlah  = $_POST['jumlah'];

            $pemesananVM->addPemesanan($userId, $tiketId, $jumlah);
            header("Location: index.php?entity=pemesanan&action=list");
            break;

        case 'update':
            $id      = $_GET['id'];
            $userId  = $_POST['user_id'];
            $tiketId = $_POST['tiket_id'];
            $jumlah  = $_POST['jumlah'];

            $pemesananVM->updatePemesanan($id, $userId, $tiketId, $jumlah);
            header("Location: index.php?entity=pemesanan&action=list");
            break;

        case 'delete':
            $id = $_GET['id'];
            $pemesananVM->deletePemesanan($id);
            header("Location: index.php?entity=pemesanan&action=list");
            break;
    }


/*
|--------------------------------------------------------------------------
| 4. USERS
|--------------------------------------------------------------------------
*/
} elseif ($entity === 'users') {

    $userVM = new UserViewModel();

    switch ($action) {

        case 'list':
            $userList = $userVM->getUserList();
            require_once 'views/users_list.php';
            break;

        case 'add':
            require_once 'views/users_form.php';
            break;

        case 'edit':
            $id = $_GET['id'];
            $user = $userVM->getUserById($id);
            require_once 'views/users_form.php';
            break;

        case 'save':
            $nama = $_POST['nama'];
            $email = $_POST['email'];

            $userVM->addUser($nama, $email);
            header("Location: index.php?entity=users&action=list");
            break;

        case 'update':
            $id = $_GET['id'];
            $nama = $_POST['nama'];
            $email = $_POST['email'];

            $userVM->updateUser($id, $nama, $email);
            header("Location: index.php?entity=users&action=list");
            break;

        case 'delete':
            $id = $_GET['id'];
            $userVM->deleteUser($id);
            header("Location: index.php?entity=users&action=list");
            break;
    }

} else {
    echo "Invalid entity.";
}