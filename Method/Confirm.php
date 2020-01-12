<?php
namespace GDO\PaymentBank\Method;

use GDO\Payment\MethodPayment;
use GDO\PaymentBank\Module_PaymentBank;
use GDO\Payment\BillingMails;

final class Confirm extends MethodPayment
{
	public function execute()
	{
// 		$user = GDO_User::current();
		$module = Module_PaymentBank::instance();
		$order = $this->getOrderPersisted();
		$order->saveVar('order_xtoken', $module->getTransferPurpose($order));
		# Pay now!
		BillingMails::sendBillMail($order);
// 		$this->sendMail($user, $order);
		return $this->message('msg_bank_transfer_ordered');
	}
	
// 	private function sendMail(GDO_User $user, GDO_Order $order)
// 	{
// 		$module = Module_PaymentBank::instance();
		
// 		$mail = Mail::botMail();
// 		$mail->setSubject(tusr($user, 'mail_subj_pay_bank'));
		
// 		$tVars = array(
// 			$user->displayNameLabel(),
// 			sitename(),
// 			$order->getOrderable()->renderOrderCard(),
// 			$module->cfgOwner(),
// 			$module->cfgBIC(),
// 			$module->cfgIBAN(),
// 			$module->getTransferPurpose($order),
// 			$order->displayPrice(),
// 		);
// 		$mail->setBody(tusr($user, 'mail_body_pay_bank', $tVars));
// 		$file = PaymentPDF::generate($user, $order);
// 		$mail->addAttachmentFile(tusr('attach_title_bill'), $file->getPath());
// 		$mail->sendToUser($user);
// 	}
	
}
