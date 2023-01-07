<?php
include '../koneksi.php';
$query = "select categories from tb_categories";
$res = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Transaction Entry</title>
  <link rel="stylesheet" href="../css/admin.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Roboto:wght@500;700&display=swap" rel="stylesheet" />
</head>

<body>
  <div class="container">
    <div class="sidebar">
      <a href="../admin.php">Home</a>
      <a href="../nasabah/nasabah.php">Nasabah</a>
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
        <h3>Input Transaction</h3>
        <div class="form-login">
          <form action="transaction-proses.php" method="post">
            <label for="nama">Nama Nasabah</label> <br>
            <!-- <input
                class="input"
                type="text"
                name="nama"
                id="nama"
                placeholder="Nama"
              /> -->
            <select name="nama" id="nama">
              <?php
              while ($row = $res->fetch_assoc()) {
                echo '<option value =" ' . $row['id'] . ' "> ' . $row['categories'] . '</option>';
              }
              ?>
            </select> <br>

            <label for="jenis">Jenis Transaksi</label><br>
            <select name="jenis" id="jenis" placeholder="Jenis Transaksi">
              <option value="Debit">Debit</option>
              <option value="Kredit">Kredit</option>
            </select><br>
            <label for="harga">Nominal</label>
            <input class="input" type="text" name="harga" id="harga" placeholder="Harga" />

            <label for="tgl">Tanggal</label>
            <input class="input" type="date" name="tgl" id="tgl" style="margin-bottom: 20px" />

            <button type="submit" class="btn btn-simpan" name="simpan">
              Simpan
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>