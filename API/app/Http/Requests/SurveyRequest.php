<?php

namespace App\Http\Requests;

use App\Http\Requests\CustomRulesRequest;

class SurveyRequest extends CustomRulesRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return Bool
     */
    public function authorize(): Bool
    {
        return true;
    }

    /**
     * @return Array
     */
    public function validateDefault(): Array
    {
        return [
            // Your default validation
        ];
    }

    /**
     * @return Array
     */
    public function validateToStore(): Array
    {
        return [
            'titleSurvey'     => 'required|max:250',
            'startDateSurvey' => 'required|date_format:Y-m-d H:i:s',
            'endDateSurvey'   => 'required|date_format:Y-m-d H:i:s'
        ];
    }

    /**
     * @return Array
     */
    public function validateToUpdate(): Array
    {
        return [
            'titleSurvey'     => 'required|max:250',
            'startDateSurvey' => 'required|date_format:Y-m-d H:i:s',
            'endDateSurvey' => 'required|date_format:Y-m-d H:i:s'
        ];
    }

    /**
     * @return Array
     */
    public function validateToDisable() : Array
    {
        return[

        ];
    }

    /**
     * @return Array
     */
    public function messages(): Array
    {
        return [
            // 'id.required' => 'O id é obrigatório!',
        ];
    }
}
