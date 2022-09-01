<?php
    class UnitModel 
    {
        /**
         * Returns the array list of the possible Length units
         */
        public function getUnitsLength()
        {
            return Array("km"=>"kilometers","mt"=>"meters","in"=>"inch", "fe"=>"feet");
        }

        /**
         * Returns the array list of the possible temperature convert options
         */
        public function getUnitsTemperature()
        {
            return Array("cel"=>"Celsius","fah"=>"Fahrenheit");
        }

        /**
         * Returns the array list of the possible Speed units convert options
         */
        public function getUnitsSpeed()
        {
            return Array("mps"=>"Meter per second","kph"=>"Kilometer per hour","mph"=>"Miles per hour");
        }

        /**
         * Makes the conversion from kilometers to meters
         */
        public function unitConvertKmToMt($value)
        { 
            return $value*1000;
        }
        
        /**
         * Makes the conversion from kilometers to inches
         */
        public function unitConvertKmToIn($value)
        { 
            $value=$value*1000;
            return $value*39.3701;
        }

        /**
         * Makes the conversion from kilometers to feets
         */
        public function unitConvertKmToFe($value)
        {
            $value=$value*1000;
            return $value*3.28084;
        }

        /**
         * Makes the conversion from meters to kilometers
         */
        public function unitConvertMtToKm($value)
        { 
            return $value/1000;
        }
        
        /**
         * Makes the conversion from meters to inches
         */
        public function unitConvertMtToIn($value)
        { 
            return $value/0.0254;
        }

        /**
         * Makes the conversion from meters to feets
         */
        public function unitConvertMtToFe($value)
        { 
            return $value*3.2808399;
        }

        /**
         * Makes the conversion from inches to kilometers
         */
        public function unitConvertInToKm($value)
        { 
            return $value*0.0000254;
        }

        /**
         * Makes the conversion from inches to meters
         */
        public function unitConvertInToMt($value)
        { 
            return $value*0.0254;
        }

        /**
         * Makes the conversion from inches to feets
         */
        public function unitConvertInToFe($value)
        { 
            return $value/12;
        }

        /**
         * Makes the conversion from feets to kilometers
         */
        public function unitConvertFeToKm($value)
        { 
            return $value*0.0003048;
        }

        /**
         * Makes the conversion from feets to meters
         */
        public function unitConvertFeToMt($value)
        { 
            return $value*0.3048;
        }

        /**
         * Makes the conversion from feets to inches
         */
        public function unitConvertFeToIn($value)
        { 
            return $value*12;
        }

        /**
         * Makes the conversion from Celsius to Fahrenheit
         */
        public function unitConvertCelToFah($value)
        { 
            return ($value*9/5) + 32; 
        }

        /**
         * Makes the conversion from Fahrenheit to Celsius
         */
        public function unitConvertFahToCel($value)
        { 
            return ($value-32)*5/9;   
        }

        /**
         * Makes the conversion from Meter per second to Kilometer per hour
         */
        public function unitConvertMpsToKph($value)
        { 
            return $value*3.60;
        }

        /**
         * Makes the conversion from Meter per second to Miles per hour
         */
        public function unitConvertMpsToMph($value)
        { 
            return $value*2.2369;
        }

        /**
         * Makes the conversion from Kilometer per hour to Meter per second
         */
        public function unitConvertKphToMps($value)
        { 
            return $value*0.2778;
        }

        /**
         * Makes the conversion from Kilometer per hour to Miles per hour
         */
        public function unitConvertKphToMph($value)
        { 
            return $value/1.609344;
        }

        /**
         * Makes the conversion from Miles per hour to Meter per second
         */
        public function unitConvertMphToMps($value)
        { 
            return $value*0.4470;
        }

        /**
         * Makes the conversion from Miles per hour to Kilometer per hour
         */
        public function unitConvertMphToKph($value)
        { 
            return $value*1.6093;
        }


    }
?>