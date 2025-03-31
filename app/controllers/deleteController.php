<?php

require_once("../models/users.php");

class DeleteUser extends Users
{
    private $users;

    public function __construct($users)
    {
        $this->users = $users;
    }

    public function delete()
    {
        return $this->users->deleteUser();
    }

}

$delete = new DeleteUser($users);
$delete->delete();
