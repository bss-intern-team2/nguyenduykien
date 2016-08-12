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

class BSS_Deliverydate_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/deliverydate?id=15 
    	 *  or
    	 * http://site.com/deliverydate/id/15 	
    	 */
    	/* 
		$deliverydate_id = $this->getRequest()->getParam('id');

  		if($deliverydate_id != null && $deliverydate_id != '')	{
			$deliverydate = Mage::getModel('deliverydate/deliverydate')->load($deliverydate_id)->getData();
		} else {
			$deliverydate = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($deliverydate == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$deliverydateTable = $resource->getTableName('deliverydate');
			
			$select = $read->select()
			   ->from($deliverydateTable,array('deliverydate_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$deliverydate = $read->fetchRow($select);
		}
		Mage::register('deliverydate', $deliverydate);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}