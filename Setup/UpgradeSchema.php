<?php

namespace Mageplaza\Vendor\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface{

    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        // TODO: Implement upgrade() method.

        $installer = $setup;
        $installer->startSetup();
        if (version_compare($context->getVersion(), '1.0.1', '<')) {

            if (!$installer->tableExists('vendor')) {
                $table = $installer->getConnection()->newTable(
                    $installer->getTable('vendor')
                )
                    ->addColumn(
                        'vendor_id',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        null,
                        [
                            'identity' => true,
                            'nullable' => false,
                            'primary' => true,
                            'unsigned' => true,
                        ],
                        'ID'
                    )
                    ->addColumn(
                        'name',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        ['nullable => false'],
                        'Name'
                    )
                    ->addColumn(
                        'status',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        '64k',
                        [],
                        'Status'
                    )
                    ->addColumn(
                        'email',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        [],
                        'Email'
                    )
                    ->setComment('Vendor Table');
                $installer->getConnection()->createTable($table);

                $installer->getConnection()->addIndex(
                    $installer->getTable('vendor'),
                    $setup->getIdxName(
                        $installer->getTable('vendor'),
                        ['name', 'email', 'status'],
                        \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                    ),
                    ['name', 'email', 'status'],
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                );
            }
            $installer->endSEtup();

        }
    }
}
