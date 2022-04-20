<?php
 class Connection{
     public $host ="localhost";
     public $user = "root";
     public $password = "";
     public $db_name = "contact_list";

     public $conn;

     public function __construct(){
         $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
     }
 }

 
 class Register extends Connection{
     public function registration($uname, $uemail, $upsw, $upswtwo){
        if (!empty($uname) && !empty($uemail) && !empty($upsw) && !empty($upswtwo)) {
            $sql= mysqli_query($this->conn, "SELECT * FROM account WHERE name='$uname' OR email='$uemail'");
            if (mysqli_num_rows($sql) == 0) {
                   if ($upsw == $upswtwo) {
                       $query= "INSERT INTO account (`name`, `email`, `password`) VALUES('$uname','$uemail','$upsw')";
                       mysqli_query($this->conn, $query);
                       return 10;
                       header("location: accueil.php");
                       exit();
               }else{
                   return 100;
               }
               
            }else {
               return 1;
            }
        }else{
            $foo = 1;
        }
        
     }
 }


 class Login extends Connection{
    public $id;
    public $name;
    public function login($email, $psw){
        $result = mysqli_query($this->conn, "SELECT * FROM account WHERE email='$email' AND password='$psw' ");
        $test = mysqli_num_rows($result);

        if ( $test == 1) {
            $row =  mysqli_fetch_assoc($result);
            if ($psw == $row["password"]) {
                $this->id = $row["id"];
                $this->name = $row["name"];
                return 1;
            }else {
                return 10;
            }
        }else {
                return 100;
            }
        }
    public function idUser(){
        return $this->id;
    }

    public function name(){
        return $this->name;
    }
 }

