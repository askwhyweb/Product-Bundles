<?php


namespace OrviSoft\ProductBundles\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface BundlesRepositoryInterface
{

    /**
     * Save Bundles
     * @param \OrviSoft\ProductBundles\Api\Data\BundlesInterface $bundles
     * @return \OrviSoft\ProductBundles\Api\Data\BundlesInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \OrviSoft\ProductBundles\Api\Data\BundlesInterface $bundles
    );

    /**
     * Retrieve Bundles
     * @param string $bundlesId
     * @return \OrviSoft\ProductBundles\Api\Data\BundlesInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($bundlesId);

    /**
     * Retrieve Bundles matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \OrviSoft\ProductBundles\Api\Data\BundlesSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Bundles
     * @param \OrviSoft\ProductBundles\Api\Data\BundlesInterface $bundles
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \OrviSoft\ProductBundles\Api\Data\BundlesInterface $bundles
    );

    /**
     * Delete Bundles by ID
     * @param string $bundlesId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($bundlesId);
}
