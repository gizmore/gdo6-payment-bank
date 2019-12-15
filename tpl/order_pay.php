<?php

use GDO\UI\GDT_Card;
use GDO\Payment\GDO_Order;
use GDO\UI\GDT_Paragraph;
use GDO\DB\GDT_String;
use GDO\PaymentBank\Module_PaymentBank;
use GDO\UI\GDT_Button;
use GDO\UI\GDT_Bar;

/** @var $order GDO_Order **/
$order instanceof GDO_Order;

$module = Module_PaymentBank::instance();

echo $order->getOrderable()->renderOrderCard();

$card = GDT_Card::make();
$card->title(t('t_pay_with_bank'));
$card->subtitle(t('st_pay_with_bank'));

$card->addFields(array(
	GDT_Paragraph::make()->html(t('p_pay_with_bank')),
	$module->getConfigColumn('owner'),
	$module->getConfigColumn('iban'),
	$module->getConfigColumn('bic'),
	GDT_String::make('purpose')->val($module->getTransferPurpose($order)),
));

$card->addField(
	GDT_Bar::make()->horizontal()->addFields(array(
		GDT_Button::make('confirm')->href(href('PaymentBank', 'Confirm', "&order={$order->getID()}")),
		GDT_Button::make('cancel')->href(href('PaymentBank', 'Cancel', "&order={$order->getID()}")),
	)),
);

echo $card->render();
