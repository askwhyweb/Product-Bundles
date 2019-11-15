<?php


namespace OrviSoft\ProductBundles\Model\Data;

use OrviSoft\ProductBundles\Api\Data\BundlesInterface;

class Bundles extends \Magento\Framework\Api\AbstractExtensibleObject implements BundlesInterface
{

    /**
     * Get bundles_id
     * @return string|null
     */
    public function getBundlesId()
    {
        return $this->_get(self::BUNDLES_ID);
    }

    /**
     * Set bundles_id
     * @param string $bundlesId
     * @return \OrviSoft\ProductBundles\Api\Data\BundlesInterface
     */
    public function setBundlesId($bundlesId)
    {
        return $this->setData(self::BUNDLES_ID, $bundlesId);
    }

    /**
     * Get Identifier
     * @return string|null
     */
    public function getIdentifier()
    {
        return $this->_get(self::IDENTIFIER);
    }

    /**
     * Set Identifier
     * @param string $identifier
     * @return \OrviSoft\ProductBundles\Api\Data\BundlesInterface
     */
    public function setIdentifier($identifier)
    {
        return $this->setData(self::IDENTIFIER, $identifier);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \OrviSoft\ProductBundles\Api\Data\BundlesExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \OrviSoft\ProductBundles\Api\Data\BundlesExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \OrviSoft\ProductBundles\Api\Data\BundlesExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get Label
     * @return string|null
     */
    public function getLabel()
    {
        return $this->_get(self::LABEL);
    }

    /**
     * Set Label
     * @param string $label
     * @return \OrviSoft\ProductBundles\Api\Data\BundlesInterface
     */
    public function setLabel($label)
    {
        return $this->setData(self::LABEL, $label);
    }

    /**
     * Get Products
     * @return string|null
     */
    public function getProducts()
    {
        return $this->_get(self::PRODUCTS);
    }

    /**
     * Set Products
     * @param string $products
     * @return \OrviSoft\ProductBundles\Api\Data\BundlesInterface
     */
    public function setProducts($products)
    {
        return $this->setData(self::PRODUCTS, $products);
    }
}
