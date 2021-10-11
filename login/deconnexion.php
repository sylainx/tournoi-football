<?php

    require_once('../functions/appelerBD.php');

    session_start();
    session_destroy();
    /*-- Réinitialiser tables et sessions --*/ 
    delete_all_tables();
    header('Location: ../index.php');
    exit();

