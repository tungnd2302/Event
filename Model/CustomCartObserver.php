<?php

namespace AHT\Lession8\Model;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Filesystem; 
use AHT\Lession8\Model\ProductLogFactory; 

class CustomCartObserver implements \Magento\Framework\Event\ObserverInterface
{
	protected $_pageFactory;
	protected $_filesystem;
	protected $_productLogFactory;
	protected $_productResource;
 
     public function __construct(
		 PageFactory $pageFactory,
		 Filesystem $filesystem,
		 \AHT\Lession8\Model\ResourceModel\ProductLog $productResource,
		 ProductLogFactory $productLogFactory
		 )
     {
			$this->_pageFactory = $pageFactory;
			$this->_filesystem = $filesystem;
			$this->_productLogFactory = $productLogFactory;
			$this->_productResource = $productResource;
     }

	public function execute(\Magento\Framework\Event\Observer $observer)
	{	
		$model = $this->_productLogFactory->create();
		$eventInfo = $observer->getData('info');
		$qty   = $eventInfo['qty'];

		$eventProduct = $observer->getData('product');
		$name          = $eventProduct['name'];
		$price          = $eventProduct['price'];
		$data  = [
			'name' => $name,
			'price' => $price,
			'quantity' => $qty,
			'time'    => date('d-m-Y',time())
		];
		$model->addData($data);
		$this->_productResource->save($model);
	}
}