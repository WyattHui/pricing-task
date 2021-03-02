<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceItemRuleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // @TODO: Allow admin only
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'price_overwrite' => 'nullable|numeric',
            'markup' => 'nullable|numeric',
            'is_weekday' => 'nullable|boolean',
            'is_weekend' => 'nullable|boolean',
            'location_id' => 'nullable|integer',
            'membership_id' => 'nullable|integer',
            'disable' => 'nullable|boolean',
            'price_item_id' => 'nullable|integer'
        ];
    }
}
