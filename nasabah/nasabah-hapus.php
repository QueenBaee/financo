<?php 
  include '../koneksi.php';
  $id = $_GET['id'];
  if(!isset($_GET['id'])) {
    echo "
      <script>
        alert('Tidak ada ID yang Terdeteksi');
        window.location = 'categories.php';
      </script>
    ";
  }

  $sql = "SELECT * FROM tb_categories WHERE id = '$id'";
  $result = mysqli_query($koneksi, $sql);
  $data = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nasabah Hapus</title>
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
        <a href="Nasabah.php">Nasabah</a>
        <a href="../transaction/transaction.php">Transaction</a>
      </div>

      <div class="right_content">
        <div class="navbar">
          <img src="../assets/logo.png" alt="" />
          <button class="btn">
            <a href="../logout.php">Logout</a>
          </button>
        </div>
        <div class="content">
          <h3>Hapus Nasabah</h3>
          <div class="form-login">
              <h4>Ingin Menghapus Data ?</h4>
            <form
              action="nasabah-proses.php"
              method="post"
            >
            <input type="hidden" name="id" value="<?= $data['id'] ?>">

              <button type="submit" class="btn btn-simpan" name="hapus" style="width: 40%; margin-top: 50px;">
                Yes
              </button>
              <button type="submit" class="btn btn-simpan" name="tidak" style="width: 40%;">
                No
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
