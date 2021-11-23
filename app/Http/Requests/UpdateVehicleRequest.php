<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|unique:vehicles,code,'.$this->id,
            'license_number' => 'required|unique:vehicles,license_number,'.$this->id,
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|numeric',
            'vin' => 'required|unique:vehicles,vin,'.$this->id,
        ];
    }
}
