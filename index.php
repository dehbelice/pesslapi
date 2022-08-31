<?php
    header("Access-Control-Allow-Origin: *");
    require __DIR__ . "/inc/bootstrap.php";
    
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = explode( '/', $uri );
    
    if ((isset($uri[2]) && $uri[2] == 'unittype') && isset($uri[3])) {
        require PROJECT_ROOT_PATH . "/Controller/Api/UnitTypeController.php";
        $objFeedController = new UnitTypeController();
    } elseif ((isset($uri[2]) && $uri[2] == 'unit') && isset($uri[3])) {
        require PROJECT_ROOT_PATH . "/Controller/Api/UnitController.php";
        $objFeedController = new UnitController();
    }else {
        header("HTTP/1.1 404 Not Found");
        exit();
    }
    
    $strMethodName = $uri[3] . 'Action';
    $objFeedController->{$strMethodName}();
?>