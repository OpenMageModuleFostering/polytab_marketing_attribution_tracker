<?php

class Polytab_OmniPixel_Model_Resource_Settings_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{

    protected function _construct()
    {
        parent::_construct();
         $this->_init('omnipixel/settings');
    }

   
}