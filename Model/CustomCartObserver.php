<?php

namespace AHT\Lession8\Model;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Filesystem; 
use AHT\Lession8\Model\DataFactory; 

class CustomCartObserver implements \Magento\Framework\Event\ObserverInterface
{
	protected $_pageFactory;
	protected $_filesystem;
	protected $_dataFactory;
	protected $_productResource;
 
     public function __construct(
		 Context $context,
		 PageFactory $pageFactory,
		 Filesystem $filesystem,
		 \Magento\Catalog\Model\ResourceModel\Product $productResource,
		 DataFactory $dataFactory
		 )
     {
			$this->_pageFactory = $pageFactory;
			$this->_filesystem = $filesystem;
			$this->_dataFactory = $dataFactory;
			$this->_productResource = $productResource;
     }

	public function execute(\Magento\Framework\Event\Observer $observer)
	{	
		$model = $this->_dataFactory->create();
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
		$model->save();
	
	}
}