<?php
     
    class Auriga_Footertip_Block_Adminhtml_Footertip_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
    {
     
        public function __construct()
        {
            parent::__construct();
            $this->setId('footertip_tabs');
            $this->setDestElementId('edit_form');
            $this->setTitle(Mage::helper('footertip')->__('News Information'));
        }
     
        protected function _beforeToHtml()
        {
            $this->addTab('form_section', array(
                'label'     => Mage::helper('footertip')->__('Item Information'),
                'name'     => Mage::helper('footertip')->__('Item Information'),
				'remark'   => $this->getLayout()->createBlock('footertip/adminhtml_footertip_edit_tab_form')->toHtml(),
            ));
           
            return parent::_beforeToHtml();
        }
    }