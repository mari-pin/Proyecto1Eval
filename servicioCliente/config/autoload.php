<?php

spl_autoload_register(function($clase){
    include __DIR__ . "/../clases/$clase.php";
});