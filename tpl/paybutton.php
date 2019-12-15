<?php
use GDO\Payment\GDO_Order;
use GDO\UI\GDT_Bar;
use GDO\UI\GDT_Button;

/** @var $order GDO_Order **/
$order instanceof GDO_Order; 

$bar = GDT_Bar::make();
$button = GDT_Button::make()->label('btn_pay_bank');
$button->href(href('PaymentBank', 'Pay', '&order='.$order->getID()));
$button->icon('money');
$bar->addField($button);
echo $bar->renderCell();
