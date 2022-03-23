<?php

namespace App\BO\Traits;

use Illuminate\Http\Request;
use App\Http\Requests\UserHasSystemRequest;

use App\Resources\Traits\PrepareTrait;
use Carbon\Carbon;

/**
 * Survey trait
 *
 */
trait SurveyTrait
{
    use PrepareTrait;

    /**
     * Method responsible for receiving data and preparing them to call the desired method
     *   its name must be the junction of the word prepare with the name of the method that will call it
     *
     * @param array $params
     * @return void
     */
    public function prepareStore(array $params)
    {
        $requestObject              = $params['request'];
        $classObject                = $params['object'];

        $returnArray = [
            'titleSurvey'     => $requestObject->titleSurvey,
            'startDateSurvey' => new Carbon($requestObject->startDateSurvey),
            'endDateSurvey'   => new Carbon($requestObject->endDateSurvey),
            'statusSurvey'    => 'active'
        ];

        return array_filter($returnArray);
    }

    /**
     * Method responsible for receiving data and preparing them to call the desired method
     *   its name must be the junction of the word prepare with the name of the method that will call it
     *
     * @param array $params
     * @return void
     */
    public function prepareUpdate(array $params)
    {
        $requestObject              = $params['request'];
        $classObject                = $params['object'];

        $returnArray = [
            'titleSurvey'     => $requestObject->titleSurvey,
            'startDateSurvey' => new Carbon($requestObject->startDateSurvey),
            'endDateSurvey'   => new Carbon($requestObject->endDateSurvey),
        ];

        return array_filter($returnArray);
    }

    public function prepareDisable(array $params){
        $requestObject              = $params['request'];
        $classObject                = $params['object'];

        $returnArray = [
            'statusSurvey'    => 'inactive'
        ];

        return array_filter($returnArray);
    }
}
