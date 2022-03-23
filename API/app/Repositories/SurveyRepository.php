<?php

namespace App\Repositories;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Survey;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class SurveyRepository
{
    public function __construct()
    {
    }

    /**
     * @return LengthAwarePaginator
     */
    public static function index(): LengthAwarePaginator
    {
        return Survey::paginate();
    }

    /**
     * @return Collection
     */
    public static function findActiveSurveys($columns = ['id','name']): Collection
    {
        return Survey::active()
            ->get($columns);
    }

    /**
     * @return Survey
     */
    public static function store($arraySurvey): Survey
    {
        return Survey::create($arraySurvey);
    }

    /**
     * @return bool
     */
    public static function update($arraySurvey, $survey): bool
    {
        return $survey->update($arraySurvey);
    }

    /**
     * @return bool
     */
    public static function disableSurvey($arraySurvey, $survey): bool
    {
        return $survey->update($arraySurvey);
    }

}
