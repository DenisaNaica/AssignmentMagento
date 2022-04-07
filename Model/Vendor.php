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

    public function getPhone()
    {
        // TODO: Implement getPhone() method.
        return parent::getData(self::PHONE);
    }

    public function setPhone($phone)
    {
        // TODO: Implement setPhone() method.
        return $this->setData(self::PHONE, $phone);
    }

    public function getCity()
    {
        // TODO: Implement getCity() method.
        return parent::getData(self::CITY);
    }

    public function getPostalCode()
    {
        // TODO: Implement getPostalCode() method.
        return parent::getData(self::POSTAL_CODE);
    }

    public function getContactName()
    {
        // TODO: Implement getContactName() method.
        return parent::getData(self::CONTACT_NAME);
    }

    public function getStreet()
    {
        // TODO: Implement getStreet() method.
        return parent::getData(self::STREET);
    }

    public function setCity($city)
    {
        // TODO: Implement setCity() method.
        return $this->setData(self::CITY, $city);
    }

    public function setPostalCode($postalCode)
    {
        // TODO: Implement setPostalCode() method.
        return $this->setData(self::POSTAL_CODE, $postalCode);
    }

    public function setContactName($contactName)
    {
        // TODO: Implement setContactName() method
        return $this->setData(self::CONTACT_NAME, $contactName);
    }

    public function setStreet($street)
    {
        // TODO: Implement setStreet() method.
        return $this->setData(self::STREET, $street);
    }

    public function getCountry()
    {
        // TODO: Implement getCountry() method.
        return parent::getData(self::COUNTRY);
    }

    public function getRegion()
    {
        // TODO: Implement getRegion() method.
        return parent::getData(self::REGION);
    }

    public function setCountry($country)
    {
        // TODO: Implement setCountry() method.
        return $this->setData(self::COUNTRY, $country);
    }

    public function setRegion($region)
    {
        // TODO: Implement setRegion() method.
        return $this->setData(self::REGION, $region);
    }

    public function getCurrency()
    {
        // TODO: Implement getCurrency() method.
        return parent::getData(self::CURRENCY);
    }

    public function setCurrency($currency)
    {
        // TODO: Implement setCurrency() method.
        return $this->setData(self::CURRENCY, $currency);
    }

    public function getCityS()
    {
        // TODO: Implement getCityS() method.
        return parent::getData(self::CITY_S);
    }

    public function getPostalCodeS()
    {
        // TODO: Implement getPostalCodeS() method.
        return parent::getData(self::POSTAL_CODE_S);
    }

    public function getContactNameS()
    {
        // TODO: Implement getContactNameS() method.
        return parent::getData(self::CONTACT_NAME_S);
    }

    public function getStreetS()
    {
        // TODO: Implement getStreetS() method.
        return parent::getData(self::STREET_S);
    }

    public function getCountryS()
    {
        // TODO: Implement getCountryS() method.
        return parent::getData(self::COUNTRY_S);
    }

    public function getRegionS()
    {
        // TODO: Implement getRegionS() method.
        return parent::getData(self::REGION_S);
    }

    public function setCityS($city)
    {
        // TODO: Implement setCityS() method.
        return $this->setData(self::CITY_S, $city);
    }

    public function setPostalCodeS($postalCode)
    {
        // TODO: Implement setPostalCodeS() method.
        return $this->setData(self::POSTAL_CODE_S, $postalCode);
    }

    public function setContactNameS($contactName)
    {
        // TODO: Implement setContactNameS() method.
        return $this->setData(self::CONTACT_NAME_S, $contactName);
    }

    public function setStreetS($street)
    {
        // TODO: Implement setStreetS() method.
        return $this->setData(self::STREET_S, $street);
    }

    public function setCountryS($country)
    {
        // TODO: Implement setCountryS() method.
        return $this->setData(self::COUNTRY_S, $country);
    }

    public function setRegionShipping($region)
    {
        // TODO: Implement setRegionShipping() method.
        return $this->setData(self::REGION_S, $region);
    }

    public function getEmailOrder()
    {
        // TODO: Implement getEmailOrder() method.
        return parent::getData(self::EMAIL_ORDER);

    }

    public function setEmailOrder($email_order)
    {
        // TODO: Implement setEmailOrder() method.
        return $this->setData(self::EMAIL_ORDER, $email_order);
    }
}
