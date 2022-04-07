<?php

namespace Mageplaza\Vendor\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface{

    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {

        if (version_compare($context->getVersion(), '1.0.3') < 0) {
            $connection = $setup->getConnection();
            $connection->addColumn(
                $setup->getTable('vendor'),
                'phone',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'default' => '',
                    'comment' => 'Telephone'
                ]
            );
        }
        if (version_compare($context->getVersion(), '1.0.4') < 0) {
            $connection = $setup->getConnection();
            $connection->addColumn(
                $setup->getTable('vendor'),
                'city',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'default' => '',
                    'comment' => 'City'
                ]
            );
            $connection->addColumn(
                $setup->getTable('vendor'),
                'contact_name',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'default' => '',
                    'comment' => 'Contact Name'
                ]
            );
            $connection->addColumn(
                $setup->getTable('vendor'),
                'street',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'default' => '',
                    'comment' => 'Street'
                ]
            );
            $connection->addColumn(
                $setup->getTable('vendor'),
                'postal_code',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    'length' => 255,
                    'nullable' => true,
                    'comment' => 'Postal Code'
                ]
            );
        }
        if (version_compare($context->getVersion(), '1.0.5') < 0) {
            $connection = $setup->getConnection();
            $connection->addColumn(
                $setup->getTable('vendor'),
                'country',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'default' => '',
                    'comment' => 'Country'
                ]
            );
            $connection->addColumn(
                $setup->getTable('vendor'),
                'region',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'default' => '',
                    'comment' => 'Region'
                ]
            );

        }
        if (version_compare($context->getVersion(), '1.0.6') < 0) {
            $connection = $setup->getConnection();
            $connection->addColumn(
                $setup->getTable('vendor'),
                'currency',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'default' => '',
                    'comment' => 'Currency'
                ]
            );

        }
        if (version_compare($context->getVersion(), '1.0.8') < 0) {
            $connection = $setup->getConnection();
            $connection->addColumn(
                $setup->getTable('vendor'),
                'region1',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'default' => '',
                    'comment' => 'Region Shipping'
                ]
            );
            $connection->addColumn(
                $setup->getTable('vendor'),
                'country1',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'default' => '',
                    'comment' => 'Country Shipping'
                ]
            );
            $connection->addColumn(
                $setup->getTable('vendor'),
                'postal_code1',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    'length' => 255,
                    'nullable' => true,
                    'comment' => 'Postal Code Shipping'
                ]
            );
            $connection->addColumn(
                $setup->getTable('vendor'),
                'city1',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'default' => '',
                    'comment' => 'City Shipping'
                ]
            );
            $connection->addColumn(
                $setup->getTable('vendor'),
                'contact_name1',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'default' => '',
                    'comment' => 'Contact Name Shipping'
                ]
            );
            $connection->addColumn(
                $setup->getTable('vendor'),
                'street1',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'default' => '',
                    'comment' => 'Street Shipping'
                ]
            );

        }
        if (version_compare($context->getVersion(), '1.0.9') < 0) {
            $connection = $setup->getConnection();
            $connection->addColumn(
                $setup->getTable('vendor'),
                'email_order',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => true,
                    'default' => '',
                    'comment' => 'Email Order'
                ]
            );

        }
    }
}


