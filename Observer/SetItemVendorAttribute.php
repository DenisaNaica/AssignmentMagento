<?php
namespace Mageplaza\Vendor\Observer;

use Magento\Framework\Event\ObserverInterface;

class SetItemVendorAttribute implements ObserverInterface
{
    /**
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $quoteItem = $observer->getQuoteItem();
        $product = $observer->getProduct();
        $quoteItem->setVendorAttribute($product->getAttributeText('vendor_attribute'));
    }
}
