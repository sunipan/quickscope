<?php
session_start();
if ($_SESSION['user'] === true) {
  session_destroy();
}
header("Location: home.php");
