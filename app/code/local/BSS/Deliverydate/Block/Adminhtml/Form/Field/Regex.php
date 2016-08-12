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

class BSS_Deliverydate_Block_Adminhtml_Form_Field_Regex extends Mage_Adminhtml_Block_System_Config_Form_Field_Array_Abstract
{
    public function __construct()
    {
        $this->addColumn('date', array(
            'label' => Mage::helper('adminhtml')->__('Date'),
            'style' => 'width:230px',
        ));
		$this->addColumn('content', array(
            'label' => Mage::helper('adminhtml')->__('Content'),
            'style' => 'width:230px',
        ));

        $this->_addAfter = false;
        $this->_addButtonLabel = Mage::helper('adminhtml')->__('More');
        parent::__construct();
		$this->setTemplate('bss/deliverydate/form/field/regex.phtml');
		
    }
	
	public function _renderCellTemplate($columnName)
    {
        if (empty($this->_columns[$columnName])) {
            throw new Exception('Wrong column name specified.');
        }
        $column = $this->_columns[$columnName];
        $inputName = $this->getElement()->getName() . '[#{_id}][' . $columnName . ']';
		$image = $this->getSkinUrl('images/grid-cal.gif');
		if ($columnName == 'date') {
			$html = '<span style = "position: relative;">';
			$html .= '<input style="margin-right: 15px;" class="_dob" readonly = "readonly" type="text" name="' . $inputName . '" value="#{' . $columnName . '}" ' . ($column['size'] ? 'size="' . $column['size'] . '"' : '') . '/>';
			$html .= '<img style=" margin-left: -14px; position: absolute; margin-top: 2px;" title="Select date" class="_dob_trig" src="'.$image.'" class="v-middle" >';

			$html .='</span>';
		}else{
			return '<input type="text" name="' . $inputName . '" value="#{' . $columnName . '}" ' . ($column['size'] ? 'size="' . $column['size'] . '"' : '') . '/>';
		}
		return $html;
    }
}
