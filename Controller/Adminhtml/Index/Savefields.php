<?php
namespace Larsonjuhl\DynamicForm\Controller\Adminhtml\Index;
use Magento\Framework\Controller\ResultFactory;
use Larsonjuhl\DynamicForm\Model\ResourceModel\Dynamicfields as DynamicResourceFactory;
use Magento\Framework\Controller\Result\JsonFactory;
class Savefields extends \Magento\Backend\App\Action
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
            $resultJson = $this->resultJsonFactory->create();
            
            
            $DynamicfieldsFactory = $this->DynamicfieldsFactory->create();
            $collection = $DynamicfieldsFactory->getCollection(); //Get Collection of module data
            if($collection->getSize()){
                $id = $collection->getFirstItem()->getId();
                // foreach($collection as $value) {
                //     $id = $value->getId();
                // }
                $updated = $DynamicfieldsFactory->load($id);
                $updated->setdynamic_fields_data($this->getRequest()->getParam('data'));
                if($updated->save()){
                    $message = "Fields updated";
                }
            }else{
                $data = [
                    'dynamic_fields_data' => $this->getRequest()->getParam('data')
                ];
                $DynamicfieldsFactory->setData($data);
			    if($this->dynamicResourceFactory->save($DynamicfieldsFactory)){
                    $message = "Fields Added";
                }
            }
            return $resultJson->setData([
                'success' => true,
                'data' => '',
                'message' => $message
            ]);
         }
}