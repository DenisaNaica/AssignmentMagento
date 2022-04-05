<?php
namespace Mageplaza\Vendor\Controller\Adminhtml\Vendor;

use Magento\Backend\App\Action;

class Edit extends \Magento\Backend\App\Action {

    protected $coreRegistry;
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->coreRegistry = $registry;
        parent::__construct($context);
    }

    public function _initAction() {

        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Mageplaza_Vendor::mageplaza_vendor_vendor')
            ->addBreadcrumb(__('Vendors'), __('Vendors'))
            ->addBreadcrumb(__('Manage all Vendors'), __('Manage All Vendors'));
        return $resultPage;
    }
    public function execute()
    {
        // TODO: Implement execute() method.
        $id = $this->getRequest()->getParam('vendor_id');
        $model = $this ->_objectManager->create(\Mageplaza\Vendor\Model\Vendor::class);

        if ($id) {
            $model->load($id);
            if (!$model ->getId()) {
                $this->messageManager->addError(__('THis news no longer exists'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        $this->coreRegistry->register('mageplaza_vendor_vendor', $model);

        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $id ? __('Edit vendor') : __('Add Vendor'),
            $id ? __('Edit Vendor'): __('Add Vendor')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Vendors'));
        $resultPage->getConfig()->getTitle()
            ->prepend($model->getId() ? $model->getTitle(): __('Add vendor'));

        return $resultPage;
    }
}
