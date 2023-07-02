<?php //koneksi
session_start();
include("koneksi.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrap-->
    <link href="tampilan/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script type="text/javascript" src="../jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="table.css">
    <title>Document</title>
</head>

<body background="../img/bg2.jpg" style="background-size: cover;">
<?php include 'navbar.php'; ?>


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>



    <div class="col d-flex justify-content-center">
        <div class="card">
            <div class="card-header">
                Edit Alternatif
            </div>
            <div class="card text-center p-2 " style="width: 50rem;">
                <span class="text-light">
                    <div class="card-header bg-warning text-dark">
                        Edit Alternatif
                    </div>
                </span>
                <div class="card-body">
                    <form action="" method="POST">
                        <select name="alter">
                            <?php
  include "koneksi.php";
  $alter = mysqli_query($koneksi, "SELECT id_alternatif, nama_alternatif FROM tab_alternatif");
  while ($d = mysqli_fetch_array($alter)){
  ?>
                            <option value="<?php echo $d['id_alternatif'];?>"><?php echo $d['nama_alternatif'];?>
                            </option>
                            <?php } ?>
                        </select>
                        <select name="krit">
                            <?php
 $krit = mysqli_query($koneksi, "SELECT id_kriteria, nama_kriteria FROM tab_kriteria");
 while ($d = mysqli_fetch_array($krit)){
  ?>
                            <option value="<?php echo $d['id_kriteria'];?>"><?php echo $d['nama_kriteria'];?></option>
                            <?php } ?>
                        </select>
                        <input type="number" name="nilai" placeholder="Nilai">

                        <input class="btn btn-primary" type="submit" name="edit" value="edit">
                    </form>
                </div>
            </div>
            <div>
</body>

</html>
<?php
if(isset($_POST['edit'])){
  $krit = $_POST['krit'];
  $alter = $_POST['alter'];
  $nilai = $_POST['nilai'];
  $edit = "UPDATE tab_topsis SET nilai='$nilai' WHERE id_alternatif='$alter' and id_kriteria='$krit'";
  mysqli_query($koneksi, $edit);
  echo $edit;
}
if(isset($_POST['hapus'])){
  $alter = $_POST['alter'];
  $hapus1 = "DELETE FROM tab_topsis WHERE id_alternatif='$alter'";
  $hapus2 = "DELETE FROM tab_alternatif WHERE id_alternatif='$alter'";
  mysqli_query($koneksi, $hapus1);
  mysqli_query($koneksi, $hapus2);
  echo $hapus2;
}
?>