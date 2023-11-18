<?php

namespace App\Http\Requests;

use App\Models\Chair;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'shift' => 'required|in:a,b,c,d',
            'chair' => 'required',
        ];
    }

    public function prepareForValidation()
    {
        $chair = Chair::where('id', request()->chair)->first();

        if(! $chair ) {
            return back();
        }

        $this->merge([
            'chair' => $chair
        ]);
    }
}
