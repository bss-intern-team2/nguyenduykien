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

class BSS_Deliverydate_Block_Adminhtml_Form_Field_Regexts extends Mage_Adminhtml_Block_System_Config_Form_Field_Array_Abstract
{
    public function __construct()
    {
        $this->addColumn('from', array(
            'label' => Mage::helper('adminhtml')->__('From'),
            'style' => 'width:150px',
        ));
		$this->addColumn('to', array(
            'label' => Mage::helper('adminhtml')->__('To'),
            'style' => 'width:150px',
        ));
		$this->addColumn('note', array(
            'label' => Mage::helper('adminhtml')->__('Note'),
            'style' => 'width:200px',
        ));
        $this->_addAfter = false;
        $this->_addButtonLabel = Mage::helper('adminhtml')->__('More');
        parent::__construct();
		$this->setTemplate('bss/deliverydate/form/field/regexts.phtml');
    }
	protected function _renderCellTemplates($columnName)
    {
        if (empty($this->_columns[$columnName])) {
            throw new Exception('Wrong column name specified.');
        }
        $column = $this->_columns[$columnName];
        $inputName = $this->getElement()->getName() . '[#{_id}][' . $columnName . ']';
		$image = $this->getSkinUrl('images/time_clock.png');
		if ($columnName == 'from' || $columnName == 'to') {
			$html = '<span class="bss_time_slot">'; 
			$html  .= '<input readonly style="margin-right: 15px; width:63px;" class="_dob_regexts" type="text" name="' . $inputName . '" value="#{' . $columnName . '}" ' . ($column['size'] ? 'size="' . $column['size'] . '"' : '') . '/>';
			//$html .= '<input style = "position: absolute; width: 30px; margin-left: 35px" type="text" name="' . $inputName . '" value="#{' . $columnName . '}" ' . ($column['size'] ? 'size="' . $column['size'] . '"' : '') . '/>';
			//$html .= '<input style = "width: 30px; position: relative; margin-left: 70px;" type="text" name="' . $inputName . '" value="#{' . $columnName . '}" ' . ($column['size'] ? 'size="' . $column['size'] . '"' : '') . '/>';
			$html .= '<img  style=" margin-left: -14px; position: absolute;" title="Select Time" class="_dob_trig_regexts" src="'.$image.'" class="v-middle">';
			$html .= '</span>';
			return $html;
		}else{
			return '<input type="text" name="' . $inputName . '" value="#{' . $columnName . '}" ' . ($column['size'] ? 'size="' . $column['size'] . '"' : '') . '/>';
		}
    }
}
