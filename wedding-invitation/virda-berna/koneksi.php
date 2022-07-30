<?php
  $host = "localhost"; 
  $user = "phpmyadmin";
  $pass = "8cadb11f56";
  // $user = "root";
  // $pass = "";
  $nama_db = "db_wedding"; //nama database
  $koneksi = mysqli_connect($host,$user,$pass,$nama_db); //pastikan urutan nya seperti ini, jangan tertukar

  if(!$koneksi){ //jika tidak terkoneksi maka akan tampil error
    die ("Koneksi dengan database gagal: ".mysql_connect_error());
  }
?>
