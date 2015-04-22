<?php
class Royal_Testimonials_Block_Adminhtml_Testimonials_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
   public function __construct()
   {
       parent::__construct();
       $this->setId('testimonialsGrid');
       $this->setDefaultSort('id_royal_testimonials');
       $this->setDefaultDir('DESC');
       $this->setSaveParametersInSession(true);
   }
   protected function _prepareCollection()
   {
      $collection = Mage::getModel('testimonials/testimonials')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
    }
   protected function _prepareColumns()
   {
      
      $categories = array();
      foreach(Mage::getModel('testimonials/categories')->getCollection() as $cat){
             $categories[$cat->getData('id')] .= $cat->getData('name');            
      }  
      $this->addColumn('id_royal_testimonials',
             array(
                    'header' => 'ID',
                    'align' =>'right',
                    'width' => '50px',
                    'index' => 'id_royal_testimonials',
               ));
      $this->addColumn('name',
               array(
                    'header' => 'Title',
                    'align' =>'left',
                    'index' => 'name',
              ));
      $this->addColumn('description', array(
                    'header' => 'Description',
                    'align' =>'left',
                    'index' => 'description',
             ));
     	$this->addColumn('category', array(
                        'header' => 'Category',
                        'align' =>'left',
                        'index' => 'category',
    		                'renderer' => 'Royal_Testimonials_Block_Adminhtml_Renderer_Category',
                        'type'      => 'options',
                        'options'   => Royal_Testimonials_Block_Adminhtml_Renderer_Category::getCategories(),
                      
                 ));
    	$this->addColumn('image', array(
                        'header' => 'Image',
                        'align' =>'left',
                        'index' => 'image',
    		               'renderer' => 'Royal_Testimonials_Block_Adminhtml_Renderer_Image',
                       'filter' =>false,
                 ));
    	
      return parent::_prepareColumns();
    }


protected function _prepareMassaction() {
    $this->setMassactionIdField('id_royal_testimonials');
    $this->getMassactionBlock()->setFormFieldName('id_royal_testimonials');
    $this->getMassactionBlock()->addItem('delete', array(
      'label'=> Mage::helper('testimonials')->__('Delete'),
      'url' => $this->getUrl('*/*/massDelete', array('' => '')), 
      'confirm' => Mage::helper('testimonials')->__('Are you sure?')
    ));
    return $this;
  }

    public function getRowUrl($row)
    {
         return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }


}
