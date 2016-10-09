<?php

/**
 * Description of CustomController
 *
 * @author oleksandr
 */
class Dykyi_Oleksandr_CustomController extends Mage_Adminhtml_Controller_Action {

	/**
	 * Main index action
	 */
	public function indexAction() {
		$this->loadLayout()->_setActiveMenu('catalog')->_addContent($this->getLayout()->createBlock('oleksandr/adminhtml_custom'))->renderLayout();
	}

	/**
	 * Redirect to edit action
	 */
	public function newAction() {
		$this->_forward('edit');
	}


	public function editAction() {
		$id    = (int) $this->getRequest()->getParam('id');
		$model = Mage::getModel('oleksandr/model');

		// if data present we edit values. If not create new value
		if($data  = Mage::getSingleton('adminhtml/session')->getFormData()) {
			$model->setData($data)->setId($id);
		} else {
			$model->load($id);
		}
		Mage::register('custom_data', $model);
		$this->loadLayout()->_setActiveMenu('catalog')->_addContent($this->getLayout()->createBlock('oleksandr/adminhtml_custom_edit'))->renderLayout();
	}

	/**
	 * Save data
	 */
	public function saveAction() {
		if($postData = $this->getRequest()->getPost()) {
			try {
				Mage::getModel('oleksandr/model')->setData($postData)->setId($this->getRequest()->getParam('id'))->save();
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('oleksandr')->__('Record successfully saved'));
				$this->_redirect('*/*/');

				return;
			}
			catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));

				return;
			}
		}
		$this->_redirect('*/*/');
	}

	/**
	 * Delete data
	 */
	public function deleteAction() {
		if($id = $this->getRequest()->getParam('id')) {
			try {
				Mage::getModel('oleksandr/model')->setId($id)->delete();
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('oleksandr')->__('Record was deleted successfully'));
			}
			catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $id));
			}
		}
		$this->_redirect('*/*/');
	}
}