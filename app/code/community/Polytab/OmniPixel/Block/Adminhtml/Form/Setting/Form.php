<?php
class Polytab_OmniPixel_Block_Adminhtml_Form_Setting_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {  
  	$form = new Varien_Data_Form(array(
  			'id' => 'edit_form',
  			'action' => $this->getUrl('*/*/getkey',array('id' => 1)),
  			'method' => 'post',
  	));
	
	
  	$form->setUseContainer(true);
	$this->setForm($form);
	
	$model = Mage::getModel('omnipixel/omnipixelsetting');
	$id = 1;
	$data = array();
	if($id){
		$model->load($id); 
		$data = $model->getData(); 
	}
	
  	if($data['is_enable'] == ""){
		$data['is_enable'] = 0;
	}
	
  	$fieldset = $form->addFieldset('form_general', array('legend' => Mage::helper('omnipixel')->__('General Configuration')));
  	
	$fieldset->addField('is_enable', 'select', array(
  			'label'     => Mage::helper('omnipixel')->__('Enable'),
  			'class'     => 'required-entry',
  			'required'  => true,
  			'name'      => 'is_enable',
			'value'      => $data['is_enable'],
			'values'    => array(
                            array('value'=>'1','label'=>'Enable'),
                            array('value'=>'0','label'=>'Disable'),
                       )
  	));
	
	
	
	$platform_code = $data["platform_code"];
	if($platform_code == ""){		
		$fieldset->addField('platform_code', 'hidden', array(
				'label'     => Mage::helper('omnipixel')->__('Platform Code'),
				'required'  => false,
				'name'      => 'platform_code',
				'value'=>'M90912138394TYTYBEQWETF'
		));
		
		$note = 'By agreeing to install the Polytab attribution extension, you acknowledge acceptance of the terms and conditions listed <a href="http://www.infemotions.com/privacy-terms-of-use/" target="_blank">here.</a>';
		$fieldset->addField('terms', 'checkbox', array(
				'required'  => false,
				'name'      => 'terms',
				'after_element_html' => $note,
				'value'=>'1',
				'values'    => array(
								array('value'=>'1'),
								array('value'=>'0'),
						   )
		));
	}
  	return parent::_prepareForm();
  }
  
}