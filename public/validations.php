<?php

function validateForms($nombre,$apellido,$fechaN,$email,$phone,$especialidad){
   $errorrs=[];
    if (empty($nombre)||empty($apellido)||empty($fechaN)||empty($email)||empty($phone)||empty($especialidad))
    {
        array_push($errorrs, "Todos los campos deben ser llenados");
    }
    else if(!preg_match("/^[a-zA-Z-' ]*$/",$nombre)|| !preg_match("/^[a-zA-Z-' ]*$/",$apellido)){
        array_push($errorrs, "Nombre y apellido solo deben coontener letras");
    }
    else if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)){
        array_push($errorrs, "Correo electronico invalido");
    }
    else if(!is_numeric($phone)){
        array_push($errorrs, "EL campo número solo debe contener números");
    }
    else{
         return false;}
         return $errorrs;
}