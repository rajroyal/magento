<?php
class Royal_Testimonials_Block_Monblock extends Mage_Core_Block_Template{
     public function methodblock($category_id){
     if(!isset($category_id))
			$collection = Mage::getModel('testimonials/testimonials')->getCollection()->setOrder('id_royal_testimonials','asc');
	else
			$collection = Mage::getModel('testimonials/testimonials')->getCollection()->addFieldToFilter(array('category'), array($category_id))->setOrder('id_royal_testimonials','asc');

	return $collection;
     }
}
