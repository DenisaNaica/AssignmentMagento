<?php
namespace Mageplaza\Vendor\Controller\Index;

class Vendor extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    protected $_vendorFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Mageplaza\Vendor\Model\VendorFactory $vendorFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_vendorFactory = $vendorFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $vendor = $this->_vendorFactory->create();
        $collection = $vendor->getCollection();
        foreach($collection as $key => $vendorVal){
            //echo "<pre>";
            // print_r($vendorVal->getData());
            // echo "</pre>";
            echo "Detalii Vendor cu ID " . $key . "<br>";
            echo "<ul>
                      <li> Vendor Name: "  . $vendorVal->getName() . "</li>".
                    " <li> Vendor Status:" .  $vendorVal->getStatus() . "</li>".
                     "<li> Vendor Email:" .  $vendorVal->getEmail() . "</li>
                  </ul>" . "<br>";
        }
        exit();
        return $this->_pageFactory->create();
    }
}
