<?php
namespace GDO\PaymentBank;

use GDO\Payment\PaymentModule;
use GDO\Payment\GDO_Order;
use GDO\Date\Time;
use GDO\DB\GDT_String;
use GDO\User\GDT_Realname;

final class Module_PaymentBank extends PaymentModule
{
	#####################
	### PaymentModule ###
	#####################
	public function makePaymentButton($href)
	{
		$button = parent::makePaymentButton($href);
		return $button->label('buy_bank_transfer');
	}
	
	##############
	### Module ###
	##############
	public function getDependencies() { return ['Payment']; }
// 	public function getClasses() { return ['GDO\PaymentCredits\GDO_CreditsOrder']; }
	public function onLoadLanguage() { return $this->loadLanguage('lang/bank'); }
	public function payment() { return Module_PaymentBank::instance(); }
	
	##############
	### Config ###
	##############
	public function getConfig()
	{
		return array_merge(parent::getConfig(), array(
			GDT_BIC::make('bic')->initial('00000000000'),
			GDT_IBAN::make('iban')->initial('000000000000000000000000'),
			GDT_String::make('owner')->initial('Firstname Lastname'),
		));
	}
	public function cfgBIC() { return $this->getConfigVar('bic'); }
	public function cfgIBAN() { return $this->getConfigVar('iban'); }
	public function cfgOwner() { return $this->getConfigVar('owner'); } 
	
	/**
	 * Verwendungszweck / Transfer usage
	 * @param GDO_Order $order
	 * @return string
	 */
	public function getTransferPurpose(GDO_Order $order)
	{
		$year = Time::getYear($order->getCreated());
		return sprintf('%s-%s-%09d', sitename(), $year, $order->getID());
	}
	
	public function renderOrderFragment(GDO_Order $order)
	{
		return $this->templatePHP('order_fragment.php', ['order' => $order]);
	}
}
