<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class CpfRule implements Rule
{
    const RULE_LENGTH = 11;
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $value = preg_replace('/[^0-9]/', '', $value);

        if (strlen($value) !== self::RULE_LENGTH) {
            return false;
        } else if (count( array_unique( str_split( $value))) == 1) {
            return false;
        }

        for ($t = 9; $t < self::RULE_LENGTH; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $value[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % self::RULE_LENGTH) % 10;
            if ($value[$c] != $d) {
                return false;
            }
        }
        return true;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.cpf');
    }
}
