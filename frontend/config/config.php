<?php
const BASE ='marketproyecto';
const USUARIO ='root';
const HOST ='localhost';
const PASS ='';
const OPCIONES = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8",
    PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION,
    PDO::ATTR_PERSISTENT => true);
