<?php
include 'koneksi.php';
session_start();

$tampil = $koneksi->query("SELECT b.id_alternatif,b.nama_alternatif,c.nama_kriteria,a.nilai,c.bobot,c.status
FROM
  tab_topsis a
  JOIN
    tab_alternatif b USING(id_alternatif)
  JOIN
    tab_kriteria c USING(id_kriteria)");

$data      = array();
$kriterias = array();
$bobot     = array();
$nilai_kuadrat = array();
$status = array();

if ($tampil) {
while ($row = $tampil->fetch_object()) {
if (!isset($data[$row->nama_alternatif])) {
$data[$row->nama_alternatif] = array();
}
if (!isset($data[$row->nama_alternatif][$row->nama_kriteria])) {
$data[$row->nama_alternatif][$row->nama_kriteria] = array();
}
if (!isset($nilai_kuadrat[$row->nama_kriteria])) {
$nilai_kuadrat[$row->nama_kriteria] = 0;
}
$bobot[$row->nama_kriteria] = $row->bobot;
$data[$row->nama_alternatif][$row->nama_kriteria] = $row->nilai;
$nilai_kuadrat[$row->nama_kriteria] += pow($row->nilai, 2);
$kriterias[] = $row->nama_kriteria;
$status[$row->nama_kriteria] = $row->status;
}
}

$kriteria     = array_unique($kriterias);
$jml_kriteria = count($kriteria);
?>

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
</head>

<body background="../img/bg2.jpg" style="background-size: cover;">
<?php include 'navbar.php'; ?>
    <br>
    <br>
    <br>
    <!--tabel-tabel-->
    <div class="container-md">
        <!--container-->
        <div class="row">
            <div class="col-lg-12 col-lg-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <div class="card m-5">
                        <div class="card-header">
                            Hapus Alternatif
                        </div>
                        <div class="card-body">
                            <div class="panel-body">
                                <table class="table table-primary table-striped table-bordered">
                                    <form method="post">
                                        <thead>
                                            <tr>
                                                <th rowspan='3'>No</th>
                                                <th rowspan='3'>Alternatif</th>
                                                <th rowspan='3'>Nama</th>
                                                <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
                                                <th rowspan="3">Aksi</th>
                                            </tr>
                                            <tr>
                                                <?php
                  foreach ($kriteria as $k)
                    echo "<th>$k</th>\n";
                  ?>
                                            </tr>
                                            <tr>
                                                <?php
                  for ($n = 1; $n <= $jml_kriteria; $n++)
                    echo "<th>K$n</th>";
                  ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                $i = 0;
                foreach ($data as $nama => $krit) {
                  echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A$i</th>
                      <td>$nama</td>";
                  foreach ($kriteria as $k) {
                    echo "<td align='center'>$krit[$k]</td>";
                  }?>
                                            <td>
                                                <input type="hidden" name="id" value="<?php echo $i; ?>">
                                                <input class="btn btn-danger" type="submit" name="submit" value="Hapus">
                                            </td>
                                            </tr>
                                            <?php
                }
                ?>
                                        </tbody>
                                    </form>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
</body>
<?php 
    if (isset($_POST['submit'])){
      $id = $_POST['id'];

      $sql = "DELETE FROM tab_alternatif WHERE id_alternatif='$id'";
      $sql2 = "DELETE FROM tab_topsis WHERE id_alternatif='$id'";
    
      for ($i=1; $i < 2; $i++) { 
        mysqli_query($koneksi, $sql);
      mysqli_query($koneksi, $sql2);
      }
      echo "<script>alert('Data Berhasil Dihapus');
            window.location = 'index.php';</script>";
    }

    ?>