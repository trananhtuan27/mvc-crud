<?php

class UserDB
{
    private $conn;

    public function __construct()
    {
        $db = new DBconnect();
        $this->conn = $db->connect();
    }

    public function getList()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        $arr = [];
        foreach ($result as $item) {
            $user = new User($item['username'], $item['email'], $item['address']);
            $user->setId($item['id']);
            array_push($arr, $user);
        }
        return $arr;
    }

    //ham them
    public function addUser($user)
    {
        $sql = "INSERT INTO users (username,email,address) VALUE (:username,:email,:address)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $user->getUsername());
        $stmt->bindParam(':email', $user->getEmail());
        $stmt->bindParam(':address', $user->getAddress());
        $stmt->execute();
    }

    public function editUser($userID, $userName, $email, $address)
    {
        $sql = "UPDATE users SET username = :username ,email = :email,address = :address WHERE id=$userID";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $userName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':address', $address);
        $stmt->execute();
    }

    public function getUserById($userId)
    {
        $sql = "SELECT * FROM users WHERE id=$userId";
        $stmt = $this->conn->query($sql);
        return $stmt->fetch();
    }

    public function deleteUser($userId)
    {
        $sql = "DELETE FROM users WHERE id =$userId";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
    }
}