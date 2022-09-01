<?php
    define("PROJECT_ROOT_PATH", __DIR__ . "/../");
    
    // include the base controller file
    require_once PROJECT_ROOT_PATH . "/Controller/Api/BaseController.php";
    
    // include the UnitType model file
    require_once PROJECT_ROOT_PATH . "/Model/UnitTypeModel.php";

    // include the Unit model file
    require_once PROJECT_ROOT_PATH . "/Model/UnitModel.php";
?>