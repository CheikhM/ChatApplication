<?php


class DefaultController extends Controller
{

    # to logged out
    static function Logout(){
        if(session_destroy()){
            return true;
        }

        return false;
    }

    #to render login page
    public function Login(){
        $this->render("login/login");

    }

    #to render register page
    public function Register(){
        $this->render("login/register");
    }

    #non existed  routes
    static function NotFound(){
        self::render("layout/404error");
    }

    #to render main chat page
    public function Home(){
        if(AuthController::Auth()) {
            $this->render('home');
        }
        else
        {
            header("location: ./login");
        }
    }
}
