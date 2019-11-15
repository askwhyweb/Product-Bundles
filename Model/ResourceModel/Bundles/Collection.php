<?php


namespace OrviSoft\ProductBundles\Model\ResourceModel\Bundles;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \OrviSoft\ProductBundles\Model\Bundles::class,
            \OrviSoft\ProductBundles\Model\ResourceModel\Bundles::class
        );
    }
}
