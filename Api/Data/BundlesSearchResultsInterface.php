<?php


namespace OrviSoft\ProductBundles\Api\Data;

interface BundlesSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Bundles list.
     * @return \OrviSoft\ProductBundles\Api\Data\BundlesInterface[]
     */
    public function getItems();

    /**
     * Set Identifier list.
     * @param \OrviSoft\ProductBundles\Api\Data\BundlesInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
