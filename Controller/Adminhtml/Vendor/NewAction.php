<?php
namespace Mageplaza\Vendor\Controller\Adminhtml\Vendor;


class NewAction extends \Magento\Backend\App\Action{


    /**
     * @var \Magento\Backend\Model\View\Result\Forward
     */

    protected $resultForwardFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
     */

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
    ) {
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }


    public function execute()
    {
        // TODO: Implement execute() method.
        /** @var \Magento\Backend\Model\View\Result\ForwardFactory $resultForward */
        $resultForward = $this->resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}
