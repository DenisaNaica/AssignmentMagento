<?php
namespace Mageplaza\Vendor\Model\Vendor;

use Magento\Framework\App\Request\DataPersistorInterface;
use Mageplaza\Vendor\Model\ResourceModel\Vendor\CollectionFactory;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider {

    /**
     * @var \Mageplaza\Vendor\Model\ResourceModel\Vendor\Collection
     */
    protected $collection;

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var array
     */
    protected $loadedData;

    /**
     * @param string name
     * @param string primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $vendorCollectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param array $meta
     * @param array $data
     */

    public function __construct (
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $vendorCollectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $vendorCollectionFactory ->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);

        $this->meta = $this -> prepareMeta($this->meta);
    }

    /**
     * Prepares Meta
     *
     * @param array $meta
     * @return array
     */
    public function prepareMeta(array $meta) {
        return $meta;
    }

    /**
     * Get data
     *
     * @return array
     */

    public function getData(){

        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        /** @var $vendors \Mageplaza\Vendor\Model\Vendor */


        foreach ( $items as $vendors) {
            $this->loadedData[$vendors->getId()] = $vendors->getData();
        }

        $data = $this->dataPersistor->get('mageplaza_vendor_vendor');



        if ( !empty($data)) {
            $vendors = $this -> collection->getNewEmptyItem();
            $vendors ->setData($data);
            $this->loadedData[$vendors->getId()]= $vendors->getData();
            $this->dataPersistor->clear('mageplaza_vendor_vendor');

        }
        return $this->loadedData;
    }
}
