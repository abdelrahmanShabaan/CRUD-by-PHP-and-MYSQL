<?php

 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "crud_php_mysql";


 //create connection

 $conn = mysqli_connect($servername,$username,$password,$dbname);
 //if condition to make check for connection or not
 if(!$conn)
 {
 	die("connection faild :" .mysqli_connect_error());

 }