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

class BSS_Deliverydate_Block_Adminhtml_Form_Field_Cutofftime extends Mage_Adminhtml_Block_System_Config_Form_Field
{
	/*
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        $date = new Varien_Data_Form_Element_Date;
        $format = Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
 
        $data = array(
            'name'      => $element->getName(),
            'html_id'   => $element->getId(),
            'image'     => $this->getSkinUrl('images/grid-cal.gif'),
        );
        $date->setData($data);
        $date->setValue($element->getValue(), $format);
        $date->setFormat(Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT));
        $date->setForm($element->getForm());
 
        return $date->getElementHtml();
    }*/
	protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
    	$res = '';
	$divId = $element->getId();
    	$res .= <<<EOD
<input name="{$element->getName()}" id="_date" value="{$element->getValue()}" type="text" style="" readonly /> 
<img src="{$this->getSkinUrl('images/time_clock.png')}" alt="" class="_dob_trig_regexts" title="{$this->__('Select Time')}" style="position: absolute;" />
<script type="text/javascript">
//<![CDATA[
	jQuery(document).on('click','._dob_trig_regexts', function() {
	// var a = jQuery(this).prev().attr('name');
	// console.log(a);
	jQuery(this).prev().timepicker({ 
	'step': 30,
	'timeFormat': 'h:i A',
	'noneOption': [
        'Select'
    ]	
	});
	jQuery(this).prev().timepicker('show');
})
	
//]]>
</script>
EOD;
		return $res;
    }
}
