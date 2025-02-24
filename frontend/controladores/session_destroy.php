<?php
session_start();
require "../config/autoload.php";


$_SESSION['nombre'] = [];
session_destroy();

header("Location:principal.php");