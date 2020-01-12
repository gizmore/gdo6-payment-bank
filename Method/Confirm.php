<?php
namespace GDO\PaymentBank\Method;

use GDO\Payment\MethodPayment;
use GDO\PaymentBank\Module_PaymentBank;
use GDO\Payment\BillingMails;

final class Confirm extends MethodPayment
{
	public function execute()
	{
		$module = Module_PaymentBank::instance();
		$order = $this->getOrderPersisted();
		if (!$order->getXToken())
		{
			# Pay now!
			$order->saveVar('order_xtoken', $module->getTransferPurpose($order));
			$this->setOrder($order);
			BillingMails::sendBillMail($order);
		}
		return $this->message('msg_bank_transfer_ordered');
	}

}
