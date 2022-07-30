<?php
  $host = "localhost"; 
  
    $user = "root";
    $pass = "";
  $nama_db = "db_wedding"; //nama database
  $connect = mysqli_connect($host,$user,$pass,$nama_db); //pastikan urutan nya seperti ini, jangan tertukar

  if(!$connect){ //jika tidak terkoneksi maka akan tampil error
    die ("Koneksi dengan database gagal: ".mysql_connect_error());
  }
?>
