<?php

namespace Mageplaza\Vendor\Block\Adminhtml\Vendor\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton extends GenericButton implements ButtonProviderInterface {


    public function getButtonData()
    {
        // TODO: Implement getButtonData() method.
        return [
            'label' => __('Save Vendor'),
            'class' => 'save_primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}
