<?php
session_start();
if ($_SESSION['user']) {
  session_destroy();
}
header("Location: home.php");
