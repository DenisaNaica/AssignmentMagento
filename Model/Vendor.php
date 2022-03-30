<?php

namespace Mageplaza\Vendor\Model;

use Magento\Framework\Model\AbstractModel;
use Mageplaza\Vendor\Api\Data\VendorInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Exception\LocalizedException;


class Vendor extends AbstractModel implements VendorInterface, IdentityInterface
{
    const CACHE_TAG = 'vendor';

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;



    protected $_cacheTag = self::CACHE_TAG;

    protected $_eventPrefix = 'vendor';


    protected function _construct()
    {
        $this->_init('Mageplaza\Vendor\Model\ResourceModel\Vendor');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }

    public function getAvailableStatuses(){
        return [
                self::STATUS_ENABLED => __('Enabled'),
                self::STATUS_DISABLED => __('Disabled')
        ];

    }

    function getId(){
        return parent::getData(self::VENDOR_ID);
    }

    function getName()
    {
        // TODO: Implement getName() method.
        return parent::getData(self::NAME);
    }

    function getEmail()
    {
        // TODO: Implement getEmail() method.
        return parent::getData(self::EMAIL);
    }

    function getStatus()
    {
        // TODO: Implement getStatus() method.
        return parent::getData(self::STATUS);
    }

    function setId($id){

        return $this->setData(self::VENDOR_ID, $id);
    }

    function setName($name)
    {
        // TODO: Implement setName() method.
        return $this->setData(self::NAME, $name);
    }

    function setEmail($email)
    {
        // TODO: Implement setEmail() method.
        return $this->setData(self::EMAIL, $email);
    }

    function setStatus($status)
    {
        // TODO: Implement setStatus() method.
        return $this->setData(self::STATUS, $status);
    }
}
