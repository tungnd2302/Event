<?php
namespace AHT\Lession8\Model\ResourceModel\ProductLog;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection 
{
    protected function _construct()
    {
        $this->_init('AHT\Lession8\Model\ProductLog','AHT\Lession8\Model\ResourceModel\ProductLog');
    }
}