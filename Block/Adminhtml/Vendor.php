<?php

namespace Mageplaza\Vendor\Block\Adminhtml;

class Vendor extends \Magento\Backend\Block\Widget\Grid\Container{

    protected function __construct()
    {
        $this->_controller = "adminhtml_vendor";
        $this->_blockGroup = "Mageplaza_Vendor";
        $this->_headerText = __('Manage Vendor');

        parent::_construct();

        if($this->_isAllowedAction('Mageplaza_Vendor::save')){
            $this->buttonList->update('add', 'label', __('Add Vendors'));
        }
        else{
            $this->_buttonList->remove('add');

        }
    }

    protected function _isAllowedAction($resourceId){
        return $this->_authorization->isAllowed($resourceId);
    }
}
