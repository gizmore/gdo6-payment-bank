<?php
namespace GDO\PaymentBank;

use GDO\DB\GDT_String;

final class GDT_BIC extends GDT_String
{
	public function defaultLabel() { return $this->label('bic'); }
}
