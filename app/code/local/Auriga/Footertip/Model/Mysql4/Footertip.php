<?php
     
    class Auriga_Footertip_Model_Mysql4_Footertip extends Mage_Core_Model_Mysql4_Abstract
    {
        public function _construct()
        {   
            $this->_init('footertip/footertip','footertip_id');
        }
    }