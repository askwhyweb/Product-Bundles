<?php


namespace OrviSoft\ProductBundles\Api\Data;

interface BundlesInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const IDENTIFIER = 'Identifier';
    const PRODUCTS = 'Products';
    const BUNDLES_ID = 'bundles_id';
    const LABEL = 'Label';

    /**
     * Get bundles_id
     * @return string|null
     */
    public function getBundlesId();

    /**
     * Set bundles_id
     * @param string $bundlesId
     * @return \OrviSoft\ProductBundles\Api\Data\BundlesInterface
     */
    public function setBundlesId($bundlesId);

    /**
     * Get Identifier
     * @return string|null
     */
    public function getIdentifier();

    /**
     * Set Identifier
     * @param string $identifier
     * @return \OrviSoft\ProductBundles\Api\Data\BundlesInterface
     */
    public function setIdentifier($identifier);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \OrviSoft\ProductBundles\Api\Data\BundlesExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \OrviSoft\ProductBundles\Api\Data\BundlesExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \OrviSoft\ProductBundles\Api\Data\BundlesExtensionInterface $extensionAttributes
    );

    /**
     * Get Label
     * @return string|null
     */
    public function getLabel();

    /**
     * Set Label
     * @param string $label
     * @return \OrviSoft\ProductBundles\Api\Data\BundlesInterface
     */
    public function setLabel($label);

    /**
     * Get Products
     * @return string|null
     */
    public function getProducts();

    /**
     * Set Products
     * @param string $products
     * @return \OrviSoft\ProductBundles\Api\Data\BundlesInterface
     */
    public function setProducts($products);
}
