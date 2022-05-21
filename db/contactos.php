<?php

class Contacto
{
    private $db;

    public function __construct($conn)
    {
        $this->db = $conn;
    }

    public function insertContacto($name, $apellido, $fechaN, $email, $phone, $especialidad, $destination, $userid)
    {
        try {
            $sql = "INSERT INTO `contactos`(`nombre`, `apellido`, `fecha_nacimiento`, `email`, `phone`,`foto_path`,`especialidad_id`,`user_id`)
   VALUES (:name,:apellido,:fechaN,:email,:phone,:destination,:especialidad,:userid)";
            $stm = $this->db->prepare($sql);
            $values = [':name' => $name, ':apellido' => $apellido, ':fechaN' => $fechaN, ':email' => $email, ':phone' => $phone, ':destination' => $destination, ':especialidad' => $especialidad, ':userid' => $userid];
            $stm->execute($values);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getContactos($userid)
    {
        try {
            $sql = "SELECT `contactos`.`id`,`nombre`, `apellido`, `fecha_nacimiento`, `email`, `phone`,`nombre_especialidad` FROM `contactos` INNER JOIN `especialidad` ON `especialidad_id` = `especialidad`.`id` WHERE `user_id`=:userid ORDER BY `id`";
            $stm = $this->db->prepare($sql);
            $values = [':userid' => $userid];
            $stm->execute($values);
            return $stm->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function getContactoById($id)
    {
        try {
            $sql = "SELECT `contactos`.`id`,`nombre`, `apellido`, `fecha_nacimiento`, `email`, `phone`,`foto_path`,`especialidad_id`,`nombre_especialidad` FROM `contactos` INNER JOIN `especialidad` ON `especialidad_id` = `especialidad`.`id` where `contactos`.`id`=:id";
            $stm = $this->db->prepare($sql);
            $values = [':id' => $id];
            $stm->execute($values);
            return $stm->fetch();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function updateContacto($nombre, $apellido, $fechaN, $email, $phone, $especialidad, $id)
    {
        try {
            $sql = "UPDATE `contactos` SET `nombre`= :nombre,`apellido` = :apellido,`fecha_nacimiento` = :fechaN,`email` = :email,`phone` = :phone,`especialidad_id` = :especialidad WHERE `id` = :id";
            $stm = $this->db->prepare($sql);
            $values = [':nombre' => $nombre, ':apellido' => $apellido, ':fechaN' => $fechaN, ':email' => $email, ':phone' => $phone, ':especialidad' => $especialidad, ':id' => $id];
            $stm->execute($values);
            return true;
        } catch (PDOException $e) {
            $e->getMessage();
            return false;
        }
    }

    public function deleteContacto($id)
    {
        try {
            $sql = "DELETE from `contactos` WHERE `id`=:id";
            $stmt = $this->db->prepare($sql);
            $values = [':id' => $id];
            $stmt->execute($values);
            return true;
        } catch (PDOException $e) {
            $e->getMessage();
            return false;
        }
    }
}
