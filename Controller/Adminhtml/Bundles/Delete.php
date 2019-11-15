<?php


namespace OrviSoft\ProductBundles\Controller\Adminhtml\Bundles;

class Delete extends \OrviSoft\ProductBundles\Controller\Adminhtml\Bundles
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('bundles_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\OrviSoft\ProductBundles\Model\Bundles::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Bundles.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['bundles_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Bundles to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
