<?php

/**
 * Description of Edit
 *
 * @author oleksandr
 */
class Dykyi_Oleksandr_Block_Adminhtml_Custom_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {

	/**
	 * Init Edit block
	 */
	public function _construct() {
		parent::_construct();
		$this->_objectId   = 'id';
		$this->_blockGroup = 'oleksandr';
		$this->_controller = 'adminhtml_custom';
	}

	/**
	 * Get Header Text for Edit block
	 *
	 * @return string
	 */
	public function getHeaderText() {
		$headerText = (Mage::registry('custom_data') && Mage::registry('custom_data')->getId()) ? 'Edit record' : 'Add record';

		return Mage::helper('oleksandr')->__($headerText);
	}
}
