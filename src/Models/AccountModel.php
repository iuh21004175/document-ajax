<?php

namespace App\Models;

use App\Core\Model;

class AccountModel extends Model
{
    public function getAccount($user, $password)
    {
        $sql = "SELECT * FROM account WHERE username = '$user' AND password = '$password'";
        $result = mysqli_query($this->conn,$sql);
        if (mysqli_num_rows($result) == 1) {
            return mysqli_fetch_assoc($result);
        }
        else{
            return false;
        }
    }
}