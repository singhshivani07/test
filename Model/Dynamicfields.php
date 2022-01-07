<?php
namespace Larsonjuhl\DynamicForm\Model;

class Dynamicfields extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Larsonjuhl\DynamicForm\Model\ResourceModel\Dynamicfields');
    }
}
?>