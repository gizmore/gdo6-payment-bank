<?php
namespace GDO\PaymentBank;

use GDO\DB\GDT_String;

/**
 * Bank Identifier Code.
 * 
 * @author gizmore
 * @version 6.10.4
 * @since 6.10.1
 */
final class GDT_BIC extends GDT_String
{
	public function defaultLabel() { return $this->label('bic'); }
	
	protected function __construct()
	{
	    parent::__construct();
	    $this->max(34);
	    $this->ascii();
	    $this->caseI();
	}
	
	public function validate($value)
	{
	    if (parent::validate($value))
	    {
	        return true; # @todo Implement BIC check
	    }
	}
	
}
