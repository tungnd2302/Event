<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AHT\Lession8\Setup;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Upgrade the Catalog module DB scheme
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '1.0.3', '<')) {
            $setup->getConnection()->addColumn(
                $setup->getTable('AHT_Lession8'),
                'price',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 10,
                    'nullable' => false,
                    'default' => '',
                    'comment' => 'Giá sản phẩm'
                ],
            );

            $setup->getConnection()->addColumn(
                $setup->getTable('AHT_Lession8'),
                'quantity',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 10,
                    'nullable' => false,
                    'default' => '',
                    'comment' => 'Số lượng'
                ],
            );


            $setup->getConnection()->addColumn(
                $setup->getTable('AHT_Lession8'),
                'time',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 10,
                    'nullable' => false,
                    'default' => '',
                    'comment' => 'Thời gian'
                ],
            );

          
        }

    
        $setup->endSetup();
    }
}
