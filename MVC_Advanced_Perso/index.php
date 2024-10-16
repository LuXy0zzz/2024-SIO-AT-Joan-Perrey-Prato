<?php
    require_once 'config/global.php';

    if (isset($_GET["controller"])){
        $controllerObj = loadController($_GET["controller"]);
        loadAction($controllerObj);
    }else{
        $controllerObj=loadController(CONTROLLER_DEFAULT);
        loadAction($controllerObj);
    }
    function loadController($controller){
        switch($controller){
            case 'Joueurs':
                $strFileController ='controller/JoueurController.php';
                require_once $strFileController;
                $controllerObj = new JoueursController();
            break;

            default:
            $strFileController ='controller/JoueurController.php';
                require_once $strFileController;
                $controllerObj = new JoueursController();
            break;
        }
        return $controllerObj;
    }
    function loadAction($controllerObj){
        if(isset($_GET["action"])){
            $controllerObj->run($_GET["action"]);
        }else{
            $controllerObj->run(ACTION_DEFAULT); 
        }
    }


?>