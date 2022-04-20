<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            /* background: linear-gradient(to right, #0F2027, #203A43, #2C5364); */

        }

        #hello {
            color: black;
        }
    </style>

</head>
<body class="d-flex w-100 h-auto">
    <div class="container-fluid-xl d-flex flex-column w-100">
        <nav class="navbar  navbar-light " style="background-color: #0F2027; ">
            <div class="container-fluid d-flex px-5">
                <a class="navbar-brand p-1 fw-bold" style="color: #aaa69d; border:1px solid #aaa69d;"
                    href="accueil.html">Contacts list</a>
                <div id="list" class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        style="color: #0F2027; border:1px solid #aaa69d;background-color: #aaa69d; text-decoration: none;">log
                        in</button>
                </div>
            </div>
        </nav>
        <div class="row container-fluid-s d-flex justify-content-center align-items-center m-5 pt-5"
            style=" border:1px solid #aaa69d;">
            <div class="col m-5 d-flex justify-content-center align-items-start flex-column"
                style="background-color:darkgray; box-shadow: 3px 3px #fff3d7, -1em 0 .4em rgb(176, 149, 80);">
                <p class="fs-1 fw-bold" id="hello">HELLO!</p>
                <p class="text-white"><a href="#scrollspyHeading1" class="pe-auto" style="color: black;">Sign in</a> to
                    start
                    creation your contact
                    list.</p>
                <p class=" text-white"> Already have an account? <a href="connexion.php" class="pe-auto"
                        style="color:black;">Log in</a></p>
            </div>
            <img class="col d-flex justify-content-end" src="accueil.png" alt="image">
        </div>
        <div class="row container-fluid-s d-flex justify-content-center align-items-center " id="scrollspyHeading1"
            style="margin: 0;">
            <div class="col">
                <img src="gurl.png">
            </div>
            <form method="POST" class="col d-flex align-content-center flex-wrap  flex-column py-5">
                <h1 id="login" style="text-align: center; color:#aaa69d;">SIGN IN</h1>
                <div class="mb-3">
                    <label for="username" class="form-label text-white">Username</label>
                    <input type="text" name="uname" class="form-control" id="username" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label text-white">Email address</label>
                    <input type="email" name="uemail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp"  class="form-text">We'll never share your email with anyone else.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label text-white">Password</label>
                    <input type="password" name="upsw" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label text-white">Password verify</label>
                    <input type="password" name="upswtwo" class="form-control" id="exampleInputPassword1">
                </div>

                <input type="submit" value="Sign in" class="btn fw-bold" name="signin"
                    style="background:  #aaa69d; color: #0F2027;">
            </form>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content"  style="background-color: #aaa69d; height: auto;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">LOG IN</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" class=" d-flex align-content-center align-content-center flex-wrap flex-column " action="login.php">
                                <h1 id="login" style="text-align: center; color: white">Enter your information</h1>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label text-white">Email address</label>
                                    <input type="email" name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    value="<?php if (isset($_COOKIE["email"])) {
                                        echo $_COOKIE["email"];
                                    } ?>">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label text-white">Password</label>
                                    <input type="password" name="psw" class="form-control" id="exampleInputPassword1" 
                                    value="<?php if (isset($_COOKIE["psw"])) {
                                        echo $_COOKIE["psw"];
                                    } ?>">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remb"
                                    <?php if (isset($_COOKIE["email"])) { ?> checked <?php } ?>>
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <input type="submit" name="log" value="LOG IN" class="btn fw-bold" style="background:  #aaa69d; color: #0F2027;">
                    
                            </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

</html>
<?php
    include 'login.php';
    include 'signin.php';
?>