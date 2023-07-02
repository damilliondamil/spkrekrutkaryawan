<?php
//koneksi
session_start();
include("koneksi.php");


$tampil = $koneksi->query("SELECT b.nama_alternatif,c.nama_kriteria,a.nilai,c.bobot,c.status
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

<!DOCTYPE html>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script type="text/javascript" src="../jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="table.css">

</head>

<body background="../img/bg2.jpg" style="background-size: cover;">
    <?php include 'navbar.php'; ?>
    <!--tabel-tabel-->
    <div class="container-md">
        <!--container-->
        <div class="row">
            <div class="col-lg-12 col-lg-offset-3">
                <div class="panel panel-default">

                    <div class="card m-5">
                        <div class="card-header">
                            Data Matrix
                        </div>
                        <div class="card-body">

                            <div class="panel-body">
                                <table class="table table-light table-striped table-bordered table-hover text-center align-middle">
                                    <thead class="table-primary">
                                        <tr style="background-color:aqua;">
                                            <th rowspan='2'>No</th>
                                            <th rowspan='2'>Alternatif</th>
                                            <th rowspan='2'>Nama</th>
                                            <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
                                        </tr>
                                        <tr>
                                            <?php
                                            foreach ($kriteria as $k)
                                                echo "<th>$k</th>\n";
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
                                            }
                                            echo "</tr>\n";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-md">
            <!--container-->
            <div class="row">
                <div class="col-lg-12 col-lg-offset-3">
                    <div class="panel panel-default">

                        <div class="card m-5">
                            <div class="card-header">
                                Rating Kinerja Ternormalisasi (r<sub>ij</sub>)
                            </div>
                            <div class="card-body">

                                <div class="panel-body">
                                    <table class="table table-light table-striped table-bordered table-hover text-center align-middle">
                                        <thead class="table-primary">
                                            <tr style="background-color:aqua;">
                                                <th rowspan='2'>No</th>
                                                <th rowspan='2'>Alternatif</th>
                                                <th rowspan='2'>Nama</th>
                                                <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
                                            </tr>
                                            <tr>
                                                <?php
                                                foreach ($kriteria as $k)
                                                    echo "<th>$k</th>\n";
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($data as $nama => $krit) {
                                                echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                                                foreach ($kriteria as $k) {
                                                    echo
                                                    "<td align='center'>" . round(($krit[$k] / sqrt($nilai_kuadrat[$k])), 4) .
                                                        "</td>";
                                                }
                                                echo
                                                "</tr>\n";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container-md">
                        <!--container-->
                        <div class="row">
                            <div class="col-lg-12 col-lg-offset-3">
                                <div class="panel panel-default">

                                    <div class="card m-5">
                                        <div class="card-header">
                                            Rating Bobot Ternormalisasi (r<sub>ij</sub>)
                                        </div>
                                        <div class="card-body">

                                            <div class="panel-body">
                                                <table class="table table-light table-striped table-bordered table-hover text-center align-middle">
                                                    <thead class="table-primary">
                                                        <tr style="background-color:aqua;">
                                                            <th rowspan='2'>No</th>
                                                            <th rowspan='2'>Alternatif</th>
                                                            <th rowspan='2'>Nama</th>
                                                            <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
                                                        </tr>
                                                        <tr>
                                                            <?php

                                                            foreach ($kriteria as $k)
                                                                echo "<th>$k</th>\n";
                                                            ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 0;
                                                        $y = array();
                                                        foreach ($data as $nama => $krit) {
                                                            echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                                                            foreach ($kriteria as $k) {
                                                                $y[$k][$i - 1] = round(($krit[$k] / sqrt($nilai_kuadrat[$k])), 4) * $bobot[$k];
                                                                echo "<td align='center'>" . $y[$k][$i - 1] . "</td>";
                                                            }
                                                            echo
                                                            "</tr>\n";
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-lg-offset-3">
                                        <div class="panel panel-default">

                                            <div class="card m-5">
                                                <div class="card-header">
                                                    Solusi Ideal positif (A<sup>+</sup>)
                                                </div>
                                                <div class="card-body">

                                                    <div class="panel-body">
                                                        <table class="table table-light table-striped table-bordered table-hover text-center align-middle">
                                                            <thead class="table-primary">
                                                                <tr style="background-color:aqua;">
                                                                    <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria
                                                                    </th>
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
                                                                        echo "<th>y<sub>{$n}</sub><sup>+</sup></th>";
                                                                    ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <?php
                                                                    $yplus = array();
                                                                    foreach ($kriteria as $k) {
                                                                        $yplus[$k] = ($status[$k] == 'Benefit' ? max($y[$k]) : min($y[$k]));

                                                                        echo "<th>$yplus[$k]</th>";
                                                                    }
                                                                    ?>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 col-lg-offset-3">
                                                <div class="panel panel-default">

                                                    <div class="card m-5">
                                                        <div class="card-header">
                                                            Solusi Ideal negatif (A<sup>-</sup>)
                                                        </div>
                                                        <div class="card-body">

                                                            <div class="panel-body">
                                                                <table class="table table-light table-striped table-bordered table-hover text-center align-middle">
                                                                    <thead class="table-primary">
                                                                        <tr style="background-color:aqua;">
                                                                            <th colspan='<?php echo $jml_kriteria; ?>'>
                                                                                Kriteria</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <?php
                                                                            foreach ($kriteria as $k)
                                                                                echo "<th>{$k}</th>\n";
                                                                            ?>
                                                                        </tr>
                                                                        <tr>
                                                                            <?php
                                                                            for ($n = 1; $n <= $jml_kriteria; $n++)
                                                                                echo "<th>y<sub>{$n}</sub><sup>-</sup></th>";
                                                                            ?>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <?php
                                                                            $ymin = array();
                                                                            foreach ($kriteria as $k) {
                                                                                $ymin[$k] = ($status[$k] == 'Cost' ? max($y[$k]) : min($y[$k]));
                                                                                echo "<th>{$ymin[$k]}</th>";
                                                                            }

                                                                            ?>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-12 col-lg-offset-3">
                                                        <div class="panel panel-default">

                                                            <div class="card m-5">
                                                                <div class="card-header">
                                                                    Jarak positif (D<sub>i</sub><sup>+</sup>)
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="panel-body">
                                                                        <table class="table table-light table-striped table-bordered table-hover text-center align-middle">
                                                                            <thead class="table-primary">
                                                                                <tr style="background-color:aqua;">
                                                                                    <th rowspan='2'>No</th>
                                                                                    <th rowspan='2'>Alternatif</th>
                                                                                    <th rowspan='2'>Nama</th>
                                                                                    <th rowspan='2'>D<suo>+</sup></th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                $i = 0;
                                                                                $dplus = array();
                                                                                foreach ($data as $nama => $krit) {
                                                                                    echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                                                                                    foreach ($kriteria as $k) {
                                                                                        if (!isset($dplus[$i - 1])) $dplus[$i - 1] = 0;
                                                                                        $dplus[$i - 1] += pow($yplus[$k] - $y[$k][$i - 1], 2);
                                                                                    }
                                                                                    echo "<td>" . round(sqrt($dplus[$i - 1]), 4) . "</td>
                     </tr>\n";
                                                                                }
                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-12 col-lg-offset-3">
                                                                <div class="panel panel-default">

                                                                    <div class="card m-5">
                                                                        <div class="card-header">
                                                                            Jarak negatif (D<sub>i</sub><sup>-</sup>)
                                                                        </div>
                                                                        <div class="card-body">

                                                                            <div class="panel-body">
                                                                                <table class="table table-light table-striped table-bordered table-hover text-center align-middle">
                                                                                    <thead class="table-primary">
                                                                                        <tr style="background-color:aqua;">
                                                                                            <th rowspan='2'>No</th>
                                                                                            <th rowspan='2'>Alternatif
                                                                                            </th>
                                                                                            <th rowspan='2'>Nama</th>
                                                                                            <th rowspan='2'>D<suo>
                                                                                                    +</sup></th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php
                                                                                        $i = 0;
                                                                                        $dmin = array();
                                                                                        foreach ($data as $nama => $krit) {
                                                                                            echo "<tr>
                      <td>" . (++$i) . "</td>
                      <th>A{$i}</th>
                      <td>{$nama}</td>";
                                                                                            foreach ($kriteria as $k) {
                                                                                                if (!isset($dmin[$i - 1])) $dmin[$i - 1] = 0;
                                                                                                $dmin[$i - 1] += pow($ymin[$k] - $y[$k][$i - 1], 2);
                                                                                            }
                                                                                            echo "<td>" . round(sqrt($dmin[$i - 1]), 4) . "</td>

                     </tr>\n";
                                                                                        }
                                                                                        ?>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-lg-12 col-lg-offset-3">
                                                                        <div class="panel panel-default">

                                                                            <div class="card m-5">
                                                                                <div class="card-header">
                                                                                    Hasil Topsis(V<sub>i</sub>)
                                                                                </div>
                                                                                <div class="card-body">

                                                                                    <div class="panel-body">
                                                                                        <table class="table table-light table-striped table-bordered table-hover text-center align-middle" id="myTable">
                                                                                            <thead class="table-primary">
                                                                                                <tr style="background-color:aqua;">
                                                                                                    <th>ID</th>
                                                                                                    <th rowspan='2'>Nama
                                                                                                    </th>
                                                                                                    <th rowspan='2'>
                                                                                                        V<sub>i</sub>
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php
                                                                                                $i = 0;
                                                                                                $V = array();
                                                                                                $Y = array();
                                                                                                $Z = array();
                                                                                                $hasilakhir = array();
                                                                                                date_default_timezone_set('Asia/Jakarta');
                                                                                                $date = date("Y/m/d");
                                                                                                $time = date("H:i:s");

                                                                                                foreach ($data as $nama => $krit) {

                                                                                                    echo "<tr><td>" . (++$i) . "</td>";
                                                                                                ?>

                                                                                                    <td><?php echo "{$nama}"; ?>
                                                                                                    </td>
                                                                                                    <?php
                                                                                                    foreach ($kriteria as $k) {
                                                                                                        $V[$i - 1] = round(sqrt($dmin[$i - 1]), 4) / (round(sqrt($dmin[$i - 1]), 4) + round(sqrt($dplus[$i - 1]), 4));
                                                                                                    }
                                                                                                    ?>
                                                                                                    <td><?php echo "{$V[$i - 1]}\n"; ?>
                                                                                                    </td>
                                                                                                    </tr>
                                                                                                <?php

                                                                                                }
                                                                                                ?>
                                                                                            </tbody>
                                                                                        </table>
                                                                                        <div class="col-md-12">
                                                                                            <center>
                                                                                            <p>
                                                                                            <form method="GET" action="">
                                                                                                <input id="myKeputusan" name="keputusan" value="Keputusan" onclick="sortTable()" class="btn btn-primary col-3">
                                                                                                <input id="mySubmit" name="rank" value="Simpan Ranking" hidden class="btn btn-primary col-3" type="submit">
                                                                                            </form>
                                                                                            </p>
                                                                                            </center>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--container-->

                                                                    <!--footer-->
                                                                    <footer class="rounded-top text-center bg-dark col-12">
                                                                        <div class="footer-below">
                                                                            <div class="container">
                                                                                <div class="row">
                                                                                    <div class="col-lg-12 text-secondary">
                                                                                        <em>Sistem Pendukung Keputusan
                                                                                            Pemilihan Karyawan Metode
                                                                                            Topsis</em>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                        if (isset($_GET["rank"])) {
                                                                            $i = -1;
                                                                            foreach ($data as $nama => $krit) {
                                                                                $sql1 = "INSERT INTO tab_hasil (nama, hasil, tanggal, jam) VALUES ('{$nama}','{$V[$i+1]}\n','$date','$time')";
                                                                                mysqli_query($koneksi, $sql1);
                                                                                $i++;
                                                                            }
                                                                            echo "<script>alert('Alternatif berhasil ditambahkan ke history');
                                                                            window.location.href = 'history.php';</script>";
                                                                        }
                                                                        ?>
                                                                    </footer>

                                                                    <!--plugin-->
                                                                    <script src="tampilan/js/bootstrap.min.js"></script>

</body>

</html>

<script>
    function sortTable() {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("myTable");
        switching = true;
        /* Make a loop that will continue until
        no switching has been done: */
        while (switching) {
            // Start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /* Loop through all table rows (except the
            first, which contains table headers): */
            for (i = 1; i < (rows.length - 1); i++) {
                // Start by saying there should be no switching:
                shouldSwitch = false;
                /* Get the two elements you want to compare,
                one from current row and one from the next: */
                x = rows[i].getElementsByTagName("td")[2];
                y = rows[i + 1].getElementsByTagName("td")[2];
                // Check if the two rows should switch place:
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            }
            if (shouldSwitch) {
                /* If a switch has been marked, make the switch
                and mark that a switch has been done: */
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }

        }
        alert("Rekomendasi Karyawan adalah " + rows[1].getElementsByTagName("td")[1].innerHTML);
        document.getElementById("myKeputusan").hidden = true; 
        document.getElementById("mySubmit").hidden = false; 
    }
</script>