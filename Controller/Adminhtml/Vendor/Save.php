<?php
namespace Mageplaza\Vendor\Controller\Adminhtml\Vendor;


use Magento\Framework\App\ResponseInterface;
use Mageplaza\Vendor\Model\Vendor;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
class Save extends \Magento\Backend\App\Action
{


    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var \Mageplaza\Vendor\Model\VendorFactory
     */
    private $vendorFactory;

    /**
     * @var \Mageplaza\Vendor\Api\VendorRepositoryInterface
     */
    private $vendorRepository;

    /**
     * @param Context $context
     * @param DataPersistorInterface $dataPersistor
     * @param \Mageplaza\Vendor\Model\VendorFactory $vendorFactory
     * @param \Mageplaza\Vendor\Api\VendorRepositoryInterface $vendorRepository
     */

    public function __construct(
        Context $context,
        DataPersistorInterface $dataPersistor,
        \Mageplaza\Vendor\Model\VendorFactory $vendorFactory = null,
        \Mageplaza\Vendor\Api\VendorRepositoryInterface $vendorRepository = null
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->vendorFactory = $vendorFactory
            ?: \Magento\Framework\App\ObjectManager::getInstance()->get(
            \Mageplaza\Vendor\Model\VendorFactory::class);
        $this->vendorRepository = $vendorRepository
            ?: \Magento\Framework\App\ObjectManager::getInstance()->get(
                \Mageplaza\Vendor\Api\VendorRepositoryInterface::class);
        parent::__construct($context);
    }

    /**
     * Save action
     * @SuperWarnings(PHPMD.CycloMaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        // TODO: Implement execute() method.
        $data = $this->getRequest()->getPostValue();

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            if (isset($data['status']) && $data['status'] === 'true') {
                $data['status'] = Vendor::STATUS_ENABLED;
            }
            if (empty($data['vendor_id'])) {
                $data['vendor_id'] = null;
            }

            /** @var \Mageplaza\Vendor\Model\Vendor $model */
            $model = $this->vendorFactory->create();

            $id = $this->getRequest()->getParam('vendor_id');
            if ($id) {
                try {
                    $model = $this->vendorRepository->getById($id);
                } catch (LocalizedException $e) {
                    $this->messageManager->addErrorMessage(__('This news no longer exists'));
                    return $resultRedirect->setPath('*/*/');

                }
            }
            $model->setData($data);

            $this->_eventManager->dispatch(
                'mageplaza_vendor_vendor_prepare_save',
                ['vendor' => $model, 'request' => $this->getRequest()]
            );

            try {
                $this->vendorRepository->save($model);
                $this->messageManager->addSuccessMessage(__("You saved the vendor"));
                $this->dataPersistor->clear('mageplaza_vendor_vendor');
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['vendor_id' => $model->getId(),
                        '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addExceptionMessage($e->getPrevious() ?: $e);
            } catch (\Exception $e){
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the vendor'));
            }

            $this->dataPersistor->set('mageplaza_vendor_vendor', $data);
            return $resultRedirect->setPath('*/*/edit', ['vendor_id' => $this ->getRequest()->getParam('vendor_id')]);
        }
        return $resultRedirect->setPath('/*/*/');
    }
}
