<?php


class MessageManager extends Manager
{

    #get all public messagees
    function getAllMessages()
    {
        $query = mysqli_query(self::$db, "SELECT * FROM public_messages");
        $data = [];
        while ($result = mysqli_fetch_assoc($query)){
            $data [] = $result;
        }

        if(count($data) > 0){
            return $data;
        }

        return false;
    }

    #get all private messages
    function getAllPrivateMessages($cid, $uid)
    {
        $sql = "SELECT * FROM message WHERE (from_id='$cid' OR from_id='$uid') AND (to_id='$uid' OR to_id='$cid')";
        $query = mysqli_query(self::$db, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)){
            $data [] = $row;
        }
        return $row;
    }

    function  getMessageByID($message_id){

        $query = mysqli_query(self::$db, "SELECT * FROM public_messages WHERE public_id = '$message_id'");
        if($query) {
            $row = mysqli_fetch_assoc($query);
            return $row;
        }

        return [];
    }

    function sendPublicMessage($sendor, $content)
    {
        $sendor_id = $sendor;
        $sql = "INSERT INTO `public_messages` (`public_id`, `sendor_id`, `content`, `created`) VALUES (NULL, '$sendor_id', '$content', CURRENT_TIMESTAMP)";

        $query = mysqli_query(self::$db, $sql);
        if($query){
            return true;
        }
        else {
            return false;
        }
    }
}
