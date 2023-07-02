<?php //koneksi
session_start();
include("koneksi.php"); ?>
<html>

<head>
    <!--bootstrap-->
    <link href="tampilan/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script type="text/javascript" src="../jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
    <script>
        function updateTextInput(val) {
            document.getElementById('textInput').value = val;
        }
    </script>
    <link rel="stylesheet" href="table.css">
</head>

<body background="../img/bg2.jpg">
    <?php include 'navbar.php'; ?>
    <div class="panel-body mt-4">
        <div class="row justify-content-center">
            <div class="card col-4" style="margin-bottom: 30px;">
                <div class="card-header">
                    <h2><b>Tambah Alternatif Pelamar</b></h2>
                </div>
                <div class="card-body fw-semibold fs-5">

                    <form action="" method="POST">
                        <?php
                        $carikode = $koneksi->query("SELECT id_alternatif FROM tab_alternatif") or die("MySQL Error");
                        $datakode = $carikode->fetch_array();
                        $jumlah_data = mysqli_num_rows($carikode);


                        if ($datakode) {
                            $kode = 2;
                            while ($row = $carikode->fetch_assoc()) {
                                $id = $row['id_alternatif'];
                                while ($kode == $id) {
                                    $kode++; 
                                }
                            }
                            $kode_auto = $kode;
                        } else {
                            $kode_auto = 1;
                        }

                        ?>
                        <input type="hidden" name="id" value="<?php echo $kode_auto; ?>">

                        <div class="mb-3">
                            <label>Nama Pelamar</label>
                            <div class="input-group">
                                <input type="text" name="alter" class="input-group text" placeholder="Masukan Nama Pelamar">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Jumlah Pengalaman <i class="fw-light">(tahun)</i></label>
                            <div class="input-group">
                                <input type="number" name="k1" class="input-group text" placeholder="Masukan Jumlah Pengalaman Per Tahun">
                            </div>
                        </div>

                        <div class="mb-3 border p-2">
                            <label>Rating Penampilan <i class="fw-light">(1-5)</i></label>
                            <div class="input-group">
                                <input type="range" name="k2" oninput="rangeValue.innerText = this.value" min="1" max="5">
                                &nbsp;<p id="rangeValue"> 3</p><br>
                                <span class="fw-light">Faktor : Kebersihan, wewangian, Kerapihan rambut/kepala, pemilihan pakaian, pemilihan sepatu.</span>
                            </div>
                        </div>

                        <div class="mb-3 border p-2">
                            <label>Rating Komunikasi <i class="fw-light">(1-5)</i></label>
                            <div class="input-group">
                                <input type="range" name="k3" oninput="rangeValue1.innerText = this.value" min="1" max="5">
                                &nbsp;<p id="rangeValue1"> 3</p><br>
                                <span class="fw-light">Faktor : lugas, tidak terbata-bata, ramah, interaktif, percaya diri</span>
                            </div>
                        </div>

                        <div class="mb-3 border p-2">
                            <label>Jenjang Pendidikan <i class="fw-light">(1-5)</i></label>
                            <div class="input-group">
                                <input type="range" name="k4" oninput="rangeValue2.innerText = this.value" min="1" max="5">
                                &nbsp;<p id="rangeValue2"> 3</p><br>
                                <span class="fw-light">(1) SD, (2) SMP, (3) SMA, (4) D3, (5) S1 dst</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Usia <i class="fw-light">(tahun)</i></label>
                            <div class="input-group">
                                <input type="number" name="k5" class="input-group text" placeholder="Masukan Usia">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Jarak Tempuh <i class="fw-light">(km)</i></label>
                            <div class="input-group">
                                <input type="number" name="k6" class="input-group text" placeholder="Masukan Jarak Tempuh">
                            </div>
                        </div>

                        <div class="mb-3 border p-2">
                            <label>Tinggi Badan <i class="fw-light">(1-5)</i></label>
                            <div class="input-group">
                                <input type="range" name="k7" oninput="rangeValue3.innerText = this.value" min="1" max="5">
                                &nbsp;<p id="rangeValue3"> 3</p><br>
                                <span class="fw-light">(1) 140-150cm,
                                    (2) 151-155cm,
                                    (3) 156-165cm,
                                    (4) 166-170cm,
                                    (5) >170cm</span>
                            </div>
                        </div>

                        <input class="btn btn-primary form-control" type="submit" name="submit" value="Tambah">
                        </td>
                        </tr>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
$koneksi->query('SET foreign_key_checks = 0');
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $alter = $_POST['alter'];

    $sql = "INSERT INTO tab_alternatif (id_alternatif, nama_alternatif) VALUES ('$id','$alter')";
    mysqli_query($koneksi, $sql);

    for ($i = 1; $i < 8; $i++) {
        $k = $_POST['k' . $i];
        $sql2 = "INSERT INTO tab_topsis (id_alternatif, id_kriteria, nilai) VALUES ('$id','$i','$k')";
        mysqli_query($koneksi, $sql2);
        echo $sql2;
    }

    echo "<script>alert('Alternatif berhasil ditambahkan');
        window.location.href = 'index.php';</script>";
}
?>