<?php  
class Polytab_OmniPixel_Block_Adminhtml_OmniPixelsetting extends Mage_Adminhtml_Block_Widget_Form_Container{
	
	public function __construct(){
        parent::__construct();
        $this->_objectId   = 'id';
        $this->_blockGroup = 'omnipixel';
        $this->_controller = 'adminhtml_omniPixelsetting';        
    }

    public function getHeaderText(){
        return Mage::helper('omnipixel')->__('Polytab Settings');
    }
}