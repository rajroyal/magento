<?php
class Royal_Testimonials_Block_Adminhtml_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $mediaurl=Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA);
        $value = $row->getData($this->getColumn()->getIndex());
	if(!empty($value)){
       		 $out = '<img src="'.$mediaurl.$value.'"  style="height:100px;text-align:center;"/>';
	}else{
		$out = 'No Image';
	}
        return $out;
    }
}
