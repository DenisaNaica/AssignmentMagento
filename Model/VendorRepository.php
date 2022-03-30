<?php
namespace Mageplaza\Vendor\Model;

use Mageplaza\Vendor\Api\Data;
use Mageplaza\Vendor\Api\VendorRepositoryInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataOBjectProcessor;
use Mageplaza\Vendor\Model\ResourceModel\Vendor as ResourceVendor;
use Mageplaza\Vendol\Model\ResourceModel\Vendor\ColectionFactory as VendorCollectionFactory;
use Magento\Store\Model\StoreManagerInterface;

class VendorRepository implements VendorRepositoryInterface{

    protected $resource;
    protected $vendorFactory;
    protected $dataObjectHelper;
    protected $dataObjectProcessor;
    protected $dataVendorFactory;
    protected $storeManager;

    public function __construct(
        ResourceVendor $resource,
        VendorFactory $vendorFactory,
        Data\VendorInterfaceFactory $dataVendorFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager
    ){
        $this->resource = $resource;
        $this->vendorFactory = $vendorFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataVendorFactory = $dataVendorFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;

    }

    public function save(\Mageplaza\Vendor\Api\Data\VendorInterface $vendors)
    {
        // TODO: Implement save() method.

        if ( $vendors->getStoreId() === null){
            $storeId = $this->storeManager->getStore()->getId();
            $vendors->setStoreId($storeId);
        }
        try{
            $this->resource->save($vendors);
        }catch(\Exception $exception){
            throw new CouldNotSaveException(__('Could not save the vendors: %1', $exception->getMessage()), $exception);
        }
        return $vendors;

    }

    public function getById($vendorId)
    {
        // TODO: Implement getById() method.
        $vendors = $this->vendorFactory->create();
        $vendors->load($vendorId);
        if (!$vendors->getId()) {
            throw new NoSuchEntityException(__('Vendors with id "%1" does not exist.', $vendorId));
        }
        return $vendors;
    }

    public function delete(\Mageplaza\Vendor\Api\Data\VendorInterface $vendors)
    {
        // TODO: Implement delete() method.
        try {
            $this->resource->delete($vendors);
        }catch(\Exception $exception) {
            throw new CouldNotDeleteException(__('Could not delete the vendor: %1', $exception->getMessage()));
        }
        return true;
    }

    public function deleteById($vendorId)
    {
        // TODO: Implement deleteById() method.
        return $this->delete($this->getById($vendorId));
    }
}
