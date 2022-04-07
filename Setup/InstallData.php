<?php

namespace Mageplaza\Vendor\Setup;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Sales\Setup\SalesSetupFactory;
use Magento\Quote\Setup\QuoteSetupFactory;
use Magento\Framework\DB\Ddl\Table;

class InstallData implements InstallDataInterface
{

    private $quoteSetupFactory;
    private $salesSetupFactory;
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory,
                                QuoteSetupFactory $quoteSetupFactory,
                                SalesSetupFactory $salesSetupFactory
    )
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->quoteSetupFactory = $quoteSetupFactory;
        $this->salesSetupFactory = $salesSetupFactory;

    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $quoteSetup = $this->quoteSetupFactory->create(['setup' => $setup]);
        $salesSetup = $this->salesSetupFactory->create(['setup' => $setup]);

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'vendor_attribute',
            [
                'type' => 'int',
                'backend' => '',
                'frontend' => '',
                'label' => 'Vendor Atrribute',
                'input' => 'select',
                'class' => '',
                'source' => 'Mageplaza\Vendor\Model\Vendor\Source\VendorAttribute',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => true,
                'user_defined' => false,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => ''
            ]
        );
        $attributeSetId = $eavSetup->getDefaultAttributeSetId('catalog_product');
        $eavSetup->addAttributeToSet(
            'catalog_product',
            $attributeSetId,
            'General',
            'vendor_attribute'
        );

        $attributeOptions = [
            'type'     => Table::TYPE_TEXT,
            'visible'  => true,
            'required' => false
        ];
        $quoteSetup->addAttribute('quote_item', 'vendor_attribute', $attributeOptions);
        $salesSetup->addAttribute('order_item', 'vendor_attribute', $attributeOptions);
    }

}
