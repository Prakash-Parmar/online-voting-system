<?php
    include("connect.php");
    session_start();

    $votes = $_POST['gvotes'];
    $total_votes = $votes + 1;
    $gid = $_POST['gid'];
    $uid = $_SESSION['userData']['s_no'];

    $update_votes = mysqli_query($connect, "UPDATE user SET votes='$total_votes' WHERE s_no='$gid'");
    $update_user_status = mysqli_query($connect, "UPDATE user SET status=1 WHERE s_no='$uid'");

    if($update_votes and $update_user_status){
        $groups = mysqli_query($connect, "SELECT * FROM user WHERE role=2");
        $groupsData = mysqli_fetch_all($groups, MYSQLI_ASSOC);

        $_SESSION['userData']['status'] = 1;
        $_SESSION['groupsData'] = $groupsData;

        echo '
            <script>
                alert("Voted Successfully!!");
                window.location = "../routes/dashbord.php";
            </script>
            '; 
    }
    else{
        echo '
            <script>
                alert("Some Error Occured!!");
                window.location = "../routes/dashbord.php";
            </script>
            '; 
    }
?>