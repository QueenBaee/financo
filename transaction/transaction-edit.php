<?php 
  include '../koneksi.php';
  $id = $_GET['id'];
  if(!isset($_GET['id'])) {
    echo "
      <script>
        alert('Tidak ada ID yang Terdeteksi');
        window.location = 'transaction.php';
      </script>
    ";
  }

  $sql = "SELECT * FROM tb_transaction WHERE id = '$id'";
  $result = mysqli_query($koneksi, $sql);
  $data = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transaction Edit</title>
    <link rel="stylesheet" href="../css/admin.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Roboto:wght@500;700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="container">
      <div class="sidebar">
        <a href="../admin.php">Home</a>
        <a href="../categories/categories.php">Nasabah</a>
        <a href="transaction.php">Transaction</a>
      </div>

      <div class="right_content">
        <div class="navbar">
          <img src="../assets/logo.png" alt="" />
          <button class="btn">
            <a href="../logout.php">Logout</a>
          </button>
        </div>
        <div class="content">
          <h3>Edit Transaction</h3>
          <div class="form-login">
            <form
              action="transaction-proses.php"
              method="post"
            >
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
              <label for="nama">Nama Nasabah</label>
              <input
                class="input"
                type="text"
                name="nama"
                id="nama"
                placeholder="Nama"
                value="<?= $data['nama'] ?>"
              />


              <label for="jenis">Jenis Transaksi</label><br>
              <select name="jenis" id="jenis" placeholder="Jenis Transaksi">
                <option value="Debit">Debit</option>
                <option value="Kredit">Kredit</option>
                value="<?= $data['jenis'] ?>"
              </select><br>

              <label for="harga">Nominal</label>
              <input
                class="input"
                type="text"
                name="harga"
                id="harga"
                placeholder="Harga"
                value="<?= $data['harga'] ?>"
              />

              <label for="tgl">Tanggal</label>
              <input
                class="input"
                type="date"
                name="tgl"
                id="tgl"
                style="margin-bottom: 20px"
                value="<?= $data['tanggal'] ?>"
              />
              <button type="submit" class="btn btn-simpan" name="edit">
                Edit
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
