<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class MaxQuantity implements Rule
{
    protected $itemId;
    protected $wivId;

    public function __construct($itemId, $wivId)
    {
        $this->itemId = $itemId;
        $this->wivId = $wivId;
    }

    public function passes($attribute, $value)
    {
        $availableQuantity = DB::table('item_wiv')
            ->where('item_id', $this->itemId)
            ->where('wiv_id', $this->wivId)
            ->value('quantity');

        return $value <= $availableQuantity;
    }

    public function message()
    {
        return 'The :attribute cannot be greater than the available quantity.';
    }
}
