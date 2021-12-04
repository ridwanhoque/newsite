<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class SaleQuotationStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    
    public function rules()
    {
        return [
                'party_id' => 'required|not_in:0',
                'sale_quotation_date' => 'required|date',
                'sub_total' => 'required|numeric|min:0',
                'invoice_discount' => 'required|numeric|min:0',
                'invoice_vat' => 'required|numeric|min:0',
                'invoice_tax' => 'required|numeric|min:0',
                'tax_percent' => 'required|numeric|min:0',
                'total_payable' => 'required|numeric|min:1',
                'total_paid' => 'required|sometimes|numeric|min:0',
                'products.*' => 'required|not_in:0',
                'qty.*' => 'required|numeric|min:0',
                'price.*' => 'required|numeric|min:0',
                'total.*' => 'required|numeric|min:0'
        ];
    }

    public function attributes(){
        return [
            'products.*' => 'raw material',
            'qty.*' => 'quantity',
            'price.*' => 'unit price',
            'total.*' => 'total',
            'total_payable' => 'grand total'
        ];
    }

}
