<?php

namespace Myckhel\ChatSystem\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaginableRequest extends FormRequest
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
          'orderBy'     => '',
          'order'       => 'in:asc,desc',
          'pageSize'    => 'int',
        ];
    }
}
