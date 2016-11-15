<?php
session_start();
session_destroy();
setcookie("usuario_nombre","",-36000);
header("Location:login.php?mensaje=1");
?>