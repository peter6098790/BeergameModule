<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="keywords" content=" " />
        <meta name="description" content=" " />
        <title>配隊</title>
        <style type="text/css">
         body {
            background-image: url(1.jpg);
            background-attachment:fixed;
            font-size:20px;
            color:#080c0f;  
        }
        #main {
            width: 600px;
            margin: 140px auto;
            border: 10px #f0f8ff solid ;
            padding: 13px;            
            background: #37322f86
        }
        table {
            width: 50px;
            height: 300px;
        }
        th ,td {
            border: 0px solid ;
	        color:#f0f8ff;  
            text-align:center;
            background-color:#37322f86;
        }
        input{           
            font-size: 20px;
            color:#666666; 
        }
        select{
            width: 200px;
            height: 30px;
        }
        #background{
            background-color:#37322f86;
            color:#f0f8ff;         
        }
        #button{
            background-color: #f8f4f4;   
            padding: 1px 80px;
            text-align: center;
            display: inline-block;
            font-size: 20px;
            transition-duration: 0.2s;
            border: 0px solid ;
        }
        #button:hover{
            background-color: #ffffff59;
            color: #070707;
        }
		a{
            text-decoration: none;
            color: #000000;
        }
        </style>
    </head>
    <body>

    <p>insert new room</p>
    <hr />
    <?php
    require('dbconfig.php');
    global $db;
    $role=$_POST['role'];
    $tname=$_POST['tname'];
    if ($tname) {
        $sql1 = "insert into team (tname) values (?)";
        $stmt1 = mysqli_prepare($db, $sql1); 
        mysqli_stmt_bind_param($stmt1, "s",$tname); 
        mysqli_stmt_execute($stmt1);  
        echo "room added.";
    } else {
        echo "empty title, cannot insert.";
    }
    if ($role) {
        $sql2 = "select team.ton from team where team.tname = '$tname'";
        $stmt2 = mysqli_prepare($db, $sql2);
        mysqli_stmt_execute($stmt2); //°õ¦æSQL
        $result = mysqli_stmt_get_result($stmt2);
        $rs = mysqli_fetch_assoc($result);
        $id = $rs['ton'];
        
        $sql3 = "insert into tgame (ton,role) values (?,?)";
        $stmt3 = mysqli_prepare($db, $sql3); //prepare sql statement
        mysqli_stmt_bind_param($stmt3, "ii",$id,$role); //bind parameters with variables
        mysqli_stmt_execute($stmt3);
        
    }
    ?>
    </body>
    </html>