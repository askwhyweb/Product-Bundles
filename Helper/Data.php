<?php

namespace OrviSoft\ProductBundles\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    protected $_bundles;
    protected $_category;
    protected $_coreRegistry;
    protected $_productModel;
    /**
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \OrviSoft\ProductBundles\Model\Bundles $collectionFactory,
        \Magento\Catalog\Model\Category $category,
        \Magento\Framework\Registry $registry,
        \Magento\Catalog\Model\Product $productModel
    ) {
        parent::__construct($context);
        $this->_bundles = $collectionFactory;
        $this->_category = $category;
        $this->_coreRegistry = $registry;
        $this->_productModel = $productModel;
    }

    public function loadProductsBySku($skus){
        $skus = (string) $skus;
        $arrSkus = explode(',', $skus);
        $products = $this->_productModel->getCollection()
                ->addAttributeToSelect('*')
                ->addAttributeToFilter(
                    'sku', ['in' => $arrSkus]
            );
        return $products;
    }

    public function getProduct()
    {
        return $this->_coreRegistry->registry('product');
    }

    public function getCategory($id){
        return $this->_category->load($id);
    }

    public function getBundles(){
        $data = $this->_bundles->getCollection();
        return $data->getData();
    }

    public function getActiveBundles(){
        $product = true;
        $data = $this->_bundles->getCollection();
        if($product){
            $_product = $this->getProduct();
            $bundleIds = $_product->getData('product_bundles_override');
            if(strlen($bundleIds) > 0){
                $output = $data;
                $output->addFieldToFilter('bundles_id', array('in' => $bundleIds));
                if($output){
                    return $output;
                }
            }
            $categories = $_product->getCategoryIds();
            foreach($categories as $catID){
                $_category = $this->getCategory($catID);
                if(strlen($_category->getData('product_bundles')) > 0){
                    $bundleIds = $_category->getData('product_bundles');
                    $output = $data;
                    $output->addFieldToFilter('bundles_id', array('in' => $bundleIds));
                    if($output){
                        return $output;
                    }
                }
            }
            return false;
        }
        return $data;
    }
}