<?php
namespace Mageplaza\Vendor\Model;
class Vendor extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'vendor';

    protected $_cacheTag = 'vendor';

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
}
