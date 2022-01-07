<?php
namespace Larsonjuhl\DynamicForm\Model\ResourceModel;

class Dynamicfields extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('larson_dynamic_form_fields', 'id');
    }
}
?>