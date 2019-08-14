<?php

class Polytab_OmniPixel_Block_Adminhtml_Settings_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'omnipixel';
        $this->_controller = 'adminhtml_settings';
        
        $this->_updateButton('save', 'label', Mage::helper('omnipixel')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('omnipixel')->__('Delete Item'));

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('payment_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'omnipixel_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'omnipixel_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if(Mage::registry('omnipixel_data') && Mage::registry('omnipixel_data')->getId()){
        	return Mage::helper('omnipixel')->__("Edit Item %s", $this->htmlEscape(Mage::registry('omnipixel_data')->getTitle()));
        } else {
            return Mage::helper('omnipixel')->__('Domains Mapping');
        }
    }
}