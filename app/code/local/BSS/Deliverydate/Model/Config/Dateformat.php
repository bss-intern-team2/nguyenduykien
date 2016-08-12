<?php
 /**
 * BssCommerce Co.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://bsscommerce.com/Bss-Commerce-License.txt
 *
 * =================================================================
 *                 MAGENTO EDITION USAGE NOTICE
 * =================================================================
 * This package designed for Magento COMMUNITY edition
 * BssCommerce does not guarantee correct work of this extension
 * on any other Magento edition except Magento COMMUNITY edition.
 * BssCommerce does not provide extension support in case of
 * incorrect edition usage.
 * =================================================================
 *
 * @category   BSS
 * @package    BSS_Deliverydate
 * @author     Extensions Team
 * @copyright  Copyright (c) 2014-2105 BssCommerce Co. (http://bsscommerce.com)
 * @license    http://bsscommerce.com/Bss-Commerce-License.txt
 */
 
    class BSS_Deliverydate_Model_Config_Dateformat extends Mage_Core_Model_Config_Data
    {

        /**
        * Get possible sharing configuration options
        *
        * @return array
        */
        public function toOptionArray()
        {
            return array(
                'd/M/Y' => Mage::helper('deliverydate')->__('d/M/Y'),
                'M/d/y' => Mage::helper('deliverydate')->__('M/d/y'),
                'd-M-Y' => Mage::helper('deliverydate')->__('d-M-Y'),
                'M-d-y' => Mage::helper('deliverydate')->__('M-d-y'),
                'm.d.y' => Mage::helper('deliverydate')->__('m.d.y'),
                'd.M.Y' => Mage::helper('deliverydate')->__('d.M.Y'),
                'M.d.y' => Mage::helper('deliverydate')->__('M.d.y'),
                'F j ,Y'=> Mage::helper('deliverydate')->__('F j ,Y'),
                'D M j' => Mage::helper('deliverydate')->__('D M j'),
                'Y-m-d' => Mage::helper('deliverydate')->__('Y-m-d')
            );
        }

    }
