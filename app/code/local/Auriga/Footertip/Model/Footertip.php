<?php
     
    class Auriga_Footertip_Model_Footertip extends Mage_Core_Model_Abstract
    {
        public function _construct()
        {
            parent::_construct();
            $this->_init('footertip/footertip');
        }
    }