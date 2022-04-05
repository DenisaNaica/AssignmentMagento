<?php

namespace Mageplaza\Vendor\Api\Data;

interface VendorInterface{

    const VENDOR_ID   = 'vendor_id';
    const NAME        = 'name';
    const EMAIL       = 'email';
    const STATUS      ='status';
    const PHONE       ='phone';
    const CITY        ='city';
    const POSTAL_CODE ='postal_code';
    const CONTACT_NAME = 'contact_name';
    const STREET       = 'street';
    const COUNTRY      = 'country';
    const REGION       = 'region';
    const CURRENCY     = 'currency';
    const CITY_S       ='city1';
    const POSTAL_CODE_S ='postal_code1';
    const CONTACT_NAME_S = 'contact_name1';
    const STREET_S      = 'street1';
    const COUNTRY_S      = 'country1';
    const REGION_S      = 'region1';
    const CURRENCY_S     = 'currency1';

    public function getId();
    public  function getName();
    public  function getEmail();
    public function getStatus();
    public function getPhone();
    public function getCity();
    public function getPostalCode();
    public function getContactName();
    public function getStreet();
    public function getCountry();
    public function getRegion();
    public function getCityS();
    public function getPostalCodeS();
    public function getContactNameS();
    public function getStreetS();
    public function getCountryS();
    public function getRegionS();
    public function getCurrency();
    public function setId($id);
    public function setName($name);
    public function setEmail($email);
    public function setStatus($status);
    public function setPhone($phone);
    public function setCity($city);
    public function setPostalCode($postalCode);
    public function setContactName($contactName);
    public function setStreet($street);
    public function setCountry($country);
    public function setRegion($region);
    public function setCurrency($currency);
    public function setCityS($city);
    public function setPostalCodeS($postalCode);
    public function setContactNameS($contactName);
    public function setStreetS($street);
    public function setCountryS($country);
    public function setRegionShipping($region);

}
