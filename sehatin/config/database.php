<?php
session_start();
$conn = mysqli_connect("localhost","root","","sehatin");
if(!$conn){
    die("Koneksi gagal");
}
