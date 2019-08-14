<?php
/**
 * @method Polytab_OmniPixel_Model_Product getParent()
 */

class Polytab_OmniPixel_Model_Settings extends Mage_Core_Model_Abstract
{
 

    protected function _construct()
    {
    	parent::_construct();
        $this->_init('omnipixel/settings');
    }

    /**
     * @return array
     */
   
}