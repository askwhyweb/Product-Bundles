<?php


namespace OrviSoft\ProductBundles\Model;

use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Reflection\DataObjectProcessor;
use OrviSoft\ProductBundles\Api\Data\BundlesSearchResultsInterfaceFactory;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use OrviSoft\ProductBundles\Model\ResourceModel\Bundles\CollectionFactory as BundlesCollectionFactory;
use OrviSoft\ProductBundles\Api\BundlesRepositoryInterface;
use OrviSoft\ProductBundles\Api\Data\BundlesInterfaceFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use OrviSoft\ProductBundles\Model\ResourceModel\Bundles as ResourceBundles;

class BundlesRepository implements BundlesRepositoryInterface
{

    protected $dataObjectHelper;

    protected $bundlesCollectionFactory;

    private $storeManager;

    protected $dataBundlesFactory;

    protected $searchResultsFactory;

    protected $dataObjectProcessor;

    protected $extensionAttributesJoinProcessor;

    private $collectionProcessor;

    protected $extensibleDataObjectConverter;
    protected $resource;

    protected $bundlesFactory;


    /**
     * @param ResourceBundles $resource
     * @param BundlesFactory $bundlesFactory
     * @param BundlesInterfaceFactory $dataBundlesFactory
     * @param BundlesCollectionFactory $bundlesCollectionFactory
     * @param BundlesSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceBundles $resource,
        BundlesFactory $bundlesFactory,
        BundlesInterfaceFactory $dataBundlesFactory,
        BundlesCollectionFactory $bundlesCollectionFactory,
        BundlesSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->bundlesFactory = $bundlesFactory;
        $this->bundlesCollectionFactory = $bundlesCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataBundlesFactory = $dataBundlesFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \OrviSoft\ProductBundles\Api\Data\BundlesInterface $bundles
    ) {
        /* if (empty($bundles->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $bundles->setStoreId($storeId);
        } */
        
        $bundlesData = $this->extensibleDataObjectConverter->toNestedArray(
            $bundles,
            [],
            \OrviSoft\ProductBundles\Api\Data\BundlesInterface::class
        );
        
        $bundlesModel = $this->bundlesFactory->create()->setData($bundlesData);
        
        try {
            $this->resource->save($bundlesModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the bundles: %1',
                $exception->getMessage()
            ));
        }
        return $bundlesModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($bundlesId)
    {
        $bundles = $this->bundlesFactory->create();
        $this->resource->load($bundles, $bundlesId);
        if (!$bundles->getId()) {
            throw new NoSuchEntityException(__('Bundles with id "%1" does not exist.', $bundlesId));
        }
        return $bundles->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->bundlesCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \OrviSoft\ProductBundles\Api\Data\BundlesInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \OrviSoft\ProductBundles\Api\Data\BundlesInterface $bundles
    ) {
        try {
            $bundlesModel = $this->bundlesFactory->create();
            $this->resource->load($bundlesModel, $bundles->getBundlesId());
            $this->resource->delete($bundlesModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Bundles: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($bundlesId)
    {
        return $this->delete($this->get($bundlesId));
    }
}
