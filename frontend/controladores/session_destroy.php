<?php
session_start();
require "../config/autoload.php";


session_destroy();

header("Location:principal.php");