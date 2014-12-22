<?php
$installer = $this;

$installer->startSetup();

$installer->getConnection()
    ->addColumn($installer->getTable('sales/quote_address'),
        'base_service_amount',
        array(
            'type' => Varien_Db_Ddl_Table::TYPE_DECIMAL,
            'length' => '12,4',
            'nullable'  => true,
            'comment' => 'Base Service Amount',
        )
    );

$installer->getConnection()
    ->addColumn($installer->getTable('sales/quote_address'),
        'service_amount',
        array(
            'type' => Varien_Db_Ddl_Table::TYPE_DECIMAL,
            'length' => '12,4',
            'nullable'  => true,
            'comment' => 'Base Service Amount',
        )
    );

$installer->endSetup();