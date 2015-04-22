<?php
 
class Royal_MassActions_Adminhtml_MassActionsController extends Mage_Adminhtml_Controller_Action
{
  public function deleteOrdersAction()
    {
        $orderIds = $this->getRequest()->getPost('order_ids', array());
 	$countdeletedOrder = 0;
        foreach ($orderIds as $orderId) {
            $order = Mage::getModel('sales/order')->load($orderId);
		$invoices = $order->getInvoiceCollection();
		foreach ($invoices as $invoice){
		   $invoice->delete();
		}

		$creditnotes = $order->getCreditmemosCollection();
		foreach ($creditnotes as $creditnote){
		   $creditnote->delete();
		}

		$shipments = $order->getShipmentsCollection();
		foreach ($shipments as $shipment){
		   $shipment->delete();
		}
		$order->delete();
		$countdeletedOrder++;

        }
	if ($countdeletedOrder) {
            $this->_getSession()->addSuccess($this->__('%s order(s) have been deleted.', $countdeletedOrder));
        }
        $this->_redirect('adminhtml/sales_order/');
    }
}
