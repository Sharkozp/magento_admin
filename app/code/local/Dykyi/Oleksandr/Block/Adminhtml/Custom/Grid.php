<?php

/**
 * Description of Grid
 *
 * @author oleksandr
 */
class Dykyi_Oleksandr_Block_Adminhtml_Custom_Grid extends Mage_Adminhtml_Block_Widget_Grid {

	/**
	 * Preparing collection for Grid
	 *
	 * @return Mage_Adminhtml_Block_Widget_Grid
	 */
	protected function _prepareCollection() {
		$collection = Mage::getModel('oleksandr/model')->getCollection();
		$this->setCollection($collection);

		return parent::_prepareCollection();
	}

	/**
	 * Preparing columns for Grid
	 *
	 * @return Mage_Adminhtml_Block_Widget_Grid
	 */
	protected function _prepareColumns() {
		$helper = Mage::helper('oleksandr');

		$this->addColumn('key', array(
			'header' => $helper->__('Key'),
			'index'  => 'key',
			'type'   => 'text',
		));

		$this->addColumn('value', array(
			'header' => $helper->__('Value'),
			'index'  => 'value',
			'type'   => 'text',
		));

		return parent::_prepareColumns();
	}

	/**
	 * Get URL for edit value
	 *
	 * @param $item
	 *
	 * @return string
	 */
	public function getRowUrl($item) {
		return $this->getUrl('*/*/edit', array('id' => $item->getId()));
	}
}
