<?php
namespace Mageplaza\Vendor\Model\Vendor\Source;

use Magento\FRamework\Data\OptionSourceInterface;

class Status implements OptionSourceInterface{

    protected $vendor;
    public function __construct(\Mageplaza\Vendor\Model\Vendor $vendor)
    {
        $this->vendor = $vendor;
    }
    public function toOptionArray()
    {
        // TODO: Implement toOptionArray() method.
        $availableOptions = $this->vendor->getAvailableStatuses();
        $options = [];
        foreach($availableOptions as $key => $value){
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}
