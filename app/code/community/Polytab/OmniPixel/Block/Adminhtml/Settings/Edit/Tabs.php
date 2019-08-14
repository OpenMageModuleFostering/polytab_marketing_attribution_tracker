<?php

class Polytab_OmniPixel_Block_Adminhtml_Settings_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('settings_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('omnipixel')->__('Domain Mapping'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('omnipixel')->__('Domain Mapping'),
          'title'     => Mage::helper('omnipixel')->__('Domain Mapping'),
          'content'   => $this->getLayout()->createBlock('omnipixel/adminhtml_settings_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}