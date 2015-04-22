 <?php
  class Royal_Testimonials_Block_Adminhtml_Categories_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
  {
     public function __construct()
     {
          parent::__construct();
          $this->setId('testimonials_tabs');
          $this->setDestElementId('edit_form');
          $this->setTitle('Testimonials Category');
      }
      protected function _beforeToHtml()
      {
          $this->addTab('form_section', array(
                   'label' => 'Category Information',
                   'title' => 'Category Information',
                   'content' => $this->getLayout()->createBlock('testimonials/adminhtml_categories_edit_tab_form')->toHtml()
         ));
         return parent::_beforeToHtml();
    }
}
