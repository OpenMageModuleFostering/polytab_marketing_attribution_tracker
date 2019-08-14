<?php
class Polytab_OmniPixel_Block_Adminhtml_Form_Setting extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
    	parent::__construct();
        $this->_blockGroup = 'omnipixel';
        $this->_controller = 'adminhtml_form';
        $this->_mode = 'setting';
        $this->_updateButton('save', 'label', Mage::helper('omnipixel')->__('Save Config')); 
    }
 
    public function getHeaderText()
    {
    	return Mage::helper('omnipixel')->__('Polytab Attribution');
    }
}