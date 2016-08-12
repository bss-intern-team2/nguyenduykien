<?php
 
$installer = $this;
 
$installer->startSetup();
 
$table = $installer->getConnection()
    ->newTable($installer->getTable('deliverydate/deliverydate'))
    ->addColumn('deliverydate_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'Id')
    ->addColumn('title', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable'  => false,
        ), 'Title')
    ->addColumn('filename', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable'  => false,
        ), 'FileName');
	->addColumn('content', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
        ), 'Content');
	->addColumn('status', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'nullable'  => false,
        ), 'Status');	
	->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        ), 'Creation Time')
    ->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        ), 'Update Time')	
$installer->getConnection()->createTable($table);
 
$table = $installer->getConnection()
    ->newTable($installer->getTable('deliverydate/deliveryattribute'))
    ->addColumn('attributes_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'Id')
    ->addColumn('process_day', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable'  => false,
        ), 'Process Day');
	->addColumn('cut_off_hour', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable'  => false,
        ), 'Cut Off Hour');
	->addColumn('cut_off_minute', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable'  => false,
        ), 'Cut Off Minute');
	->addColumn('cut_off_period', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable'  => false,
        ), 'Cut Off Period');
	->addColumn('block_day_off', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable'  => false,
        ), 'Block Day Off');
	->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable'  => false,
        ), 'Creation Time');	
$installer->getConnection()->createTable($table);

$table = $installer->getConnection()
    ->newTable($installer->getTable('deliverydate/deliverydateoffs'))
    ->addColumn('dateoffs_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'Id')
    ->addColumn('date', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable'  => false,
        ), 'Date');
	->addColumn('comment', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
        ), 'Comment');
	->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable'  => false,
        ), 'Creation Time');	
$installer->getConnection()->createTable($table);

$table = $installer->getConnection()
    ->newTable($installer->getTable('deliverydate/deliveryperiods'))
    ->addColumn('periods_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'Id')
    ->addColumn('from_time', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable'  => false,
        ), 'From Time');
	->addColumn('to_time', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable'  => false,
        ), 'To Time');
	->addColumn('note', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
        ), 'Note');	
	->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable'  => false,
        ), 'Creation Time');	
$installer->getConnection()->createTable($table);
 
$installer->endSetup();