<?php
namespace GDO\PaymentBank;

use GDO\DB\GDT_String;

final class GDT_IBAN extends GDT_String
{
	public function defaultLabel() { return $this->label('iban'); }
	

}
