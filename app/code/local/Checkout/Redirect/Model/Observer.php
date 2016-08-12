<?php 
class Checkout_Redirect_Model_Observer {
    public function checkoutRedirect($observer) {	
		$url = Mage::getBaseUrl();
		$grandTotal = Mage::getSingleton('checkout/cart')->getQuote()->getGrandTotal();

		if(!Mage::getSingleton('customer/session')->isLoggedIn()){
			Mage::getSingleton('core/session')->addError('Please login and try again !');
			Mage::app()->getFrontController()->getResponse()->setRedirect($url)->sendResponse();
			Mage::app()->getResponse()->sendResponse();
			exit;	
		}
		elseif ($grandTotal < 50) {
			Mage::getSingleton('core/session')->addError('Please choose items upto 50$ !');
			Mage::app()->getFrontController()->getResponse()->setRedirect($url)->sendResponse();
			Mage::app()->getResponse()->sendResponse();	
			exit;
		}	
	}
}