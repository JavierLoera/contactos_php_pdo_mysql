<?php
include_once 'sesion.php';
session_destroy();
header('location:login.php');
