<?php

class Polytab_OmniPixel_Block_Adminhtml_Settings_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {	
	$form = new Varien_Data_Form();
	$this->setForm($form);

	$fieldset = $form->addFieldset('settings_form', array('legend'=>Mage::helper('omnipixel')->__('Domain Mapping')));
	//$Mage_fld = Mage::getSingleton('omnipixel/settings')->getMageFieldsArray();
	$SF_accounts = Mage::getSingleton('omnipixel/settings')->getAccountNamesArray();

	$registrRecord = Mage::registry('omnipixel_data')->getData();
	//print_r($registrRecord);exit;
	//$selectVal = Mage::getModel('omnipixel/productfldmap')->load($recordId['id'])->getData('add_type');

	$account_selected = $registrRecord['account_name'];
	$domain_selected = $registrRecord['domain_name'];
      
	if($this->getRequest()->getParam('entity_id')){

	}

	$field = $fieldset->addField('account_name', 'select', array(
	  'label'     => Mage::helper('omnipixel')->__('Salesforce Account :'),
	  'class'     => 'custom-select required-entry',
	  'name'	  => 'account_name',
	  'searchable'=> 'true',
	  'values'    => $SF_accounts,
	  'value'     => $account_selected
	));
	
	$field->setAfterElementHtml('<script>
	//< ![C
	 
	$j(function() {
		$j("#account_name").customselect();
	});

	 
	//]]>
	</script>');
	
	$fieldset->addField('domain_name', 'text', array(
	  'label'     => Mage::helper('omnipixel')->__('Email Domain :'),
	  'class'     => 'required-entry',
	  'name'	  => 'domain_name',
	  'value'     => $domain_selected
	));	
		
			
	/*	
     if ( Mage::getSingleton('adminhtml/session')->get<Module>Data() ){
	      $form->setValues(Mage::getSingleton('adminhtml/session')->get<Module>Data());
	      Mage::getSingleton('adminhtml/session')->set<Module>Data(null);
	 } elseif ( Mage::registry('<module>_data') ) {
	     $form->setValues(Mage::registry('<module>_data')->getData());
	 }
	 
	*/
	/*
      if ( Mage::getSingleton('adminhtml/session')->getMagerpsyncData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getMagerpsyncData());
          Mage::getSingleton('adminhtml/session')->getMagerpsyncData(null);
      } elseif ( Mage::registry('omnipixel_data') ) {
          $form->setValues(Mage::registry('omnipixel_data')->getData());
      }
      */
      return parent::_prepareForm();
  }
}