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
class BSS_Deliverydate_Block_Adminhtml_Deliverydate_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'deliverydate';
        $this->_controller = 'adminhtml_deliverydate';
        
        $this->_updateButton('save', 'label', Mage::helper('deliverydate')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('deliverydate')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('deliverydate_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'deliverydate_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'deliverydate_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('deliverydate_data') && Mage::registry('deliverydate_data')->getId() ) {
            return Mage::helper('deliverydate')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('deliverydate_data')->getTitle()));
        } else {
            return Mage::helper('deliverydate')->__('Add Item');
        }
    }
}