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

        #get public message for message_id
        if($method == "POST" && $data['action'] == 'retrieve'){
            $scope = $data['scope'];
            switch ($scope){
                case 'public':
                    $data = $this->getPublicMessage($data['message_id']);
                    header('Content-Type: application/json');
                    echo json_encode($data);
                    break;
                case 'private':
                    $data = $this->getAllPrivateMessages($data['current_id'], $data['user_id']);
                    header('Content-Type: application/json');
                    echo json_encode($data);
            }
        }

        elseif ($method == "POST" && $data['action'] == 'send'){
            $scope = $data['scope'];
            $content = htmlspecialchars($data['content']);

            switch ($scope){
                case 'public':
                    $user_id = $this->user_manager->getCurrentUser()['user_id'];
                    $send_it = $this->message_manager->sendPublicMessage($user_id, $content);
                    if($send_it){
                        $response_data = ['msg' => 'ok'];
                        header('Content-Type: application/json');
                        echo json_encode($response_data);
                    }
                    break;
                case 'private':

            }
        }

        #update last activity
        elseif ($method == "POST" && $data['action'] == 'update_status'){

            if($this->user_manager->updateLastActivity($data['user_id'])){
                $response_data = ['status' => 'updated'];
                header('Content-Type: application/json');
                echo json_encode($response_data);

            }
            else
            {
                $response_data = ['status' => 'error_updated'];
                header('Content-Type: application/json');
                echo json_encode($response_data);
            }


        }

    }

    //to list all private messages for specific users
    function getAllPrivateMessages($current_id, $user_id){

        return $this->message_manager->getAllPrivateMessages($current_id, $user_id);

    }

    // to get a public message by id
    function getPublicMessage($message_id){
        return $this->message_manager->getMessageByID($message_id);
    }
}
