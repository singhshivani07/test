<?php
namespace Larsonjuhl\DynamicForm\Controller\Adminhtml\Index;

class Index extends \Magento\Backend\App\Action
{
         protected $resultPageFactory = false;      
         public function __construct(
                 \Magento\Backend\App\Action\Context $context,
                 \Magento\Framework\View\Result\PageFactory $resultPageFactory
         ) {
                 parent::__construct($context);
                 $this->resultPageFactory = $resultPageFactory;
         } 
         public function execute()
         {
                 $resultPage = $this->resultPageFactory->create();
                //  $resultPage->setActiveMenu('Larsonjuhl_Form::menu');
                 $resultPage->getConfig()->getTitle()->prepend(__('Demo Menu'));
                 return $resultPage;
         }
         protected function _isAllowed()
         {
                 return $this->_authorization->isAllowed('Larsonjuhl_DynamicForm::menu');
         }
}