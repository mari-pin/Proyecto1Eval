<?php

spl_autoload_register(function($base){
    include "../clases/$clase.php";
});