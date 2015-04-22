<?php
class Royal_Testimonials_Block_Adminhtml_Renderer_Category extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
       
        $value = $row->getData($this->getColumn()->getIndex());
	$output = Mage::getModel('testimonials/categories')->load($value)->getData('name');
	return $output;
    }

    public function getCategories(){
    	 $categories = array();
        foreach(Mage::getModel('testimonials/categories')->getCollection() as $cat){
	            $categories[$cat->getData('id')] .= $cat->getData('name');            
        }  
        return $categories;
    }
}
