<?php
class Royal_Testimonials_Block_Adminhtml_Categories_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
   protected function _prepareForm()
   {
	$form = new Varien_Data_Form();
       $this->setForm($form);
       $fieldset = $form->addFieldset('testimonials_form',
                                       array('legend'=>'Testimonials Category'));
        $fieldset->addField('name', 'text',
                       array(
                          'label' => 'Name',
                          'class' => 'required-entry',
                          'required' => true,
                           'name' => 'name',
                    ));
      
 if ( Mage::registry('testimonials_data') )
 {
    $form->setValues(Mage::registry('testimonials_data')->getData());
  }
  return parent::_prepareForm();
 }
}
