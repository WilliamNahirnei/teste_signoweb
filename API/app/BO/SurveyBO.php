<?php

namespace App\BO;

use App\Repositories\SurveyRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\BO\Traits\SurveyTrait;
use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyBO
{
    use SurveyTrait;

    /**
     * Return initialization page data
     *
     * @return Object
     */
    public function initialize(): Object
    {
        // Your code

        return new \stdClass();
    }

    /**
     * Displays a resource's list
     *
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return SurveyRepository::index();
    }

    /**
    * Get only active resources
    *
    * @return Collection
    */
    public function findActiveSurveys(): Collection
    {
        return SurveyRepository::findActiveSurveys();
    }

    /**
     * Store a new resource in storage
     *
     * @param \App\Http\Requests\SurveyRequest  $request
     * @return Survey
     */
    public function store($request): Survey
    {
        return SurveyRepository::store($this->prepare($request));
    }

    /**
     * Update an specific resource in storage.
     *
     * @param Request  $request
     * @param \App\Models\Survey  $survey
     * @return bool
     */
    public function update($request, $survey): bool
    {
        return SurveyRepository::update($this->prepare($request, $survey), $survey);
    }

    /**
     * Delete an specific resource from storage.
     *
     * @param Request  $request
     * @param \App\Models\Survey  $survey
     * @return bool
     */
    public function disable($request, $survey): bool
    {
        return SurveyRepository::disableSurvey($this->prepare($request) ,$survey);
    }
}
