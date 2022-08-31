<?php
    class UnitModel 
    {
        public function getUnitsLength()
        {
            return Array("km"=>"kilometers","mt"=>"meters","in"=>"inch", "fe"=>"feet");
        }

        public function getUnitsTemperature()
        {
            return Array("cel"=>"Celsius","fah"=>"Fahrenheit");
        }

        public function getUnitsSpeed()
        {
            return Array("mps"=>"Meter per second","kph"=>"Kilometer per hour","mph"=>"Miles per hour");
        }

        public function unitConvertKmToMt($value)
        { 
            return $value*1000;
        }
        
        public function unitConvertKmToIn($value)
        { 
            $value=$value*1000;
            return $value*39.3701;
        }

        public function unitConvertKmToFe($value)
        {
            $value=$value*1000;
            return $value*3.28084;
        }

        public function unitConvertMtToKm($value)
        { 
            return $value/1000;
        }
        
        public function unitConvertMtToIn($value)
        { 
            return $value/0.0254;
        }

        public function unitConvertMtToFe($value)
        { 
            return $value*3.2808399;
        }

        public function unitConvertInToKm($value)
        { 
            return $value*0.0000254;
        }

        public function unitConvertInToMt($value)
        { 
            return $value*0.0254;
        }

        public function unitConvertInToFe($value)
        { 
            return $value/12;
        }

        public function unitConvertFeToKm($value)
        { 
            return $value*0.0003048;
        }

        public function unitConvertFeToMt($value)
        { 
            return $value*0.3048;
        }

        public function unitConvertFeToIn($value)
        { 
            return $value*12;
        }

        public function unitConvertCelToFah($value)
        { 
            return ($value*9/5) + 32; 
        }

        public function unitConvertFahToCel($value)
        { 
            return ($value-32)*5/9;   
        }

        public function unitConvertMpsToKph($value)
        { 
            return $value*3.60;
        }

        public function unitConvertMpsToMph($value)
        { 
            return $value*2.2369;
        }

        public function unitConvertKphToMps($value)
        { 
            return $value*0.2778;
        }

        public function unitConvertKphToMph($value)
        { 
            return $value/1.609344;
        }

        public function unitConvertMphToMps($value)
        { 
            return $value*0.4470;
        }

        public function unitConvertMphToKph($value)
        { 
            return $value*1.6093;
        }


    }
?>