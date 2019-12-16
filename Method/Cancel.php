<?php
namespace GDO\PaymentBank\Method;

use GDO\Payment\MethodPayment;
use GDO\Core\Website;
use GDO\User\GDO_User;

final class Cancel extends MethodPayment
{
	public function execute()
	{
		$user = GDO_User::current();
		$order = $this->getOrder();
		if ( (!$order->isPaid()) && ($order->getCreator()===$user) )
		{
			$order->delete();
		}
		return $this->message('msg_order_cancelled')->add(Website::redirect($order->href_failure()));
	}
	
}
