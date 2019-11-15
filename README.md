# Mage2 Module OrviSoft ProductBundles

    `orvisoft/module-productbundles`

 - [Main Functionalities](#main-functionalities)
 - [Installation](#installation)
 - [Specifications](#specifications)
 - [Attributes](#attributes)


## Main Functionalities
This module helps to create selectable bundles that appears on product page for bundle buy (x+y scenario).

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/OrviSoft/ProductBundles`
 - Enable the module by running `php bin/magento module:enable OrviSoft_ProductBundles`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require orvisoft/module-productbundles`
 - enable the module by running `php bin/magento module:enable OrviSoft_ProductBundles`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Specifications

 - Model
	- Bundles


## Attributes

 - Category - Product Bundles (product_bundles)

 - Product - Product Bundles (product_bundles_override)

