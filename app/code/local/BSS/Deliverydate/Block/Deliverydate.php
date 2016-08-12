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
 
    class BSS_Deliverydate_Block_Deliverydate extends Mage_Core_Block_Template
    {
        public function _prepareLayout()
        {
            return parent::_prepareLayout();
        }

        public function getDeliverydate()     
        { 
            if (!$this->hasData('deliverydate')) {
                $this->setData('deliverydate', Mage::registry('deliverydate'));
            }
            return $this->getData('deliverydate');

        }
        public function getDateFormat()
        {       
            return Mage::app()->getLocale()->getDateStrFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT) . ' ' . Mage::app()->getLocale()->getTimeStrFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
        }
		public function getCutOffTime() {
			if(Mage::getStoreConfig('deliverydate/deliverydate_general/cut_off_time')) {
				$_am_pm = substr(Mage::getStoreConfig('deliverydate/deliverydate_general/cut_off_time'),-2);
				if($_am_pm == 'AM'){
					return str_replace(" AM",":AM",Mage::getStoreConfig('deliverydate/deliverydate_general/cut_off_time'));
				}else{
					return str_replace(" PM",":PM",Mage::getStoreConfig('deliverydate/deliverydate_general/cut_off_time'));
				}
				return Mage::getStoreConfig('deliverydate/deliverydate_general/cut_off_time');
			} 
		}
		public function getBlockOutHoliday() {
			$_string_block_out_holiday;
			$dem = 0;
			if(Mage::getStoreConfig('deliverydate/deliverydate_general/block_out_holidays') != '' || Mage::getStoreConfig('deliverydate/deliverydate_general/block_out_holidays') != null){
				$_blockoutholiday = unserialize(Mage::getStoreConfig('deliverydate/deliverydate_general/block_out_holidays'));
				if(count($_blockoutholiday) > 0){
					foreach ($_blockoutholiday as $val) {
						$dem = $dem +1;
						if($dem != count($_blockoutholiday)){
							$_string_block_out_holiday .= $val['date'].'; ';
						}else{
							$_string_block_out_holiday .= $val['date'];
						}
						
					}
				}
			}
			return $_string_block_out_holiday;
		}
		public function getTimeSlots () {
			$dem = 0;
			$_string_time_slots;
			$_string_time_slots_row;
			if(Mage::getStoreConfig('deliverydate/deliverydate_general/time_slots') != '' || Mage::getStoreConfig('deliverydate/deliverydate_general/time_slots') != null){
				$_timeslots = unserialize(Mage::getStoreConfig('deliverydate/deliverydate_general/time_slots'));
				if(count($_timeslots) > 0){
					foreach ($_timeslots as $val){
						$dem = $dem +1;
						/*$_am_pm_from = substr($val['from'],-2);
						$_am_pm_to = substr($val['to'],-2);
						$_time_from;
						$_time_to;
						if($_am_pm_from == 'am'){
							$_time_from =str_replace("am",":am",$val['from']);	 
						}else{
							$_time_from =str_replace("pm",":pm",$val['from']);
						}
						if($_am_pm_to == 'am'){
							$_time_to = str_replace("am",":am",$val['to']);
						}else{
							$_time_to = str_replace("pm",":pm",$val['to']);
						}
						$_string_time_slots_row = $_time_from.','.$_time_to.','.$val['note'];*/
						$_string_time_slots_row = $val['from'].','.$val['to'].','.$val['note'];
						if($dem != count($_timeslots)){
							$_string_time_slots .= $_string_time_slots_row.'; ';
						}else{
							$_string_time_slots .= $_string_time_slots_row;
						}
					}
				}
			}
			return $_string_time_slots;
		}
}