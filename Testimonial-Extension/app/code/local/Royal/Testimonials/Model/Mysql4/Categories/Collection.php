<?php
class Royal_Testimonials_Model_Mysql4_Categories_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
 {
     public function _construct()
     {
         parent::_construct();
	$this->_init('testimonials/categories');
     }
}
