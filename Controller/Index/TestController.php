<?php
namespace Mageplaza\Vendor\Controller\Index;
use Magento\Framework\App\ResponseInterface;

class TestController extends \Magento\Framework\App\Action\Action{

    protected $_pageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        // TODO: Implement execute() method.
        echo "Controller Vendor Test" . "<br>";
    }
}
