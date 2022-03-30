<?php

namespace Mageplaza\Vendor\Controller\Adminhtml\Vendor;

class Delete extends \Magento\Backend\App\Action {

    public function execute() {

        $id = $this->getRequest()->getParam('vendor_id');
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            $title="";
            try {
                $model = $this->_objectManager->create(\Mageplaza\Vendor\Model\Vendor::class);
                $model->load($id);
                $title = $model->getTitle();
                $model->delete();

                $this->_eventManager->dispatch(
                    'adminhtml_mageplaza_vendor_on_delete',
                    ['title' => $title, 'status' => 'success']
                );
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->_eventManager->dispatch(
                    'adminhtml_mageplaza_vendor_on_delete',
                    ['title' => $title, 'status' => 'fail']
                );

                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['vendor_id' => $id]);
            }
        }
        $this->messageManager->addERror(__('We can\'t find a vendor to delete'));

        return $resultRedirect->setPath('*/*/');
    }
}
