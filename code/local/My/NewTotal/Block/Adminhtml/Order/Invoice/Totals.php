<?php
class My_NewTotal_Block_Adminhtml_Order_Invoice_Totals extends Mage_Adminhtml_Block_Sales_Order_Invoice_Totals
{
    /**
     * Initialize order totals array
     *
     * @return Mage_Sales_Block_Order_Totals
     */
    protected function _initTotals()
    {
        parent::_initTotals();
        $totalService = $this->getOrder()->getServiceTotal() != null ? $this->getOrder()->getServiceTotal() : 0;
        $baseTotalService = $this->getOrder()->getBaseServiceTotal() != null ? $this->getOrder()->getBaseServiceTotal() : 0;
        if ($totalService) {
            $this->addTotalBefore(new Varien_Object(array(
                'code'      => 'service',
                'value'     => $totalService,
                'base_value'=> $baseTotalService,
                'label'     => $this->helper('core')->__('Service TTC'),
            ), array('shipping', 'tax')));
        }

        return $this;
    }

}