<?php
     
    class Auriga_Footertip_Block_Adminhtml_Footertip_Addnew extends Mage_Adminhtml_Block_Widget_Form_Container
    {
        public function __construct()
        {
           
            $this->_objectId = 'id';
            $this->_blockGroup = 'footertip';
            $this->_controller = 'adminhtml_footertip';
			$this->_mode = 'addnew';
			 parent::__construct();
            $this->_removeButton('save', 'label', Mage::helper('footertip')->__('Save Tip'));
            $this->_updateButton('delete', 'label', Mage::helper('footertip')->__('Delete Item'));
        }
     
        public function getHeaderText()
        {
          return Mage::helper('footertip')->__('Add Tip');
         
        }
    }