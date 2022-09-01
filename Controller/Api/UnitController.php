<?php
    class UnitController extends BaseController
    {
        /**
         * "/unit/list" Endpoint - Get list units avaliable
         */
        public function listAction()
        {
            $strErrorDesc = '';
            $requestMethod = $_SERVER["REQUEST_METHOD"];

            if (strtoupper($requestMethod) == 'GET') {
                try {

                    if (isset($_GET['type']) && $_GET['type']) {
                        $optionUnitType = $_GET['type'];
                    }else{
                        $strErrorDesc="Unit Type is Required!";
                    }
                   
                    switch($optionUnitType){
                        case 'len':
                            $unitModel = new UnitModel();
                            $arrUnit = $unitModel->getUnitsLength();
                            break;
                        case 'temp':
                            $unitModel = new UnitModel();
                            $arrUnit = $unitModel->getUnitsTemperature();
                            break;
                        case 'speed':
                            $unitModel = new UnitModel();
                            $arrUnit = $unitModel->getUnitsSpeed();
                            break;
                        default:
                            $arrUnit = '';
                            break;
                    }
                    $responseData = json_encode($arrUnit);
                    
                } catch (Error $e) {
                    $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                    $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                }
            } else {
                $strErrorDesc = 'Method not supported';
                $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
            }
    
            // send output
            if (!$strErrorDesc) {
                $this->sendOutput(
                    $responseData,
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            } else {
                $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                    array('Content-Type: application/json', $strErrorHeader)
                );
            }
        }
        
        /**
         * Function to validate all the post fields
         */
        public function validateInput()
        {
            if (!(isset($_POST['from']) && $_POST['from'])) {
                return false;
            }

            if (!(isset($_POST['to']) && $_POST['to'])) {
                return false;
            }

            if (!(isset($_POST['value']) && $_POST['value'])) {
                return false;
            }
            
            return true;
        }

        /**
         * "/unit/converttemperature" Endpoint - Calculate the temperature conversion based on the options sended
         */
        public function convertemperatureAction()
        {
            $strErrorDesc = '';
            $requestMethod = $_SERVER["REQUEST_METHOD"];

            if (strtoupper($requestMethod) == 'POST') {
                try {

                    //makes the validation of the posted fields
                    if($this->validateInput()){
                        $unitFrom = $_POST['from'];
                        $unitTo = $_POST['to'];
                        $unitValue = $_POST['value'];
                    } else {
                        $strErrorDesc="Invalid Parameters!";
                    }
                    
                    // Decides wich function needs to be called based on the field values
                    $unitModel = new UnitModel();
                    switch ($unitFrom){
                        case 'cel':
                            if($unitTo == 'fah'){
                                $returnValue = $unitModel->unitConvertCelToFah($unitValue);
                            }else{
                                $strErrorDesc="Invalid conversion option!";
                            }
                            break;
                        case 'fah':
                            if($unitTo == 'cel'){
                                $returnValue = $unitModel->unitConvertFahToCel($unitValue);
                            }else{
                                $strErrorDesc="Invalid conversion option!";
                            }
                            break;
                    }

                    $responseData = json_encode($returnValue);
                    
                } catch (Error $e) {
                    $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                    $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                }
            } else {
                $strErrorDesc = 'Method not supported';
                $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
            }
    
            // send output
            if (!$strErrorDesc) {
                $this->sendOutput(
                    $responseData,
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            } else {
                $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                    array('Content-Type: application/json', $strErrorHeader)
                );
            }
        }

        /**
         * "/unit/convertlength" Endpoint - Calculate the length conversion based on the options sended
         */
        public function convertlengthAction()
        {
            $strErrorDesc = '';
            $requestMethod = $_SERVER["REQUEST_METHOD"];

            if (strtoupper($requestMethod) == 'POST') {
                try {
                    //makes the validation of the posted fields
                    if($this->validateInput()){
                        $unitFrom = $_POST['from'];
                        $unitTo = $_POST['to'];
                        $unitValue = $_POST['value'];
                    } else {
                        $strErrorDesc="Invalid Parameters!";
                    }
                    
                    // Decides wich function needs to be called based on the field values
                    $unitModel = new UnitModel();
                    switch ($unitFrom){
                        case 'km':
                            if($unitTo == 'mt'){
                                $returnValue = $unitModel->unitConvertKmToMt($unitValue);
                            }elseif($unitTo == 'in'){
                                $returnValue = $unitModel->unitConvertKmToIn($unitValue);
                            }elseif($unitTo == 'fe'){
                                $returnValue = $unitModel->unitConvertKmToFe($unitValue);
                            } else {
                                $strErrorDesc="Invalid conversion option!";
                            }
                            break;
                        case 'mt':
                            if($unitTo == 'km'){
                                $returnValue = $unitModel->unitConvertMtToKm($unitValue);
                            }elseif($unitTo == 'in'){
                                $returnValue = $unitModel->unitConvertMtToIn($unitValue);
                            }elseif($unitTo == 'fe'){
                                $returnValue = $unitModel->unitConvertMtToFe($unitValue);
                            } else {
                                $strErrorDesc="Invalid conversion option!";
                            }
                            break;
                        case 'in':
                            if($unitTo == 'mt'){
                                $returnValue = $unitModel->unitConvertInToMt($unitValue);
                            }elseif($unitTo == 'km'){
                                $returnValue = $unitModel->unitConvertInToKm($unitValue);
                            }elseif($unitTo == 'fe'){
                                $returnValue = $unitModel->unitConvertInToFe($unitValue);
                            } else {
                                $strErrorDesc="Invalid conversion option!";
                            }
                            break;
                        case 'fe':
                            if($unitTo == 'mt'){
                                $returnValue = $unitModel->unitConvertFeToMt($unitValue);
                            }elseif($unitTo == 'in'){
                                $returnValue = $unitModel->unitConvertFeToIn($unitValue);
                            }elseif($unitTo == 'km'){
                                $returnValue = $unitModel->unitConvertFeToKm($unitValue);
                            } else {
                                $strErrorDesc="Invalid conversion option!";
                            }
                            break;
                    }

                    $responseData = json_encode($returnValue);
                    
                } catch (Error $e) {
                    $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                    $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                }
            } else {
                $strErrorDesc = 'Method not supported';
                $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
            }
    
            // send output
            if (!$strErrorDesc) {
                $this->sendOutput(
                    $responseData,
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            } else {
                $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                    array('Content-Type: application/json', $strErrorHeader)
                );
            }
        }

        /**
         * "/unit/convertspeed" Endpoint - Calculate the speed conversion based on the options sended
         */
        public function convertspeedAction()
        {
            $strErrorDesc = '';
            $requestMethod = $_SERVER["REQUEST_METHOD"];

            if (strtoupper($requestMethod) == 'POST') {
                try {
                    //makes the validation of the posted fields
                    if($this->validateInput()){
                        $unitFrom = $_POST['from'];
                        $unitTo = $_POST['to'];
                        $unitValue = $_POST['value'];
                    } else {
                        $strErrorDesc="Invalid Parameters!";
                    }
                    
                    // Decides wich function needs to be called based on the field values
                    $unitModel = new UnitModel();
                    switch ($unitFrom){
                        case 'mps':
                            if($unitTo == 'kph'){
                                $returnValue = $unitModel->unitConvertMpsToKph($unitValue);
                            }elseif($unitTo == 'mph'){
                                $returnValue = $unitModel->unitConvertMpsToMph($unitValue);
                            } else {
                                $strErrorDesc="Invalid conversion option!";
                            }
                            break;
                        case 'kph':
                            if($unitTo == 'mps'){
                                $returnValue = $unitModel->unitConvertKphToMps($unitValue);
                            }elseif($unitTo == 'mph'){
                                $returnValue = $unitModel->unitConvertKphToMph($unitValue);
                            } else {
                                $strErrorDesc="Invalid conversion option!";
                            }
                            break;
                        case 'mph':
                            if($unitTo == 'mps'){
                                $returnValue = $unitModel->unitConvertMphToMps($unitValue);
                            }elseif($unitTo == 'kph'){
                                $returnValue = $unitModel->unitConvertMphToKph($unitValue);
                            } else {
                                $strErrorDesc="Invalid conversion option!";
                            }
                            break;
                    }

                    $responseData = json_encode($returnValue);
                    
                } catch (Error $e) {
                    $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                    $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                }
            } else {
                $strErrorDesc = 'Method not supported';
                $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
            }
    
            // send output
            if (!$strErrorDesc) {
                $this->sendOutput(
                    $responseData,
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            } else {
                $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                    array('Content-Type: application/json', $strErrorHeader)
                );
            }
        }

    }
?>