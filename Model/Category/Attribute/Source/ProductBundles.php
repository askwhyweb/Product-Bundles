<?php


namespace OrviSoft\ProductBundles\Model\Category\Attribute\Source;

class ProductBundles extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{

    protected $_optionsData;
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
        if ($this->_options === null) {
            $bundles = $this->_helper->getBundles();
            $output = [];
            foreach($bundles as $key => $value){
                $output[] = ['value'=> $value['bundles_id'], 'label' => $value['Identifier']];
            }
            $this->_options = $output;
        }
        return $this->_options;
    }
}
