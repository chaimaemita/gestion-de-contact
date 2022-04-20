<?php
  require 'log.php';
  require_once 'model.user.php';

  $user = new User();

  $id = $_SESSION["id"];
  $sql = $user->affichData($id);  
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
            background: linear-gradient(to right, #0F2027, #203A43, #2C5364);
        }
        #card {
      display: none !important;
    }
    @media screen and (max-width: 500px) {
      #card {
        display: block !important;
      }

      #visuel {
        display: none;
      }
    }
    </style>

</head>

<body>
    <div class="container-fluid d-flex flex-column">
        <nav class="navbar navbar-light fixed-top" style="background-color: #0F2027">
            <div class="container-fluid">
                <a class="navbar-brand p-1 fw-bold" style="color: #aaa69d; border:1px solid #aaa69d;" href="accueil.html" >Contacts list</a>
              <button class="navbar-toggler" style="background-color: #aaa69d;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="background-color: #aaa69d;">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item"><a href="profile.php" class="text-dark nav-link" style="text-decoration: none;">PROFILE</a></li>
                    <li class="nav-item"><a href="contact.php" class="text-dark nav-link" style="text-decoration: none;">CONTACT</a></li>
                    <li class="nav-item"><a href="newcontact.php" class="text-dark nav-link" style="text-decoration: none;">SETTINGS</a></li>
                    <li class="nav-item"><a href="connexion.php" class="text-dark nav-link" style="text-decoration: none;">LOGOUT</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
        <div class="container-fluid-xl">
            <div class="row mt-5">
                <div class="col p-5">
                    <div class="d-flex flex-column">
                        <p class="text-white fs-4">Contact list:</p>
                        <table class="border-top" id="visuel">
                          <?php
                            while ($data = mysqli_fetch_assoc($sql)) {
                              
                          ?>
                            <tr class="border-top">
                                <td class="text-white py-2">contact:</td>
                                <td  style="color:#aaa69d;"><?php echo $data['stname'] ." ". $data['ndname'] ?></td>
                                <td style="color:#aaa69d;"><?php echo $data['email']?></td>
                                <td style="color:#aaa69d;"><?php echo $data['phone']?></td>
                                <td style="color:#aaa69d;"><?php echo $data['adress']?></td>
                                <td style="color:#aaa69d;"><a href="edit.php?id=<?php echo $data['id'] ?>" style="text-decoration: none; color: #aaa69d;">EDIT</a> </td>
                                <td style="color:#aaa69d;"><a href="delete.php?id=<?php echo $data['id'] ?>" style="text-decoration: none; color: #aaa69d;">DELETE</a></td>
                            </tr>
                          <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="container mt-1 d-flex justify-content-center align-content-center" id="card">
                <div class="card text-center my-2" style="width: 70%; margin: 0 15%; height: auto; background-color: #aaa69d;">
                  <img src="profile.svg" class="card-img-top" alt="...">
                  <?php 
                    while ($data = mysqli_fetch_assoc($sql)){
                  ?>
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $data['stname'] ." ". $data['ndname'] ?></h5>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $data['email']?></li>
                    <li class="list-group-item"><?php echo $data['phone']?></li>
                    <li class="list-group-item"><?php echo $data['adress']?></li>
                    <a href="edit.php?id=<?php echo $data["id"] ?>" style="text-decoration: none;">EDIT</a>
                    <a href="delete.php?id=<?php echo $data["id"] ?>" style="text-decoration: none;">DELETE</a>
                  </ul>
                  <?php } ?>
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

</body>

</html>