<?php
namespace GDO\PaymentBank\Method;

use GDO\Payment\MethodPayment;
use GDO\Core\Website;

final class Cancel extends MethodPayment
{
	public function execute()
	{
		$order = $this->getOrder();
		return $this->message('msg_order_cancelled')->add(Website::redirect($order->href_failure()));
	}
	
}
