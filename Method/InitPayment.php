<?php
namespace GDO\PaymentBank\Method;

use GDO\User\GDO_User;
use GDO\Core\Website;
use GDO\Payment\MethodPayment;
/**
 * Pay with bank transfer.
 * @author gizmore
 */
final class InitPayment extends MethodPayment
{
	public function isAlwaysTransactional() { return true; }
	
	public function execute()
	{
		$user = GDO_User::current();
		# Check
		$order = $this->getOrder();
		if ((!$order->isCreator($user)))
		{
			return $this->error('err_order')->add(
				$order ? $order->redirectFailure() : Website::redirect(href(GWF_MODULE, GWF_METHOD)));
		}
		$tVars = array(
			'order' => $order,
		);
		return $this->templatePHP('order_pay.php', $tVars);
	}
	
}
