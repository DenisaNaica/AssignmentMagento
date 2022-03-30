<?php
namespace Mageplaza\Vendor\Block\Adminhtml\Vendor\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class BackButton extends GenericButton implements ButtonProviderInterface{

    public function getButtonData()
    {
        // TODO: Implement getButtonData() method.

        return [
            'label' => __('Back'),
            'on_click' => sprintf("location.href = '%s' ; ", $this->getBackUrl()),
            'class' => 'back',
            'sort_order' => 10
        ];
    }

    public function getBackUrl(){
        return $this->getUrl('*/*/');
    }
}
