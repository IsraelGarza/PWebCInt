<?php
    function OpenCon()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "comprasmx";
        $con = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $con -> error);
        
        return $con;
    }
 
    function CloseCon($con)
    {
        $con -> close();
    }

    $conn = OpenCon();
echo "Connected Successfully";
CloseCon($conn);
   
?>