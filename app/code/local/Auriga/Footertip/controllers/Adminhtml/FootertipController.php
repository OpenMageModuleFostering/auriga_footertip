<?php

     
    class Auriga_Footertip_Adminhtml_FootertipController extends Mage_Adminhtml_Controller_Action
    {
     
        protected function _initAction()
        {
            $this->loadLayout()
                ->_setActiveMenu('footertip/items')
                ->_addBreadcrumb(Mage::helper('adminhtml')->__('Items Manager'), Mage::helper('adminhtml')->__('Item Manager'));
            return $this;
        }   
       
        public function indexAction() {
            $this->_initAction();
            $this->_addContent($this->getLayout()->createBlock('footertip/adminhtml_footertip'));
            $this->renderLayout();
        }
     
        public function editAction()
        {
            $footertipId     = $this->getRequest()->getParam('id');
            $footertipModel  = Mage::getModel('footertip/footertip')->load($footertipId);
     
            if ($footertipModel->getId() || $footertipId == 0) {
     
                Mage::register('footertip_data', $footertipModel);
     
                $this->loadLayout();
                $this->_setActiveMenu('footertip/items');
               
                $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));
                $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));
               
                $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
               
                $this->_addContent($this->getLayout()->createBlock('footertip/adminhtml_footertip_edit'))
                     ->_addLeft($this->getLayout()->createBlock('footertip/adminhtml_footertip_edit_tabs'));
                   
                $this->renderLayout();
            } else {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('footertip')->__('Item does not exist'));
                $this->_redirect('*/*/');
            }
        }
       
        public function newAction()
        {
				 $this->_initAction();
				$this->_addContent($this->getLayout()->createBlock('footertip/adminhtml_footertip_addnew'));
				$this->renderLayout();
             
        }
       
        public function saveAction()
        {
            if ( $this->getRequest()->getPost() ) {
                try {
                    $postData = $this->getRequest()->getPost();
                    $footertipModel = Mage::getModel('footertip/footertip');
                   $footertipModel->setId($this->getRequest()->getParam('id'))->setFootertip($postData['footertip'])->save();			
                   //$postData['footertip']
                    Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully saved'));
                    Mage::getSingleton('adminhtml/session')->setfootertipData(false);
     
                    $this->_redirect('*/*/');
                    return;
                } catch (Exception $e) {
                    Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                    Mage::getSingleton('adminhtml/session')->setFootertipData($this->getRequest()->getPost());
                    $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                    return;
                }
            }
            $this->_redirect('*/*/');
        }
       
        public function deleteAction()
        {
            if( $this->getRequest()->getParam('id') > 0 ) {
                try {
                    $footertipModel = Mage::getModel('footertip/footertip');
                   
                    $footertipModel->setId($this->getRequest()->getParam('id'))
                        ->delete();
                       
                    Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
                    $this->_redirect('*/*/');
                } catch (Exception $e) {
                    Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                    $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                }
            }
            $this->_redirect('*/*/');
        }
        /**
         * Product grid for AJAX request.
         * Sort and filter result for example.
         */
        public function gridAction()
        {
            $this->loadLayout();
            $this->getResponse()->setBody(
                   $this->getLayout()->createBlock('importedit/adminhtml_footertip_grid')->toHtml()
            );
        }
		
		
		public function massEnableAction()
		 {
		 $footerTipIds = $this->getRequest()->getParam('status');
		 $footerTipLabel = $this->getRequest()->getParam();
		  
		 
          
		 if(!is_array($footerTipIds)) {
		 Mage::getSingleton('adminhtml/session')->addError(Mage::helper('footertip')->__('Please select product(s)'));
		 } else {
		 try {
		 $footertip = Mage::getModel('footertip/footertip');
		
		 foreach ($footerTipIds as $footerTipId)
		 {
		 	$footertipModel = Mage::getModel('footertip/footertip');
          $footertipModel->setId($footerTipId)->setStatus('Enabled')->save();	
		 }
		 Mage::getSingleton('adminhtml/session')->addSuccess(
		 Mage::helper('footertip')->__(
		 'Total of %d footer tip(s) were successfully updated', count($footerTipIds)
		 )
		 );
		 } catch (Exception $e) {
		 Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
		 }
		 }
		
		 $this->_redirect('*/*/index');
		
		 }
		 public function massDisableAction()
		 {
		  $footerTipIds = $this->getRequest()->getParam('status');
		 $footerTipLabel = $this->getRequest()->getParam();
		  
		 
          
		 if(!is_array($footerTipIds)) {
		 Mage::getSingleton('adminhtml/session')->addError(Mage::helper('footertip')->__('Please select product(s)'));
		 } else {
		 try {
		 $footertip = Mage::getModel('footertip/footertip');
		
		 foreach ($footerTipIds as $footerTipId)
		 {
		 	$footertipModel = Mage::getModel('footertip/footertip');
          $footertipModel->setId($footerTipId)->setStatus('Disabled')->save();	
		 }
		 Mage::getSingleton('adminhtml/session')->addSuccess(
		 Mage::helper('footertip')->__(
		 'Total of %d footer tip(s) were successfully updated', count($footerTipIds)
		 )
		 );
		 } catch (Exception $e) {
		 Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
		 }
		 }
		
		 $this->_redirect('*/*/index');
		
		 }
    }