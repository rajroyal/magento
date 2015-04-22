<?php
class Royal_Testimonials_Block_Adminhtml_Testimonials_Edit extends Mage_Adminhtml_Block_Widget_Form_Container{
   public function __construct()
   {
        parent::__construct();
        $this->_objectId = 'id';
        //vwe assign the same blockGroup as the Grid Container
        $this->_blockGroup = 'testimonials';
        //and the same controller
        $this->_controller = 'adminhtml_testimonials';
        //define the label for the save and delete button
        $this->_updateButton('save', 'label','Save Testimonial');
        $this->_updateButton('delete', 'label', 'Delete Testimonial');
    }
       /* Here, we're looking if we have transmitted a form object,
          to update the good text in the header of the page (edit or add) */
    public function getHeaderText()
    {
        if( Mage::registry('testimonials_data')&&Mage::registry('testimonials_data')->getId())
         {
              return $this->htmlEscape(
              Mage::registry('testimonials_data')->getTitle()).'<br />';
         }
         else
         {
             return 'Add a Testimonial';
         }
    }
}
