<?php
     
    class Auriga_Footertip_Block_Adminhtml_Footertip extends Mage_Adminhtml_Block_Widget_Grid_Container
    {
        public function __construct()
        {
            $this->_controller = 'adminhtml_footertip';
            $this->_blockGroup = 'footertip';
            $this->_headerText = Mage::helper('footertip')->__('Footer Tip Manager');
            $this->_addButtonLabel = Mage::helper('footertip')->__('Add Tip');
            parent::__construct();
        }
    }