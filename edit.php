<?php
  require 'log.php';
  require_once 'model.user.php';

  $user = new User();

  $id = $_GET["id"];
  $get = $user->getData($id);

  if (isset($_POST["edit"])) {

    $stname = $_POST["stname"];
    $ndname = $_POST["ndname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $adress = $_POST["adress"];

    if ($user->updateData($stname,$ndname,$phone,$email,$adress,$id)) {
        echo '<div class="alert alert-success"> Your Record Has Been Saved :) </div>';
        header("location: contact.php");
        exit();
    }else {
        echo '<div class="alert alert-danger"> Failed </div>';
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
            background: linear-gradient(to right, #0F2027, #203A43, #2C5364);
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
                        <p class="text-white fs-4 fw-bold">Contact list:</p>
                        <p class="text-white fs-5">Add or edit ur list.</p>
                        <form method="POST" class="row g-3 needs-validation p-3 mt-2" novalidate style="border: 1px solid #aaa69d;">
                            <div class="col-md-4">
                              <label for="validationCustom01" class="form-label" style="color: #aaa69d;">First name</label>
                              <input type="text" class="form-control" id="validationCustom01" name="stname" value="<?php echo $get['stname'] ?>" required>
                              <div class="valid-feedback">
                                Looks good!
                              </div>
                            </div>
                            <div class="col-md-4">
                              <label for="validationCustom02" class="form-label" style="color: #aaa69d;">Last name</label>
                              <input type="text" class="form-control" id="validationCustom02" name="ndname" value="<?php echo $get['ndname'] ?>" required>
                              <div class="valid-feedback">
                                Looks good!
                              </div>
                            </div>
                            <div class="col-md-4">
                              <label for="validationCustomUsername" class="form-label" style="color: #aaa69d;">PHONE</label>
                              <div class="input-group has-validation">
                                <input type="number" class="form-control" id="validationCustomUsername" name="phone" aria-describedby="inputGroupPrepend" value="<?php echo $get['phone'] ?>" required>
                                <div class="invalid-feedback">
                                  Please enter the phone number.
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label " style="color: #aaa69d;">EMAIL</label>
                                <input type="email" class="form-control" id="validationCustom03" name="email" value="<?php echo $get['email'] ?>" required>
                                <div class="invalid-feedback">
                                  Please enter the email.
                                </div>
                              </div>
                            <div class="col-md-6">
                              <label for="validationCustom03" class="form-label" style="color: #aaa69d;">ADRESS</label>
                              <input type="text" class="form-control" id="validationCustom03" name="adress" value="<?php echo $get['adress'] ?>" required>
                              <div class="invalid-feedback">
                                Please provide a valid city.
                              </div>
                            </div>
                            
                            <div class="col-12 d-flex justify-content-end">
                            <input type="submit" name="edit" value="UPDATE" class="btn fw-bold"
                                style="background:  #aaa69d; color: #0F2027;">                                
                            </div>
                          </form>
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

</body>

</html>