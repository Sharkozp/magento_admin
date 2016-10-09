<?php

/**
 * Description of Model
 *
 * @author oleksandr
 */
class Dykyi_Oleksandr_Model_Resource_Model extends Mage_Core_Model_Resource_Db_Abstract {

	protected function _construct() {
		$this->_init("oleksandr/resource_table", "id");
	}
}
