<?php
$installer = $this;

$installer->getConnection()
    ->addColumn($installer->getTable('sales/quote'),
        'base_service_total',
        array(
            'type' => Varien_Db_Ddl_Table::TYPE_DECIMAL,
            'length' => '12,4',
            'nullable'  => true,
            'comment' => 'Base Service Total',
        )
    );

$installer->getConnection()
    ->addColumn($installer->getTable('sales/quote'),
        'service_total',
        array(
            'type' => Varien_Db_Ddl_Table::TYPE_DECIMAL,
            'length' => '12,4',
            'nullable'  => true,
            'comment' => 'Service Total',
        )
    );

$installer->getConnection()
    ->addColumn($installer->getTable('sales/order'),
        'base_service_total',
        array(
            'type' => Varien_Db_Ddl_Table::TYPE_DECIMAL,
            'length' => '12,4',
            'nullable'  => true,
            'comment' => 'Base Service Total',
        )
    );

$installer->getConnection()
    ->addColumn($installer->getTable('sales/order'),
        'service_total',
        array(
            'type' => Varien_Db_Ddl_Table::TYPE_DECIMAL,
            'length' => '12,4',
            'nullable'  => true,
            'comment' => 'Service Total',
        )
    );