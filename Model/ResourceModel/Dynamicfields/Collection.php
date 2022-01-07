<?php

namespace Larsonjuhl\DynamicForm\Model\ResourceModel\Dynamicfields;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Larsonjuhl\DynamicForm\Model\Dynamicfields', 'Larsonjuhl\DynamicForm\Model\ResourceModel\Dynamicfields');
        $this->_map['fields']['page_id'] = 'main_table.page_id';
    }

}
?>