<?php

namespace Mageplaza\Vendor\Controller\Adminhtml\Vendor;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Mageplaza\Vendor\Model\ResourceModel\Vendor\CollectionFactory;

class MassDelete extends \Magento\Backend\App\Action {

    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     */

    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Backend\Model\Vew\\Resut\Redirect
     * @throws \Magento\Framework\Exception\LocalizedException|\Exception
     */
    public function execute()
    {
        // TODO: Implement execute() method.
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $collectionSize = $collection->getSize();

        foreach ($collection as $vendor) {
            $vendor->delete();
        }

        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted. ', $collectionSize));

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect  */
        $resultRedirect = $this->resultFactory->create(REsultFactory::TYPE_REDIRECT);

        return $resultRedirect->setPath('*/*/');
    }
}
