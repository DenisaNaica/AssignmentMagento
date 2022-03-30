<?php

namespace Mageplaza\Vendor\Controller\Adminhtml\Vendor;

use Magento\Backend\App\Action\Context;
use Mageplaza\Vendor\Api\VendorRepositoryInterface as VendorRepository;
use Magento\Framework\Controller\Result\JsonFactory;
use Mageplaza\Vendor\Api\Data\VendorInterface;

class InlineEdit extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $jsonFactory;

    protected $vendorRepository;

    public function __construct(
        Context $context,
        VendorRepository $vendorRepository,
        JsonFactory $jsonFactory
    )
    {
        parent::__construct($context);
        $this->vendorRepository = $vendorRepository;
        $this->jsonFactory = $jsonFactory;

    }

    /**
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /**
         * @var \Magento\Framework\Controller\Result\Json $resultJson
         */
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];

        $postItems = $this->getRequest()->getParam('items', []);
        if (!($this->getRequest()->getParam('isAjax') && count($postItems))) {

                return $resultJson->setData([
                    'messages' => [__('Please correct the data sent ')],
                    'error' => true,
                ]);
            }
        foreach (array_keys($postItems) as $vendorId) {

            $vendor = $this->vendorRepository->getById($vendorId);
            try {
                $vendorData = $postItems[$vendorId];
                $extendedVendorData = $vendor->getData();
                $this->setVendorData($vendor, $extendedVendorData, $vendorData);
                $this->vendorRepository->save($vendor);
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $messages[] = $this->getErrorWithVendorId($vendor, $e->getMessage());
                $error = true;
            } catch (\RuntimeException $e) {
                $messages[] = $this->getErrorWithVendorId($vendor, $e->getMessage());
                $error = true;
            } catch (\Exception $e) {
                $messages[] = $this->getErrorWithVendorId($vendor, __('Something went wrong while saving the vendor'));
                $error = true;
            }
        }

        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }

    protected function getErrorWithVendorId(VendorInterface $vendor, $errorText) {
        return '[Vendor ID: ' . $vendor->getId() . ']' . $errorText;
    }

    public function setVendorData(\Mageplaza\Vendor\Model\Vendor $vendor, array $extendedVendorData, array $vendorData) {
        $vendor->setData(array_merge($vendor->getData(), $extendedVendorData, $vendorData));
        return $this;
    }
}
