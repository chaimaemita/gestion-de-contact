<?php
require_once 'connect.php';
// if (isset($_SESSION["id"])) {
//     header("Location: profile.php");
// }
$register = new Register();
    if (isset($_POST["signin"])) {
        $upsw=hash('sha256',$_POST['upsw']);
        $upswtwo = hash('sha256',$_POST['upswtwo']);
        
        $reslt = $register->registration($_POST["uname"], $_POST["uemail"], $upsw, $upswtwo);
            
        if($reslt == 1) {
            echo "
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'User already exist!',
            }) ;   
            </script>
                ";
        }else{
            if($reslt == 10){
                echo "
                <script>
                Swal.fire(
                    'Success!',
                    'You clicked the button!',
                    'success'
                );              
                </script>
                    ";
            }else if($reslt == 100) {
                echo "
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'password does not match!',
                    }) ;               
                </script>
                    ";
            }
        }
    }
?>