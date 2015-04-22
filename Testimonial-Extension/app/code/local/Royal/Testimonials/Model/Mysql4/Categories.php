<?php
class Royal_Testimonials_Model_Mysql4_Categories extends Mage_Core_Model_Mysql4_Abstract{
     public function _construct()
     {
         $this->_init('testimonials/categories', 'id');
     }
}
