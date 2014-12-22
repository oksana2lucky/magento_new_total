<?php
class My_NewTotal_Model_Order_Creditmemo_Total_Service extends Mage_Sales_Model_Order_Creditmemo_Total_Abstract
{
    public function collect(Mage_Sales_Model_Order_Creditmemo $creditmemo)
    {
        $totalService = $creditmemo->getOrder()->getServiceTotal() != null ? $creditmemo->getOrder()->getServiceTotal() : 0;
        $baseTotalService = $creditmemo->getOrder()->getBaseServiceTotal() != null ? $creditmemo->getOrder()->getBaseServiceTotal() : 0;
        if ($totalService) {
            $creditmemo->setGrandTotal($creditmemo->getGrandTotal() + $totalService);
            $creditmemo->setBaseGrandTotal($creditmemo->getBaseGrandTotal() + $baseTotalService);
        }

        return $this;
    }
}