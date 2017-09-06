<?php

/**
 * Class My_NewTotal_Model_Order_Invoice_Total_Service
 */
class My_NewTotal_Model_Order_Invoice_Total_Service extends Mage_Sales_Model_Order_Invoice_Total_Abstract
{
    /**
     * Collect invoice totals
     *
     * @param Mage_Sales_Model_Order_Invoice $invoice
     * @return $this
     */
    public function collect(Mage_Sales_Model_Order_Invoice $invoice)
    {
        $totalService = $invoice->getOrder()->getServiceTotal() != null ? $invoice->getOrder()->getServiceTotal() : 0;
        $baseTotalService = $invoice->getOrder()->getBaseServiceTotal() != null ? $invoice->getOrder()->getBaseServiceTotal() : 0;
        if ($totalService) {
            $invoice->setGrandTotal($invoice->getGrandTotal() + $totalService);
            $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $baseTotalService);
        }

        return $this;
    }
}