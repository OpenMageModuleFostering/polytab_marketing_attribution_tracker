<?php
class Polytab_OmniPixel_Adminhtml_OmnipixelbackendController extends Mage_Adminhtml_Controller_Action{
	public function indexAction(){
       $this->loadLayout()
       		->_setActiveMenu('omnipixel/omnipixel'); 
	   $this->_title($this->__("Polytab Pixel Heartbeat"));
	   $this->renderLayout();
    }
	
	protected function _isAllowed(){
		return Mage::getSingleton('admin/session')->isAllowed('admin/omnipixel/omnipixelbackend');
	}
	
	public function getkeyAction(){
		
      if($data = $this->getRequest()->getPost()){
		  
			$platformdevcode = $data['platform_code'];
			$Responce = $this->checkPlatformCode($platformdevcode);
			
			if($platformdevcode != ""){
				if($Responce['status'] =='error' ){					
					Mage::getSingleton('core/session')->addError('Cannot Generate Client And Secert Key please Check.');
					$this->_redirect('*/*/config');
					return;
				}				
				$data['client_key'] = $Responce['client_key'];
				$data['secret_key'] = $Responce['secret_key'];				
			}			
			
			$model = Mage::getModel('omnipixel/omnipixelsetting');
			$id = $this->getRequest()->getParam('id');
			if($id){
				$model->load($id);
			}
			
			
			$model->setData($data);
 
			try{
				if($id){
					$model->setId($id);
				}
				$model->save();
 
				if(!$model->getId()){
					Mage::throwException(Mage::helper('omnipixel')->__('Error saving example'));
				}
 
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('omnipixel')->__('Attribution Tracker config was successfully saved.'));
				//Mage::getSingleton('adminhtml/session')->setFormData(false);
 
               
				if($this->getRequest()->getParam('back')){
					$this->_redirect('*/*/config', array('id' => $model->getId()));
				} else{
					$this->_redirect('*/*/config');
				}
 
			} catch(Exception $e){
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				if($model && $model->getId()){
					$this->_redirect('*/*/config', array('id' => $model->getId()));
				} else{
					$this->_redirect('*/*/config');
				}
			}
 
			return;
		}
    }
	
	public function checkPlatformCode($platformdevcode){
		
			/* Check API KEYs */
			  
			 $getattributeurl ='https://api.polytab.com/v1/api/PixelRegistration/GetSecret/M90912138394TYTYBEQWETF';
			$key_data = array();
			try{
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL,$getattributeurl);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldData);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$server_output = curl_exec ($ch);
					curl_close ($ch);
					$resArr = json_decode($server_output);
					$client_id =$resArr->clientid; 
					$secret_key =$resArr->secretkey;
					$key_data['client_key'] = $client_id;
					$key_data['secret_key'] = $secret_key;
					
					if($client_id !='' && $secret_key !=''){
					 
						$key_data['status'] = 'success';
					}else{
						$key_data['status'] = 'error';
					}
					
			} catch(Exception $e){
				
				$key_data['status'] = 'error';
				
			}
		
		return $key_data;
	}
	
	public function configAction(){
		
       $this->loadLayout()
       		->_setActiveMenu('omnipixel/omnipixel'); 
	   $this->_title($this->__("Attribution Tracker Setting"));
	   //$this->_addContent($this->getLayout()->createBlock('omnipixel/adminhtml_omnipixelbackend'));adminhtml_form_store
	   $this->_addContent($this->getLayout()->createBlock('omnipixel/adminhtml_form_setting'));
	   
	   $this->renderLayout();
    }
}