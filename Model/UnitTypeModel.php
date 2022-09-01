<?php
    class UnitTypeModel 
    {
        /**
         * Returns the array list of the possible unit types
         */
        public function getUnitType()
        {
            return Array("len"=>"Length","temp"=>"Temperature","speed"=>"Speed");
        }
    }
?>