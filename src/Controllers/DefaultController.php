<?php


class DefaultController extends Controller
{

    #verify if user is connected !
    static function Auth() {

        if(isset($_SESSION['user_logged_in']) && !empty($_SESSION['session_id'])) {
            return true;
        }

        return false;
    }

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
        $this->render('home');
    }
}
