<?php
//koneksi
session_start();
include("koneksi.php");
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
    <div class="card" style="margin-top: 50px; margin-left: 125px; margin-right: 125px; ">
        <div class="card-header text-center  ">
            <h5 class="card-title text-center">Anggota Kami</h5>
        </div>
        <div class="row justify-content-center" style="margin-top: 30px; margin-bottom: 30px;">
            <div class="col-sm-2">
                <div class="card">
                    <img src="../img/davi.png" class="rounded d-bloc" alt="..." width="204" height="300">
                    <div class="card-body ">
                        <div class="justify-content-center">
                            <h5 class="card-title text-center">Davi Rama Fadillah</h5>
                            <p class="card-text text-center">2007412003</p>
                            <p class="card-text text-center">davirama.fadillah.tik20@mhsw.pnj.ac.id</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-2">
                <div class="card">
                    <img src="../img/bagas.jpeg" class="rounded d-bloc" alt="..." width="204" height="300">
                    <div class="card-body ">
                        <div class="justify-content-center">
                            <h5 class="card-title text-center">Bagas Rizkiyanto</h5>
                            <p class="card-text text-center">2007412006</p>
                            <p class="card-text text-center">bagas.rizkiyanto.tik20@mhsw.pnj.ac.id</p>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="card">
                    <img src="../img/ojak.jpg" class="rounded d-bloc" alt="..." width="204" height="300">
                    <div class="card-body ">
                        <div class="justify-content-center">
                            <h5 class="card-title text-center">Abdurojak</h5>
                            <p class="card-text text-center">2007412010</p>
                            <p class="card-text text-center">abdurojak.tik20@mhsw.pnj.ac.id</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="card">
                    <img src="../img/kvn.jpg" class="rounded d-bloc" alt="..." width="204" height="300">
                    <div class="card-body ">
                        <div class="justify-content-center">
                            <h5 class="card-title text-center">Kevin Risqi R</h5>
                            <p class="card-text text-center">2007412026</p>
                            <p class="card-text text-center">kevin.risqirachmadi.tik20@mhsw.pnj.ac.id</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>