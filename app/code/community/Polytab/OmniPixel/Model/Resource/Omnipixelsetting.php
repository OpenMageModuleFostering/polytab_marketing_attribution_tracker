<?php
class Polytab_OmniPixel_Model_Resource_Omnipixelsetting extends Mage_Core_Model_Resource_Db_Abstract{
	public function _construct(){
		$this->_init('omnipixel/omnipixelsetting', 'id');
	}
}