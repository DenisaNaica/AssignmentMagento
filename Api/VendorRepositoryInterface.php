<?php

namespace Mageplaza\Vendor\Api;
interface VendorRepositoryInterface
{

    public function save(\Mageplaza\Vendor\Api\Data\VendorInterface $vendors);

    public function getById($vendorId);

    public function delete(\Mageplaza\Vendor\Api\Data\VendorInterface $vendors);

    public function deleteById($vendorId);

}
