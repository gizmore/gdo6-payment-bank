<?php
namespace GDO\PaymentBank;

use GDO\DB\GDT_Char;

/**
 * Bank identifier.
 * @author gizmore
 * @since 6.10.4
 */
final class GDT_BLZ extends GDT_Char
{
    protected function __construct()
    {
        parent::__construct();
        $this->min(8);
        $this->max(8);
        $this->ascii();
        $this->caseS();
    }
    
}
