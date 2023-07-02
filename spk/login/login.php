<?php 
include '../admin/koneksi.php';
session_start(); 
unset($_SESSION['cari']);
?>
<!DOCTYPE html>

<head>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
    <!-- style -->
    <link rel="stylesheet" type="text/css" href="login.css">
    <!-- font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
</head>
</head>

<body background="./bg2.jpg" style="background-size: cover;">
    <div class="col d-flex justify-content-center" style="margin-top: 50px; margin-bottom: 20px;">
        <div class="card text-center p-2 " style="width: 25rem;">
            <span class="text-light">
                <div class="card-header bg-dark">
                    Halaman Login SPK Istana Import
                </div>
            </span>
            <div class="card-body">
                <img src="istanaimport.png" width="200px">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="basic-url">Username</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-person-circle"
                                        viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path fill-rule="evenodd"
                                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                    </svg></span>
                            </div>
                            <input type="username" class="form-control" id="username" placeholder="Enter username"
                                name="username">
                        </div>
                        <label for="basic-url">Password</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-file-lock2-fill"
                                        viewBox="0 0 16 16">
                                        <path d="M7 6a1 1 0 0 1 2 0v1H7V6z" />
                                        <path
                                            d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm-2 6v1.076c.54.166 1 .597 1 1.224v2.4c0 .816-.781 1.3-1.5 1.3h-3c-.719 0-1.5-.484-1.5-1.3V8.3c0-.627.46-1.058 1-1.224V6a2 2 0 1 1 4 0z" />
                                    </svg></span>
                            </div>
                            <input type="password" class="form-control" id="pwd" placeholder="Enter password"
                                name="password">
                        </div>
                        <input class="btn btn-primary " type="submit" name="submit" value="Masuk">
                </form>
            </div>
        </div>
    </div>
    </div>
    <?php
	if (isset($_POST['submit'])){
	$username = $_POST['username'];
	$pass = $_POST['password'];
	$sql = mysqli_query($koneksi,"SELECT * FROM tab_admin WHERE username='$username' AND password='$pass'")or die("MySQLI ERROR");
	$result = mysqli_num_rows($sql);
    if ($result > 0){
        $_SESSION['username'] = $username;
    ?>
    <script type="text/javascript">
    alert('Login Berhasil');
    window.location = "../admin/landing.php";
    </script>
    <?php
    } else { ?>
    <script type="text/javascript">
    alert('Username atau Password salah');
    </script>
    <?php }
	}
	?>
</body>