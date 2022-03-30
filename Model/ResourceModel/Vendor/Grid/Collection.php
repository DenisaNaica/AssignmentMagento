<?php
namespace Mageplaza\Vendor\Model\ResourceModel\Vendor\Grid;

use Magento\Framework\Api\Search\SearchResultInterface;
use Magento\Framework\Api\Search\AggregationInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Mageplaza\Vendor\Model\ResourceModel\Vendor\Collection as VendorCollection;

class Collection extends VendorCollection implements SearchResultInterface{

    /**
     * @var AggregationInterface
     */

    protected $aggregations;

    /**
     * @param \Magento\Framework\Data\Collection\EntityFactoryInterface $entityFactory
     * @param \Psr\Log\LoggerInterface $logger
     * @param \Magento\Framework\Data\Collection\Db\FetchStrategyInterface $fetchStrategy
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Framework\EntityManager\MetadataPool $metadatPool;
     * @param mixed|null $mainTable
     * @param string $eventPrefix
     * @param mixed $eventObject
     * @param mixed $resourceModel
     * @param string $model
     * @param null $connection
     * @param \Magento\Framework\Model\ResourceModel\Db\AbstractDb|null $resource
     *
     * @SuppressWarnings (PHPMD.ExcessiveParameterList)
     */

    public function __construct(
        \Magento\Framework\Data\Collection\EntityFactoryInterface $entityFactory,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\Data\Collection\Db\FetchStrategyInterface $fetchStrategy,
        \Magento\Framework\Event\ManagerInterface $eventManager,
        $mainTable,
        $eventPrefix,
        $eventObject,
        $resourceModel,
        $model = \Magento\Framework\View\Element\UiComponent\DataProvider\Document::class,
        \Magento\Framework\DB\Adapter\AdapterInterface $connection = null,
        \Magento\Framework\Model\ResourceModel\Db\AbstractDb $resource = null){

        parent::__construct(
            $entityFactory,
            $logger,
            $fetchStrategy,
            $eventManager,
            $connection,
            $resource
        );
        $this->_eventPrefix=$eventPrefix;
        $this->_eventObject=$eventObject;
        $this->_init($model,$resource);
        $this->setMainTable($mainTable);
    }


    /**
     * @return AggregationInterface
     */
    public function getAggregations()
    {
        // TODO: Implement getAggregations() method.
        return $this->aggregations;
    }

    /**
     * @param AggregationInterface $aggregations
     * @return $this
     */
    public function setAggregations($aggregations)
    {
        // TODO: Implement setAggregations() method.
        $this->aggregations = $aggregations;
    }

    /**
     * Get search criteria
     * @return \Magento\Framework\Api\Search\SearchCriteriaInterface|null
     */

    public function getSearchCriteria()
    {
        // TODO: Implement getSearchCriteria() method.
        return null;
    }


    /**
     * @param \Magento\FRamework\Api\SearchCriteriaInterface $searchCriteria
     * @return $this
     * @SuppressWarnings(PHPMD.UnusedFormulaParameter)
     */
    public function setSearchCriteria(\Magento\FRamework\Api\SearchCriteriaInterface $searchCriteria = null)
    {
        // TODO: Implement setSearchCriteria() method.
        return $this;
    }


    /**
     * Get total count
     *
     * @return int
     */

    public function getTotalCount()
    {
        // TODO: Implement getTotalCount() method.
        return $this->getSize();
    }

    /**
     * Set total count
     * @param int $totalCount
     * @return $this
     * @SuppressWarnings(PHPMD.UnusedFormulaParameter)
     */

    public function setTotalCount($totalCount)
    {
        // TODO: Implement setTotalCount() method.
        return $this;
    }

    /**
     * @param \Magento\FRamework\Api\ExtensibleDataInterface[] $items
     * @return
     * $this
     * @SuppressWarnings(PHPMD.UnusedFormulaParameter)
     */
    public function setItems(array $items = null)
    {
        // TODO: Implement setItems() method.
        return $this;
    }



}

