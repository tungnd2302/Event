<?php
namespace AHT\Lession8\Model\ResourceModel\Data;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection 
{
    protected function _construct()
    {
        $this->_init('AHT\Lession8\Model\Data','AHT\Lession8\Model\ResourceModel\Data');
    }
}