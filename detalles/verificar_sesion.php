<?php
session_start();
if($_SESSION["usuario"]=="")
echo "<SCRIPT>window.location=\"../login.php?nosession=1\";</SCRIPT>";
?>