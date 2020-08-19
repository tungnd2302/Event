<?php
namespace AHT\Lession8\Model;

use Magento\Framework\Model\AbstractModel;

    class Data extends AbstractModel
    {   
        protected function _construct()
        {
            $this->_init('AHT\Lession8\Model\ResourceModel\Data');
        }
}