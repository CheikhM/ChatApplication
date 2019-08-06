<?php


class RESTController extends Controller
{
    public $message_manager;
    public $user_manager;

    function __construct()
    {
        $this->message_manager = new MessageManager();
        $this->user_manager = new UserManager();

    }

    function Index(Request $request)
    {
        $data = $request->data;
        $method = $request->method;
        if($method == "POST" && $data['action'] == 'retrieve'){
            $scope = $data['scope'];
            switch ($scope){
                case 'public':
                    $data = $this->getPublicMessage($data['message_id']);
                    header('Content-Type: application/json');
                    echo json_encode($data);
                    break;
                case 'private':
                    $data = $this->getAllPrivateMessages($data['user_id']);
                    header('Content-Type: application/json');
                    echo json_encode($data);
            }
        }

        else{
            echo "no!";
        }

    }

    //to list all private messages for specific users
    function getAllPrivateMessages($user_id){

    }

    // to get a public message by id
    function getPublicMessage($message_id){
        return $this->message_manager->getMessageByID($message_id);
    }
}
