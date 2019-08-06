<?php


class UserManager extends Manager {

    public function addUser($data)
    {
        $stmt = $this->db->prepare("INSERT INTO user (username, email, password) VALUES (?, ?, ?)");

        $stmt->bind_param("sss", $data['username'], $data['email'], $data['password']);

        if($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    # verify the login and password

    public function validUser($data)
    {
        $result = mysqli_query(self::$db,"SELECT * FROM user WHERE username='" . $data["username"] . "' and password = '". md5($data["password"]) ."'");
        $count = mysqli_num_rows($result);
        if($count == 0){
            return false;
        }
        else {
            return true;
        }

    }
}

