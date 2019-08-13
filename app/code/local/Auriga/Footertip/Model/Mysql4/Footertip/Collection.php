<?php
     
    class Auriga_Footertip_Model_Mysql4_Footertip_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
    {
        public function _construct()
        {
            //parent::__construct();
            $this->_init('footertip/footertip');
        }
		
		
		public function setRandomOrder()
		{
			$this->setPageSize(1)->getSelect()->order(new Zend_Db_Expr('RAND()'));        
			return $this;
		}
		
		
		
    }