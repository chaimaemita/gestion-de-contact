<?php
    require_once 'connect.php';
    class User extends Connection{
        //insert
    function insertData($stname,$ndname,$phone,$email,$adress,$id){

        $query=mysqli_query( $this->conn, "INSERT INTO `contact`(`stname`, `ndname`, `phone`, `email`, `adress`, `acc_id`) VALUES('$stname','$ndname','$phone','$email','$adress','$id')");
        if ($query) {
            return $query;
        }else {
            echo "failed";
        }
    }
    public function affichData($accid){
        $sql = mysqli_query($this->conn, "SELECT * FROM `contact` WHERE acc_id ='$accid' ");
        return $sql;
    }

    //update
    public function getData($id){
        $sql = mysqli_query($this->conn, "SELECT * FROM `contact` WHERE id='$id'");
        $data=mysqli_fetch_assoc($sql);
        return $data;
    }

    public function updateData($stname,$ndname,$phone,$email,$adress,$id){
        $sql = mysqli_query($this->conn, "UPDATE `contact` SET stname='$stname', ndname='$ndname', phone='$phone', email='$email', adress='$adress' WHERE id='$id'");
        if ($sql) {
            return true;
        }else {
            return false;
        }
    }

    //delete
    public function deleteData($id){
        $sql = mysqli_query($this->conn, "DELETE FROM `contact` WHERE id='$id'");
        return $sql;
    }



    }
    


?>