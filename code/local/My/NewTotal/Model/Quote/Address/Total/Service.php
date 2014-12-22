<?php
class My_NewTotal_Model_Quote_Address_Total_Service extends Mage_Sales_Model_Quote_Address_Total_Abstract
{
    public function __construct()
    {
        $this->setCode('service');
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return Mage::helper('core')->__('Service TTC');
    }

    /**
     * Collect totals information about insurance
     *
     * @param   Mage_Sales_Model_Quote_Address $address
     */
    public function collect(Mage_Sales_Model_Quote_Address $address)
    {
        parent::collect($address);
        $amount = 0;

        if (($address->getAddressType() == 'billing')) {
            return $this;
        }

        $quote = $address->getQuote();
        if ($quote->hasWrapping()) {
            foreach ($quote->getAllItems() as $item) {
                if ($item->getProduct()->getSku() == 'wrapping') {
                    $amount = $item->getRowTotal();
                    break;
                }
            }
        }

        if ($amount) {
            $this->_addAmount($amount);
            $this->_addBaseAmount($amount);
        }

        return $this;
    }

    /**
     * Add giftcard totals information to address object
     *
     * @param   Mage_Sales_Model_Quote_Address $address
     */
    public function fetch(Mage_Sales_Model_Quote_Address $address)
    {
        if (($address->getAddressType() == 'shipping')) {
            $amount = $address->getServiceAmount();
            if ($amount) {
                $address->addTotal(array(
                    'code'  => $this->getCode(),
                    'title' => $this->getLabel(),
                    'value' => $amount
                ));
            }
        }

        return $this;
    }
}