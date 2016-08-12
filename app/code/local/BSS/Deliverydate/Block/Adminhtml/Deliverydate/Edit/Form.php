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
class BSS_Deliverydate_Block_Adminhtml_Deliverydate_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form(array(
                                      'id' => 'edit_form',
                                      'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
                                      'method' => 'post',
        							  'enctype' => 'multipart/form-data'
                                   )
      );

      $form->setUseContainer(true);
      $this->setForm($form);
      return parent::_prepareForm();
  }
}