<?php
class Royal_Testimonials_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action
{
    protected function _initAction()
    {
        $this->loadLayout()->_setActiveMenu('testimonials/index')
                ->_addBreadcrumb('testimonials Manager','testimonials Manager');
       return $this;
     }
      public function indexAction()
      {
         $this->_initAction();
         $this->renderLayout();
      }
      public function editAction()
      {
           $testId = $this->getRequest()->getParam('id');
           $testModel = Mage::getModel('testimonials/testimonials')->load($testId);
           if ($testModel->getId() || $testId == 0)
           {
             Mage::register('testimonials_data', $testModel);
             $this->loadLayout();
             $this->_setActiveMenu('testimonials/set_time');
             $this->_addBreadcrumb('testimonials Manager', 'testimonials Manager');
             $this->_addBreadcrumb('Testimonials Description', 'Testimonials Description');
             $this->getLayout()->getBlock('head')
                  ->setCanLoadExtJs(true);
             $this->_addContent($this->getLayout()
                  ->createBlock('testimonials/adminhtml_testimonials_edit'))
                  ->_addLeft($this->getLayout()
                  ->createBlock('testimonials/adminhtml_testimonials_edit_tabs')
              );
             $this->renderLayout();
           }
           else
           {
                 Mage::getSingleton('adminhtml/session')
                       ->addError('testimonials does not exist');
                 $this->_redirect('*/*/');
            }
       }
       public function newAction()
       {
          $this->_forward('edit');
       }
       public function saveAction()
       {
         if ($this->getRequest()->getPost())
         {
           try {		
              $postData = $this->getRequest()->getPost();
          		if($_FILES['image']['name']){
            			$uploader = new Varien_File_Uploader('image');
            		  $uploader->setAllowedExtensions(array('jpg','jpeg','gif','png')); // or pdf or anything
            			$uploader->setAllowRenameFiles(false);
            		 	$uploader->setFilesDispersion(false);
            		 	$path = Mage::getBaseDir('media').'/';
            		 	$uploader->save($path, $_FILES['image']['name']);
            			$postData['image'] = $_FILES['image']['name'];
          		}elseif(isset($postData['image']['delete'])){
                 $postData['image'] ='';
              }else{
                 unset($postData['image']);
              }

		//echo "<pre>"; print_r($postData); die();
                 $testModel = Mage::getModel('testimonials/testimonials');
               if( $this->getRequest()->getParam('id') <= 0 )
                  $testModel->setCreatedTime(
                     Mage::getSingleton('core/date')
                            ->gmtDate()
                    );
                  $testModel
                    ->addData($postData)
                    ->setUpdateTime(
                             Mage::getSingleton('core/date')
                             ->gmtDate())
                    ->setId($this->getRequest()->getParam('id'))
                    ->save();
                 Mage::getSingleton('adminhtml/session')
                               ->addSuccess('successfully saved');
                 Mage::getSingleton('adminhtml/session')
                                ->settestData(false);
                 $this->_redirect('*/*/');
                return;
          } catch (Exception $e){
                Mage::getSingleton('adminhtml/session')
                                  ->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')
                 ->settestData($this->getRequest()
                                    ->getPost()
                );
                $this->_redirect('*/*/edit',
                            array('id' => $this->getRequest()
                                                ->getParam('id')));
                return;
                }
              }
              $this->_redirect('*/*/');
            }
          public function deleteAction()
          {
              if($this->getRequest()->getParam('id') > 0)
              {
                try
                {
                    $testModel = Mage::getModel('testimonials/testimonials');
                    $testModel->setId($this->getRequest()
                                        ->getParam('id'))
                              ->delete();
                    Mage::getSingleton('adminhtml/session')
                               ->addSuccess('successfully deleted');
                    $this->_redirect('*/*/');
                 }
                 catch (Exception $e)
                  {
                           Mage::getSingleton('adminhtml/session')
                                ->addError($e->getMessage());
                           $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                  }
             }
            $this->_redirect('*/*/');
       }

       public function massDeleteAction(){
              $testIds = $this->getRequest()->getPost('id_royal_testimonials', array());
              $countdeletedtest = 0;
              foreach ($testIds as $testId) {
                    $testModel = Mage::getModel('testimonials/testimonials');
                    $testModel->setId($testId)
                              ->delete();
                     $countdeletedtest++;

                    }
              if ($countdeletedtest) {
                        $this->_getSession()->addSuccess($this->__('%s testimonial(s) have been deleted.', $countdeletedtest));
                    }
                    $this->_redirect('*/*/');              
       }


}
?>
