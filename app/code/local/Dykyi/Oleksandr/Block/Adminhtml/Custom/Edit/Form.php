<?php

/**
 * Description of Form
 *
 * @author oleksandr
 */
class Dykyi_Oleksandr_Block_Adminhtml_Custom_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {

	/**
	 * Preparing Form elements
	 *
	 * @return Mage_Adminhtml_Block_Widget_Form
	 */
	protected function _prepareForm() {
		$helper = Mage::helper('oleksandr');
		$model  = Mage::registry('custom_data');
		$form   = new Varien_Data_Form(array(
			'id'     => 'edit_form',
			'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
			'method' => 'post',
		));
		$form->setUseContainer(true);
		$this->setForm($form);
		$fieldset = $form->addFieldset('custom_form', array('legend' => $helper->__('Custom value')));
		$fieldset->addField('key', 'text', array(
			'label'    => $helper->__('Key'),
			'class'    => 'required-entry validate-digits',
			'required' => true,
			'name'     => 'key',
		));
		$fieldset->addField('value', 'text', array(
			'label'    => $helper->__('Value'),
			'class'    => 'required-entry',
			'required' => true,
			'name'     => 'value',
		));

		//set values for form
		if($model) {
			$form->setValues(Mage::registry('custom_data')->getData());
		}
		$this->setForm($form);

		return parent::_prepareForm();
	}

}
