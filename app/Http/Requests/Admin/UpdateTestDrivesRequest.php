<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTestDrivesRequest extends FormRequest
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
            
            'nama' => 'min:3|max:50|required',
            'email' => 'required|email',
            'ktp' => 'required',
            'alamat' => 'required',
            'tanggal_test_drive' => 'required|date_format:'.config('app.date_format'),
            'jenis_sim' => 'required',
            'merk_id' => 'required',
        ];
    }
}
