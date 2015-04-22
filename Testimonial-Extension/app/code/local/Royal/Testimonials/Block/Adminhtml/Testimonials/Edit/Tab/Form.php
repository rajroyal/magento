<?php
class Royal_Testimonials_Block_Adminhtml_Testimonials_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
   protected function _prepareForm()
   {
	$form = new Varien_Data_Form();
	$categories = array();
        foreach(Mage::getModel('testimonials/categories')->getCollection() as $cat){
	    $categories[$cat->getData('id')] .= $cat->getData('name');            
        }  
       $this->setForm($form);
       $fieldset = $form->addFieldset('testimonials_form',
                                       array('legend'=>'Testimonial'));
        $fieldset->addField('name', 'text',
                       array(
                          'label' => 'Author Name',
                          'class' => 'required-entry',
                          'required' => true,
                           'name' => 'name',
                    ));
        $fieldset->addField('description', 'textarea',
                         array(
                          'label' => 'Description',
                          'class' => 'required-entry',
                          'required' => true,
                          'name' => 'description',
                      ));
        $fieldset->addField('image', 'image',
                         array(
                          'label' => 'Thumbnail',
                          'name' => 'image',
                      ));
	$fieldset->addField('category', 'select',
                         array(
                          'label' => 'Category',
                          'name' => 'category',
         		  'values' => $categories
                      ));

 if ( Mage::registry('testimonials_data') )
 {
    $form->setValues(Mage::registry('testimonials_data')->getData());
  }
  return parent::_prepareForm();
 }
}
