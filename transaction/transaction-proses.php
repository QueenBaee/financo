<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $tanggal = $_POST['tgl'];

    $sql = "INSERT INTO tb_transaction VALUES('', '$nama', '$jenis', '$harga', '$tanggal')";

    if (empty($jenis) || empty($harga) || empty($tanggal)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'transaction-entry.php';
            </script>
        ";
    } elseif (mysqli_query($koneksi, $sql)) {
        echo "  
            <script>
                alert('Data Transaction Berhasil Ditambahkan');
                window.location = 'transaction.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'transaction-entry.php';
            </script>
        ";
    }
} elseif (isset($_POST['edit'])) {
    $id     = $_POST['id'];
    $nama   = $_POST['nama'];
    $jenis  = $_POST['jenis'];
    $harga  = $_POST['harga'];
    $tanggal = $_POST['tgl'];

    $sql = "UPDATE tb_transaction SET
            nama = '$nama', 
            jenis = '$jenis', 
            harga = '$harga', 
            tanggal = '$tanggal'
            WHERE id = $id";

    if (mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Transaction Berhasil Diubah');
                window.location = 'transaction.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'transaction-edit.php';
            </script>
        ";
    }
} elseif (isset($_POST['hapus'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM tb_transaction WHERE id = $id";

    if (mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Transaction Berhasil Dihapus');
                window.location = 'transaction.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Transaction Gagal Dihapus');
                window.location = 'transaction.php'
            </script>
        ";
    }
} else {
    header('location: transaction.php');
}
