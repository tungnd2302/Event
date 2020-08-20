<?php
namespace  AHT\Lession8\Model\ResourceModel;

class ProductLog extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init('AHT_Lession8', 'id');
    }
}