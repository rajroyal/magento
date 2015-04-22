<?php
class Royal_MassActions_Model_Observer
{
    public function addMassAction($observer)
    {
        $block = $observer->getEvent()->getBlock();
        if(get_class($block) =='Mage_Adminhtml_Block_Widget_Grid_Massaction'
            && $block->getRequest()->getControllerName() == 'sales_order')
        {
            $block->addItem('royalmassactions', array(
                'label' => 'Delete Orders',
                'url' => Mage::app()->getStore()->getUrl('royalmassactions/adminhtml_massActions/deleteOrders')
            ));
        }
    }
}
