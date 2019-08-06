<?php


class MessageManager extends Manager
{
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

    function  getMessageByID($message_id){

        $query = mysqli_query(self::$db, "SELECT * FROM public_messages WHERE public_id = '$message_id'");
        if($query) {
            $row = mysqli_fetch_assoc($query);
            return $row;
        }

        return [];
    }
}
