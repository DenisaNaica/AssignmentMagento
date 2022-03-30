<?php

namespace Mageplaza\Vendor\Block\Adminhtml\Vendor\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class ResetButton implements ButtonProviderInterface {

    public function getButtonData()
    {
        // TODO: Implement getButtonData() method.
        return [
            'label' => __('Reset'),
            'class' => 'reset',
            'on_click' => 'location.reload();',
            'sort_order' => 30
        ];
    }
}
