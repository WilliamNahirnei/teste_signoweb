<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Http\Requests\SurveyRequest;
use App\Http\Resources\SurveyResource;
use App\BO\SurveyBO;

class SurveyController extends Controller
{
    /**
     * Return initialization page data
     *
     * @return  \Illuminate\Http\Response
     */
    public function initialize()
    {
        $surveyBO = new SurveyBO();
        $surveys = $surveyBO->initialize();

        return SurveyResource::collection($surveys);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveyBO = new SurveyBO();
        $surveys = $surveyBO->index();

        return SurveyResource::collection($surveys);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SurveyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SurveyRequest $request)
    {
        $surveyBO = new SurveyBO();
        $survey = $surveyBO->store($request);

        return new SurveyResource($survey);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey)
    {
        return new SurveyResource($survey);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SurveyRequest  $request
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function update(SurveyRequest $request, Survey $survey)
    {
        $surveyBO = new SurveyBO();
        $updated = $surveyBO->update($request, $survey);

        if ($updated)
        {
            return new SurveyResource($survey);
        }
        return response()->json([], 202);
    }

    /**
     * disable the specified survey from storage.
     *
    * @param  \App\Http\Requests\SurveyRequest  $request
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function disable(SurveyRequest $request, Survey $survey)
    {
        $surveyBO = new SurveyBO();
        $disabled = $surveyBO->disable($request, $survey);

        if ($disabled)
        {
            return response()->json("DELETED", 204);
        }

        return response()->json("ERROR ON DELETE", 500);
    }
}
