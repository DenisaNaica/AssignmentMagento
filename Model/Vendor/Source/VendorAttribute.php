<?php
namespace Mageplaza\Vendor\Model\Vendor\Source;

class VendorAttribute extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    protected $_vendorFactory;

    public function __construct(
        \Mageplaza\Vendor\Model\VendorFactory $vendorFactory
    )
    {
        $this->_vendorFactory = $vendorFactory;

    }

    public function getAllOptions() {

        $vendor = $this->_vendorFactory->create();
        $collection = $vendor->getCollection();

        if ($this->_options === null) {

            $this->_options = [
                ['label' => __('--Select--'), 'value' => '']
            ];

            foreach ( $collection as $key => $value) {
                $this->_options[] =
                    ['label' => __($value->getId()), 'value' => $value->getId()];

            }

        }
        return $this->_options;
    }
}
