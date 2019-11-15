<?php


namespace OrviSoft\ProductBundles\Model\Product\Attribute\Source;

class ProductBundles extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    protected $_helper;

    /**
     * Constructor
     *
     * @param array $options
     */
    public function __construct(
        \OrviSoft\ProductBundles\Helper\Data $helper
    ){
        $this->_helper = $helper;
    }
    /**
     * getAllOptions
     *
     * @return array
     */
    public function getAllOptions()
    {
        $bundles = $this->_helper->getBundles();
        $output = [];
        foreach($bundles as $key => $value){
            $output[] = ['value'=> $value['bundles_id'], 'label' => $value['Identifier']];
        }
        $this->_options = $output;
        return $this->_options;
    }
}
