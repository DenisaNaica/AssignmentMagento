<?php

namespace Mageplaza\Vendor\Block\Adminhtml\Vendor\Edit;

use Magento\Backend\Block\Widget\Context;
use Mageplaza\Vendor\Api\VendorRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class GenericButton{

    protected $context;
    protected $vendorRepository;

    public function __construct(
        Context $context,
        VendorRepositoryInterface $vendorRepository)
    {
        $this->context = $context;
        $this->vendorRepository = $vendorRepository;
    }

    public function getVendorId(){

        try{
            return $this->vendorRepository->getById($this->context->getRequest()->getParam('vendor_id')
            )->getId();
        }catch(NoSuchEntityException $e){

        }
        return null;
    }

    public function getUrl($route='', $params = []){
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
