<?php

namespace App\Http\Requests\Todo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class updateValidation extends FormRequest
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
            // 'title' => ['required' , Rule::unique('todos')->ignore($this->todo)],
            // unique:<table name >,<column name>,' . $this-><Model name **model not Model**>
            'title' => 'required|unique:todos,title,' . $this->todo,
            'desc' => 'required'
        ];
    }
}
