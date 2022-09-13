<?php
    include("connect.php");

    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $address = $_POST["address"];
    $img_name = $_FILES["photo"]["name"];
    $tmp_name = $_FILES["photo"]["tmp_name"];
    $role = $_POST["role"];


    // echo "<pre>";
    // print_r($_FILES['photo']);
    // echo "</pre>";

    if($password == $cpassword){
        move_uploaded_file($tmp_name, "../Uploads/$img_name" );
        $sql = "INSERT INTO `e-voting`.`user` (`name`, `mobile`, `password`, `address`, `img`, `role`, `status`, `votes`) VALUES ('$name', '$mobile', '$password', '$address', '$img_name', '$role', 0, 0);";
        $insert = mysqli_query($connect, $sql);
        if($insert){
            echo '
            <script>
                alert("Registration Successfull!");
                window.location = "../";
            </script>
            ';    
        }
        else{
            echo '
            <script>
                alert("some error occured!");
                window.location = "../routes/register.html";
            </script>
            ';
        }
    }else{
        echo '
            <script >
                alert("Password and cpassword does not match!");
                window.location = "../routes/register.html";
            </script>
            ';
    }

?>