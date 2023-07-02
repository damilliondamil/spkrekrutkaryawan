<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SPK PEMILIHAN BUS PARIWISATA METODE TOPSIS</title>
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
    <?php include 'navbar.php';?>
    <div class="container fluid">
<div class="row">
<div class="col-12">
    <div class="card mt-4">
    <table class="table table-striped table-bordered">
        <tr class="table-primary">
<th>
    Nama Pelamar
</th>
<th>
    Hasil
</th>
<th>
    Tanggal
</th>
<th>
    Waktu
</th>
</tr>

<?php 
include 'koneksi.php';
$query = "SELECT * FROM tab_hasil";
$tampil = mysqli_query($koneksi, $query);
while ($row = mysqli_fetch_array($tampil, MYSQLI_ASSOC)){
echo '<tr>
<td>'.$row["nama"].'</td>
<td>'.$row["hasil"].'</td>
<td>'.$row["tanggal"].'</td>
<td>'.$row["jam"].'</td>
</tr>';
}
?>

</table>
    </div>
</div>
</div>
    </div>
</body>
</html>