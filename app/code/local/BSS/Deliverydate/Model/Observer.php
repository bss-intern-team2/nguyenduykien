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
 
    class BSS_Deliverydate_Model_Observer
    {				

        public function checkout_controller_onepage_save_shipping_method($observer)
        {
            if (Mage::getStoreConfig('deliverydate/deliverydate_general/on_which_page')==1){
                $request = $observer->getEvent()->getRequest();
                $quote =  $observer->getEvent()->getQuote();

                $desiredArrivalDate = Mage::helper('deliverydate')->getFormatedDeliveryDateToSave($request->getPost('shipping_arrival_date', ''));
                if (isset($desiredArrivalDate) && !empty($desiredArrivalDate)){
                    $quote->setShippingArrivalDate($desiredArrivalDate);
                    $quote->setShippingArrivalComments($request->getPost('shipping_arrival_comments'));
					$quote->setShippingArrivalTimeslot($request->getPost('shipping_arrival_timeslot'));
                    $quote->save();
                }
            }

            return $this;
        }


}