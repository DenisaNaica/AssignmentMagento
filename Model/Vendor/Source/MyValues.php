<?php
namespace Mageplaza\Vendor\Model\Vendor\Source;
class MyValues implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => '', 'label' => __('--Select Currency--')],
            ['value' => '1-KWD', 'label' => __('Kuwaiti Dinar')],
            ['value' => '2-BHD', 'label' => __('Bahraini Dinar')],
            ['value' => '3-OMR', 'label' => __('Omani Rial')],
            ['value' => '4-JOD', 'label' => __('Jordanian Dinar')],
            ['value' => '5-GPB', 'label' => __('British Pound Sterling')],
            ['value' => '6-KYD', 'label' => __('Cayman Islands Dollar')],
            ['value' => '7-EUR', 'label' => __('European Euro ')],
            ['value' => '8-CHF', 'label' => __('Swiss Franc ')],
            ['value' => '9-USD', 'label' => __('U.S. Dollar')],
            ['value' => '10-CAD', 'label' => __('Canadian Dollar')]

        ];
    }
}
