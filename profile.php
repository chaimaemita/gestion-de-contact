

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
    <?php
  require 'log.php';
  require_once 'model.user.php';

  $user = new User();

  $id = $_SESSION["id"];

  if (isset($_POST["add"])) {
    $stname = $_POST["stname"];
    $ndname = $_POST["ndname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $adress = $_POST["adress"];

    if ($user->insertData($stname,$ndname,$phone,$email,$adress,$id)) {
      echo "<script>
      Swal.fire(
          'Success!',
          'You clicked the button!',
          'success'
      );              
      </script>";
    }else {
      echo "<script>
      Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'User already exist!',
      }) ;   
      </script>";
    }
  }
?>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      width: 100% !important;
      height: auto;
      background: linear-gradient(to right, #0F2027, #203A43, #2C5364);
    }

    #card {
      display: none !important;
    }


    @media screen and (max-width: 630px) {
      #img {
        width: 200px !important;
      }
    }

    @media screen and (max-width: 390px) {
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
        <a class="navbar-brand p-1 fw-bold" style="color: #aaa69d; border:1px solid #aaa69d;"
          href="accueil.html">Contacts list</a>
        <button class="navbar-toggler" style="background-color: #aaa69d;" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel"
          style="background-color: #aaa69d;">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item"><a href="profile.php" class="text-dark nav-link"
                  style="text-decoration: none;">PROFILE</a></li>
              <li class="nav-item"><a href="contact.php" class="text-dark nav-link"
                  style="text-decoration: none;">CONTACT</a></li>
              <li class="nav-item"><a href="newcontact.php" class="text-dark nav-link"
                  style="text-decoration: none;">SETTINGS</a></li>
              <li class="nav-item"><a href="logout.php" class="text-dark nav-link"
                  style="text-decoration: none;">LOGOUT</a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <div class="container-fluid-xl d-flex justify-content-between">
      <div class="row mt-5 d-flex justify-content-around p-5">
        <div class="col d-flex flex-column">
          <div class="d-flex flex-column" id="txt">
            <p class="text-white fw-bold fs-1">HELLO USER,</p>
            <p class="text-white fs-4">your profile:</p>
          </div>
          <div class="d-flex flex-column">
            <div id="visuel">
              <img id="img" src="profile.svg" alt="avatar" style="width: 300px;">
            </div>
            <table class="border-top" id="visuel">
              <tr>
                <td class="text-white py-2">Username:</td>
                <td class="fw-bold" style="color: #aaa69d;">
                  <?php echo $_SESSION["name"]; ?>
                </td>
              </tr>
              <tr class="border-top">
                <td class="text-white py-2">Sign up date:</td>
                <td class="fw-bold" style="color: #aaa69d;">Mon, April 04</td>
              </tr>
              <tr class="border-top">
                <td class="text-white py-2">Last login:</td>
                <td class="fw-bold" style="color: #aaa69d;">Tue, April 05</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="col p-5" id="visuel">
          <div class="d-flex flex-column">
            <p class="text-white fs-4 fw-bold">Contact list:</p>
            <p class="text-white fs-5">Add  ur list.</p>
            <form method="POST" class="row g-3 needs-validation p-3 mt-2" novalidate style="border: 1px solid #aaa69d;">
              <div class="col-md-4">
                <label for="validationCustom01" class="form-label" style="color: #aaa69d;">First name</label>
                <input type="text" name="stname" class="form-control" id="validationCustom01"  required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-4">
                <label for="validationCustom02" class="form-label" style="color: #aaa69d;">Last name</label>
                <input type="text" name="ndname" class="form-control" id="validationCustom02"  required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label" style="color: #aaa69d;">PHONE</label>
                <div class="input-group has-validation">
                  <input type="number" name="phone" class="form-control" id="validationCustomUsername"
                    aria-describedby="inputGroupPrepend" required>
                  <div class="invalid-feedback">
                    Please enter the phone number.
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <label for="validationCustom03" class="form-label " style="color: #aaa69d;">EMAIL</label>
                <input type="email" name="email" class="form-control" id="validationCustom03" required>
                <div class="invalid-feedback">
                  Please enter the email.
                </div>
              </div>
              <div class="col-md-6">
                <label for="validationCustom03" class="form-label" style="color: #aaa69d;">ADRESS</label>
                <input type="text" name="adress" class="form-control" id="validationCustom03" required>
                <div class="invalid-feedback">
                  Please provide a valid city.
                </div>
              </div>

              <div class="col-12 d-flex justify-content-end">
              <input type="submit" name="add" value="ADD" class="btn fw-bold"
              style="background:  #aaa69d; color: #0F2027;">              
            </div>
            </form>
          </div>
        </div>
      </div>

    </div>
    <div class="container mt-1 d-flex justify-content-center align-content-center" id="card">
      <div class="card text-center my-2" style="width: 70%; margin: 0 15%; height: auto; background-color: #aaa69d;">
        <img src="profile.svg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">
            <?php echo $_SESSION["name"]; ?>
          </h5>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Mon, April 04</li>
          <li class="list-group-item">Tue, April 05</li>
          <li><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
              style="color: #0F2027; border:1px solid black; background-color: #aaa69d; text-decoration: none;">ADD
              CONTACT
            </button></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: #aaa69d; height: auto;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add new contact</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form method="POST" class="row g-3 needs-validation p-3 mt-2" novalidate style="border: 1px solid #aaa69d;">
              <div class="col-md-4">
                <label for="validationCustom01" class="form-label text-white" >First name</label>
                <input type="text" name="stname" class="form-control" id="validationCustom01"  required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-4">
                <label for="validationCustom02" class="form-label text-white">Last name</label>
                <input type="text" name="ndname" class="form-control" id="validationCustom02"  required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label text-white">PHONE</label>
                <div class="input-group has-validation">
                  <input type="number" name="phone" class="form-control" id="validationCustomUsername"
                    aria-describedby="inputGroupPrepend" required>
                  <div class="invalid-feedback">
                    Please enter the phone number.
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <label for="validationCustom03" class="form-label text-white">EMAIL</label>
                <input type="email" name="email" class="form-control" id="validationCustom03" required>
                <div class="invalid-feedback">
                  Please enter the email.
                </div>
              </div>
              <div class="col-md-6">
                <label for="validationCustom03" class="form-label text-white">ADRESS</label>
                <input type="text" name="adress" class="form-control" id="validationCustom03" required>
                <div class="invalid-feedback">
                  Please provide a valid city.
                </div>
              </div>

              <div class="col-12 d-flex justify-content-end">
              <input type="submit" name="add" value="ADD" class="btn fw-bold"
              style="background:  #aaa69d; color: #0F2027;">              
            </div>
            </form>
        </div>
        <div class="modal-footer">
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
 