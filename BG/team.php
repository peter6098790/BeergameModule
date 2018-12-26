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
        $sql1 = "insert into team (tname,uid$role) values (?,?);";
        $stmt1 = mysqli_prepare($db, $sql1); 
        mysqli_stmt_bind_param($stmt1, "si",$tname,$role); 
        mysqli_stmt_execute($stmt1);  
        echo "room added.";
    } else {
        echo "empty title, cannot insert.";
    }
    /*if ($role) {
        $sql2 = "insert into team (uid$role) values (?)";
        $stmt2 = mysqli_prepare($db, $sql2); 
        mysqli_stmt_bind_param($stmt2, "i",$role); 
        mysqli_stmt_execute($stmt2);  
        echo "room added.";
    } else {
        echo "empty title, cannot insert.";
    }*/
    /*if ($role) {
        $sql = "insert into team (uid$role) values (?)";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_execute($stmt); //
        $result = mysqli_stmt_get_result($stmt);
        $rs = mysqli_fetch_assoc($result);
        //$id = $rs['ton'];
        //select team.uid$role from team where team.tname = '$tname'
        
    }*/
    ?>
    </body>
    </html>