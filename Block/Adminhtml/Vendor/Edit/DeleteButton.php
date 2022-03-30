<?php

namespace Mageplaza\Vendor\Block\Adminhtml\Vendor\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class DeleteButton extends GenericButton implements ButtonProviderInterface{

    public function getButtonData()
    {
        // TODO: Implement getButtonData() method.
        $data = [];
        if ( $this->getVendorId()){
            $data = [
                'label' => __("Delete Vendor"),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __("Are you sure you want to do this?")
                . '\',\'' . $this->getDeleteUrl() . '\') ' ,
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    public function getDeleteUrl(){
        return $this->getUrl('*/*/delete', ['vendor_id' => $this->getVendorId()]);
    }
}
