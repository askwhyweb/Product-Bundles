<?php


namespace OrviSoft\ProductBundles\Model\ResourceModel;

class Bundles extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('orvisoft_productbundles_bundles', 'bundles_id');
    }
}
