<?php


class AuthController extends Controller
{

    #verify if user is connected !
    static function Auth() {

        if(isset($_SESSION['user_logged_in']) && !empty($_SESSION['username'])) {
            return true;
        }

        return false;
    }


    #login function
    public function verifyCredentials(Request $request){

        if($request->method != "POST")
        {
            header('Status: 301 Moved Permanently', false, 301);
            header("location: ../home");

        }
        else
        {
            $data = $request->data;
            $user_manager = new UserManager();

            if($user_manager->validUser($data)){
                $_SESSION['user_logged_in'] = 'true';
                $_SESSION['username'] = $data['username'];

                header("location: ../home");
            }
            else
            {
                $_SESSION['system_message'] = 'error login or password!';
                header("location: ./login");
            }

        }

    }

    #function new user
    function newUser(Request $request){
        if($request->method != "POST")
        {
            header('Status: 301 Moved Permanently', false, 301);
            header("location: ../home");

        }
        else
        {
            $data = $request->data;
            $user_manager = new UserManager();

            if($user_manager->addUser($data)){

                $_SESSION['user_logged_in'] = true;
                $_SESSION['username'] = $data['username'];

                header("location: ../home");
            }
            else {
                $_SESSION['system_message'] = 'an error was occured during the process !';
                header("location: ./register");
            }
        }
    }

    //function to logged out

    function Logout(){

        $_SESSION = [];
        header("location: ./login");

    }

}


?>
