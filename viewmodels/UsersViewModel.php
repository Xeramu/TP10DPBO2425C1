<?php
require_once __DIR__ . "/../models/users.php";

class UserViewModel
{
    private $user;

    public function __construct()
    {
        $this->user = new Users();
    }

    public function getUserList()
    {
        return $this->user->getAll();
    }

    public function getUserById($id)
    {
        return $this->user->getById($id);
    }

    public function addUser($nama, $email)
    {
        return $this->user->create($nama, $email);
    }

    public function updateUser($id, $nama, $email)
    {
        return $this->user->update($id, $nama, $email);
    }

    public function deleteUser($id)
    {
        return $this->user->delete($id);
    }
}
