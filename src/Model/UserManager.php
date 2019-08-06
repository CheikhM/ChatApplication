<?php


class UserManager extends Manager {

    public function addUser($data)
    {
        $stmt = self::$db->prepare("INSERT INTO user (username, email, password) VALUES (?, ?, ?)");

        $stmt->bind_param("sss", $data['username'], $data['email'], md5($data['password']));

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

    #get the current user informations
    public function getCurrentUser(){
        $username = $_SESSION['username'];
        $result = mysqli_query(self::$db,"SELECT * FROM user WHERE username = '$username'");
        $row = mysqli_fetch_assoc($result);

        return $row;
    }


    #get all users
    public function getAllUsers(){
        $query = mysqli_query(self::$db, "SELECT * FROM user");
        $data = [];
        while ($result = mysqli_fetch_assoc($query)){
            $data [] = $result;
        }

        if(count($data) > 0){
            return $data;
        }

        return false;
    }

    #update last activity
    public function updateLastActivity($user_id){

        $sql = "UPDATE `user` SET `last_activity` = CURRENT_TIME() WHERE `user`.`user_id` = '$user_id'";

        if(mysqli_query(self::$db, $sql)){
            return true;
        }

        return mysqli_error(self::$db);
    }


    #check if user is online

    function isOnline($user_id){

        $sql = "SELECT * from user  WHERE user_id ='$user_id' AND `last_activity`<DATE_SUB(NOW(), INTERVAL 5 SECOND)";

        $result = mysqli_fetch_assoc(mysqli_query(self::$db, $sql));

        return $result;

    }

}

