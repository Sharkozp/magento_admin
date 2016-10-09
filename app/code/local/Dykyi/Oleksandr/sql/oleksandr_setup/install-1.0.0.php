<?php
$installer = $this;
$tableName = $installer->getTable("oleksandr/resource_table");
$installer->startSetup();
$table = $installer->getConnection()
                   ->newTable($tableName)
                   ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, NULL, array(
	                   'identity' => true,
	                   'nullable' => false,
	                   'primary' => true
                   ))
                   ->addColumn('key', Varien_Db_Ddl_Table::TYPE_INTEGER, NULL, array(
	                   'nullable' => false
                   ))
                   ->addColumn('value', Varien_Db_Ddl_Table::TYPE_VARCHAR, NULL, array(
	                   'nullable' => false
                   ));
$installer->getConnection()->createTable($table);
$installer->endSetup();