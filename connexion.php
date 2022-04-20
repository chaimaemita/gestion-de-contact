<?php
require_once 'connect.php';

$login = new Login();

if (isset($_POST["log"])) {
    $psw= hash('sha256', $_POST["psw"]);

    $result = $login->login($_POST["email"], $psw);

    if ($result == 1) {
        session_start();
        $_SESSION["login"] = true;
        $_SESSION["id"] = $login->idUser();
        $_SESSION["name"] = $login->name();
        header("Location: profile.php");
        
    }elseif ($result == 10) {
        echo "<script> alert('WRONG PASSWORD')  </script>";
    }elseif ($result = 100) {
        echo "<script> alert('USER NOT REGISTRED')  </script>";
    }
}
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            width: 100%;
            height: auto;
            background: linear-gradient(to right,#0F2027, #203A43, #2C5364);
        }
    </style>

</head>

<body>
    <div class="container-fluid-xl d-flex flex-column">
        <nav class="navbar fixed-top navbar-light " style="background-color: #0F2027; ">
            <div class="container-fluid d-flex px-5">
                <a class="navbar-brand p-1 fw-bold" style="color: #aaa69d; border:1px solid #aaa69d;"
                    href="accueil.html">Contacts list</a>
                <div id="list" class="d-flex justify-content-end">
                    <a href="connexion.html" class="px-3 me-3 fs-4 rounded" style="color: #0F2027; border:1px solid #aaa69d;background-color: #aaa69d; text-decoration: none;">Log-in</a>
                </div>
            </div>
        </nav>
        <form method="POST" class=" d-flex align-content-center align-content-center flex-wrap flex-column " style="padding: 15% 25% ;">
            <h1 id="login" style="text-align: center; color: #aaa69d;">LOGIN</h1>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-white">Email address</label>
                <input type="email" name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-white">Password</label>
                <input type="password" name="psw" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <input type="submit" name="log" value="LOG IN" class="btn fw-bold" style="background:  #aaa69d; color: #0F2027;">
            <p class=" text-white mt-3">No account? <a href="signin.php" class="pe-auto text-dark">Sign in</a></p>

        </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>

</body>

</html>