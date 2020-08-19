<?php
/**
* Copyright © 2016 Magento. All rights reserved.
* See COPYING.txt for license details.
*/

namespace AHT\Lession8\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
    * {@inheritdoc}
    * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
    */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
          /**
          * Create table 'greeting_message'
          */
          $table = $setup->getConnection()
              ->newTable($setup->getTable('AHT_Lession8'))
              ->addColumn(
                  'id',
                  \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                  null,
                  ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                  'Greeting ID'
              )
              ->addColumn(
                  'name',
                  \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                  255,
                  ['nullable' => false, 'default' => ''],
                    'name'
              );
          $setup->getConnection()->createTable($table);
      }
}
