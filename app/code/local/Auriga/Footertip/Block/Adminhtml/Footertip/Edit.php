<?php
     
    class Auriga_Footertip_Block_Adminhtml_Footertip_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
    {
        public function __construct()
        {
            parent::__construct();
                   
            $this->_objectId = 'id';
            $this->_blockGroup = 'footertip';
            $this->_controller = 'adminhtml_footertip';
     
            $this->_updateButton('save', 'label', Mage::helper('footertip')->__('Save Tip'));
            $this->_updateButton('delete', 'label', Mage::helper('footertip')->__('Delete Tip'));
        }
     
        public function getHeaderText()
        {
            if( Mage::registry('footertip_data') && Mage::registry('footertip_data')->getId() ) {
                return Mage::helper('footertip')->__("Edit Tip '%s'", $this->htmlEscape(Mage::registry('footertip_data')->getFootertip()));
            } else {
                return Mage::helper('footertip')->__('Add Item');
            }
        }
    }