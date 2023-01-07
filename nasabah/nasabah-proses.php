<?php
include '../koneksi.php';

function upload()
{
    $namaFile = $_FILES['photo']['name'];
    $error = $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "
            <script>
                alert('Gambar Harus Diisi');
                window.location = 'nasabah-entry.html';
            </script>
        ";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstentiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstentiGambarValid)) {
        echo "
            <script>
                alert('File Harus Berupa Gambar');
                window.location = 'nasabah-entry.html';
            </script>
        ";
        return false;
    }

    // lolos pengecekan, upload gambar
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    $oke =  move_uploaded_file($tmpName, '../img_categories/' . $namaFileBaru);
    return $namaFileBaru;
}

if (isset($_POST['simpan'])) {

    $categories = $_POST['categories'];
    $price = $_POST['price'];
    $photo = upload();

    $sql = "INSERT INTO tb_categories VALUES('', '$photo', '$categories', '$price')";

    if (empty($photo) || empty($categories) || empty($price)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'nasabah-entry.html';
            </script>
        ";
    } elseif (mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Nasabah Berhasil Ditambahkan');
                window.location = 'nasabah.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'nasabah-entry.html'
            </script>
        ";
    }
} elseif (isset($_POST['edit'])) {
    $id         = $_POST['id'];
    $categories = $_POST['categories'];
    $price      = $_POST['price'];
    $photoLama = $_POST['photoLama'];

    // cek apakah user pilih gambar atau tidak
    if ($_FILES['photo']['error']) {
        $photo = $photoLama;
    } else {
        $photo = upload();
    }

    $sql = "UPDATE tb_categories SET 
            photo = '$photo',
            categories = '$categories',
            price = '$price'
            WHERE id = $id 
            ";

    if (mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Nasabah Berhasil Diubah');
                window.location = 'nasabah.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'nasabah-edit.php';
            </script>
        ";
    }
} elseif (isset($_POST['hapus'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM tb_categories WHERE id = $id";
    if (mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Nasabah Berhasil Dihapus');
                window.location = 'nasabah.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Nasabah Gagal Dihapus');
                window.location = 'nasabah.php';
            </script>
        ";
    }
} else {
    header('location: nasabah.php');
}
