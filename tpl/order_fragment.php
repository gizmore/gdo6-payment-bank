<?phpuse GDO\Payment\GDO_Order;
use GDO\UI\GDT_Card;use GDO\PaymentBank\Module_PaymentBank;/** @var $order GDO_Order **/
$order instanceof GDO_Order;$module = Module_PaymentBank::instance(); $card = GDT_Card::make();$card->addFields(array(	$module->getConfigColumn('owner'),	$module->getConfigColumn('bic'),	$module->getConfigColumn('iban'),));echo $card->render();