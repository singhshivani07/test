<?php
namespace Larsonjuhl\DynamicForm\Controller\Adminhtml\Index;
use Magento\Framework\Controller\ResultFactory;
use Larsonjuhl\DynamicForm\Model\ResourceModel\Dynamicfields as DynamicResourceFactory;
use Magento\Framework\Controller\Result\JsonFactory;
class Getfields extends \Magento\Backend\App\Action
{
    protected $DynamicfieldsFactory;
    protected $dynamicResourceFactory;

         protected $resultPageFactory = false;      
         public function __construct(
                 \Magento\Backend\App\Action\Context $context,
                 \Magento\Framework\View\Result\PageFactory $resultPageFactory,
                 \Larsonjuhl\DynamicForm\Model\DynamicfieldsFactory $DynamicfieldsFactory,
                 DynamicResourceFactory $dynamicResourceFactory,
                 JsonFactory $resultJsonFactory
         ) {
                 parent::__construct($context);
                 $this->resultPageFactory = $resultPageFactory;
                 $this->DynamicfieldsFactory = $DynamicfieldsFactory;
                 $this->dynamicResourceFactory = $dynamicResourceFactory;
                 $this->resultJsonFactory = $resultJsonFactory;
         } 
         public function execute()
         {
                
                $DynamicfieldsFactory = $this->DynamicfieldsFactory->create();
                $collection = $DynamicfieldsFactory->getCollection(); //Get Collection of module data
                $dynamicFieldsData = $collection->getFirstItem()->getDynamicFieldsData();
                
                $resultJson = $this->resultJsonFactory->create();
                return $resultJson->setData([
                        'success' => true,
                        'data' => $dynamicFieldsData
                ]);
         }
}