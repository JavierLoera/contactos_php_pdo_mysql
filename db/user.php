<?php

class User
{
    private $db;

    public function __construct($conn)
    {
        $this->db = $conn;
    }

    public function insertUser($username, $password)
    {
        try {
            $result = $this->getUserbyUserName($username);
            if ($result['num'] > 0) {
                return false;
            } else {
                $new_password = md5($password . $username);
                $sql = "INSERT INTO `user`(`username`,`password`)
            VALUES (:username,:password)";
                $stm = $this->db->prepare($sql);
                $values = [':username' => $username, ':password' => $new_password];
                $stm->execute($values);
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getUser($username, $password)
    {
        try {
            $sql = "SELECT `id`,`username`,`password` FROM `user` where `username`=:username AND `password`=:password";
            $stm = $this->db->prepare($sql);
            $values = [':username' => $username, ':password' => $password];
            $stm->execute($values);
            return $stm->fetch();
        } catch (PDOException $e) {
            $e->getMessage();
            return false;
        }
    }

    public function getUserbyUserName($username)
    {
        try {
            $sql = "SELECT COUNT(*) as num FROM `user` where `username`=:username";
            $stm = $this->db->prepare($sql);
            $values = [':username' => $username];
            $stm->execute($values);
            return $stm->fetch();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
