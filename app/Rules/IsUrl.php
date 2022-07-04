<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class IsUrl implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if(!filter_var($value, FILTER_VALIDATE_URL)){
            $fail('Введенный текст не является ссылкой');
        }

    }
}
