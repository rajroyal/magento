<?php
class Royal_Testimonials_Model_Categories extends Mage_Core_Model_Abstract{
     public function _construct(){
         parent::_construct();
         $this->_init('testimonials/categories');
     }
}
