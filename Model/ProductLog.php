<?php
namespace AHT\Lession8\Model;

use Magento\Framework\Model\AbstractModel;

    class ProductLog extends AbstractModel
    {   
        public function _construct()
        {
            $this->_init('AHT\Lession8\Model\ResourceModel\ProductLog');
        }

        
}