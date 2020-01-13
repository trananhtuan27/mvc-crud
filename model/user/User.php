<?php
class User
{
    private $id;
    private $username;
    private $email;
    private $address;
    public function __construct($_username,$_email,$_address)
    {
        $this->username = $_username;
        $this->email = $_email;
        $this->address = $_address;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}