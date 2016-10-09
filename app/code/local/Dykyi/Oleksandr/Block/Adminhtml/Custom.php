<?php

/**
 * Description of Custom
 *
 * @author oleksandr
 */
class Dykyi_Oleksandr_Block_Adminhtml_Custom extends Mage_Adminhtml_Block_Widget_Grid_Container {

	/**
	 * Main method for init Grid
	 */
	protected function _construct() {
		parent::_construct();

		$helper            = Mage::helper('oleksandr');
		$this->_blockGroup = 'oleksandr';
		$this->_controller = 'adminhtml_custom';

		$this->_headerText     = $helper->__('Manage Custom Table');
		$this->_addButtonLabel = $helper->__('Add new value');
	}
}
