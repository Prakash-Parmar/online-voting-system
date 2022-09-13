<?php
    session_start();
    if(!isset($_SESSION['userData'])){
        header("location: ../");
    }

    $userData = $_SESSION['userData'];
    $groupsData = $_SESSION['groupsData'];

    if($_SESSION['userData']['status']==0){
        $status = '<b style="color: red">Not Voted</b>';
    }
    else{
        $status = '<b style="color: green">Voted</b>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Online Voting System Dashbord</title>
</head>
<body>

    <style>
        #backBtn{
            padding: 5px;
            font-size: 15px;
            background-color: skyblue;
            border-radius: 5px;
            float: left;
            margin: 10px;
        }

        #logoutBtn{
            padding: 5px;
            font-size: 15px;
            background-color: skyblue;
            border-radius: 5px;
            float: right;
            margin: 10px;
        }

        #Profile{
            background-color: white;
            width: 30%;
            padding: 20px;
            float: left;
        }

        #Group{
            background-color: white;
            width: 60%;
            padding: 20px;
            float:right;
        }

        #voteBtn{
            padding: 5px;
            font-size: 15px;
            background-color: skyblue;
            border-radius: 5px;
        }

        #mainPanel{
            padding: 10px;
        }

    </style>
    <div id="mainSection">
        <center>
        <div id="headerSection">
            <a href="../"><button id="backBtn"> Back</button></a>
            <a href="logout.php"><button id="logoutBtn"> Logout</button></a>
            <h1>Online Voting System</h1>
        </div>
        </center>
        <hr>

        <div id="mainPanel"> 
            <div id="Profile">
                <center><img src="../Uploads/<?php echo $userData["img"] ?>" height="100" width="100"></center><br><br>
                <b>Name:</b><?php echo $userData["name"] ?><br><br>
                <b>Mobile:</b><?php echo $userData["mobile"] ?><br><br>
                <b>Address:</b><?php echo $userData["address"] ?><br><br>
                <b>Status:</b><?php $status ?><br><br> 
            </div>
            <div id="Group">
                <?php
                    if( $_SESSION['groupsData']){
                        for($i=0; $i<count($groupsData); $i++){
                            ?>
                            <div>
                                <img style="float: right" src="../Uploads/<?php echo $groupsData[$i]['img'] ?>" height="100" width="100">
                                <b>Group Name: </b><?php echo $groupsData[$i]["name"] ?><br><br>
                                <b>Votes: </b><?php echo $groupsData[$i]["votes"] ?><br><br>
                                <form action="../api/vote.php" method="POST">
                                    <input type="hidden" name="gvotes" value="<?php echo $groupsData[$i]["votes"] ?>" id="">
                                    <input type="hidden" name="gid" value="<?php echo $groupsData[$i]["s_no"] ?>" id="">
                                    <input type="submit" name="voteBtn" valur="Vote" id="voteBtn">
                                </form>
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>

        
    </div>
    
</body>
</html>