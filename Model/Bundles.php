<?php


namespace OrviSoft\ProductBundles\Model;

use OrviSoft\ProductBundles\Api\Data\BundlesInterfaceFactory;
use OrviSoft\ProductBundles\Api\Data\BundlesInterface;
use Magento\Framework\Api\DataObjectHelper;

class Bundles extends \Magento\Framework\Model\AbstractModel
{

    protected $dataObjectHelper;

    protected $bundlesDataFactory;

    protected $_eventPrefix = 'orvisoft_productbundles_bundles';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param BundlesInterfaceFactory $bundlesDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \OrviSoft\ProductBundles\Model\ResourceModel\Bundles $resource
     * @param \OrviSoft\ProductBundles\Model\ResourceModel\Bundles\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        BundlesInterfaceFactory $bundlesDataFactory,
        DataObjectHelper $dataObjectHelper,
        \OrviSoft\ProductBundles\Model\ResourceModel\Bundles $resource,
        \OrviSoft\ProductBundles\Model\ResourceModel\Bundles\Collection $resourceCollection,
        array $data = []
    ) {
        $this->bundlesDataFactory = $bundlesDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve bundles model with bundles data
     * @return BundlesInterface
     */
    public function getDataModel()
    {
        $bundlesData = $this->getData();
        
        $bundlesDataObject = $this->bundlesDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $bundlesDataObject,
            $bundlesData,
            BundlesInterface::class
        );
        
        return $bundlesDataObject;
    }
}
