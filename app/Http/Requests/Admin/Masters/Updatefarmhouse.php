<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class Updatefarmhouse extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('farmhouse'); // Route se farmhouse ka ID le rahe hain

        return [
            'farmhouse_name' => "required|unique:frarmhouses,farmhouse_name,$id,id,deleted_at,NULL",
            'farm_location' => 'required'
        ];
    }
}

