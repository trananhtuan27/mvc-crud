<?php

class UserController
{
    private $userDB;

    public function __construct()
    {
        $this->userDB = new UserDB();
    }

    public function index()
    {
        $users = $this->userDB->getList();
        include_once "view/user/list.php";
    }

//them
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include_once "view/user/add.php";
        } elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user = new User($_POST['username'], $_POST['email'], $_POST['address']);
            $this->userDB->addUser($user);
        }

    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $userID = $_GET['id'];
            $user = $this->userDB->getUserById($userID);
            include_once "view/user/edit.php";
        } elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
            $userID = $_GET['id'];
            $this->userDB->editUser($userID, $_POST['username'], $_POST['email'], $_POST['address']);
        }
    }

    public function delete()
    {
        $userID = $_GET['id'];
        $this->userDB->deleteUser($userID);
    }

}
