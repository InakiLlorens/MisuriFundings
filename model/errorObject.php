<?php
class errorObject {
    //he hecho que las siguientes funciones sean estaticas para poder llamarlas sin tener que crear un objeto
    public static function loginError() {
        
        $vars["success"]=false;
        $vars["description"]="could not login succesfully";
        return $vars;
        ;
    }
    public static function loginSuccess() {
        
        $vars["success"]=true;
        $vars["description"]="loged succesfully";
        return $vars;
        ;
    }

    public static function notLogged() {
        
        $vars["success"]=false;
        $vars["description"]="this user is not logged";
        return $vars;
        ;
    }
    public static function logged() {
        
        $vars["success"]=false;
        $vars["description"]="this user is already logged";
        return $vars;
        ;
    }

}