<?php
     
    class Auriga_Footertip_Block_Adminhtml_Footertip_Grid extends Mage_Adminhtml_Block_Widget_Grid
    {
        public function __construct()
        {
            parent::__construct();
            $this->setId('footertipGrid');
            // This is the primary key of the database
            $this->setDefaultSort('footertip_id');
            $this->setDefaultDir('ASC');
            $this->setSaveParametersInSession(true);
        }
     protected function _prepareMassaction()
		 {
		 $this->setMassactionIdField('footertip_id');
		 $this->getMassactionBlock()->setFormFieldName('status');
		 $this->getMassactionBlock()->addItem('enabled', array(
		 'label'    => Mage::helper('footertip')->__('Enabled'),
		 'url'      => $this->getUrl('*/*/massEnable'),
		 ));
		 
		  $this->getMassactionBlock()->addItem('disabled', array(
		 'label'    => Mage::helper('footertip')->__('Disabled'),
		 'url'      => $this->getUrl('*/*/massDisable'),
		 ));
		
		 return $this;
		 }
        protected function _prepareCollection()
        {
            $collection = Mage::getModel('footertip/footertip')->getCollection();
            $this->setCollection($collection);
            return parent::_prepareCollection();
        }
     
        protected function _prepareColumns()
        {
            $this->addColumn('footertip_id', array(
                'header'    => Mage::helper('footertip')->__('ID'),
                'align'     =>'right',
                'width'     => '50px',
                'index'     => 'footertip_id',
            ));
     
            $this->addColumn('footertip', array(
                'header'    => Mage::helper('footertip')->__('Footer Tip'),
                'align'     =>'left',
                'index'     => 'footertip',
            ));
     
            
            $this->addColumn('status', array(
                'header'    => Mage::helper('footertip')->__('Status'),
                'width'     => '150px',
                'index'     => 'status',
            ));
            
     
            
            return parent::_prepareColumns();
        }
     
        public function getRowUrl($row)
        {
            return $this->getUrl('*/*/edit', array('id' => $row->getId()));
        }
     
     
    }