<?php

namespace Mageplaza\Vendor\Api\Data;

interface VendorInterface{

    const VENDOR_ID   = 'vendor_id';
    const NAME        = 'name';
    const EMAIL       = 'email';
    const STATUS      ='status';

    public function getId();
    public  function getName();
    public  function getEmail();
    public function getStatus();
    public function setId($id);
    public function setName($name);
    public function setEmail($email);
    public function setStatus($status);

}
