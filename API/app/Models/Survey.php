<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use Traits\Scope;

    protected $guarded = ['idSurvey'];
    protected $table = 'survey';
    protected $primaryKey = 'idSurvey';

    /**
     * Attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         "titleSurvey",
         "startDateSurvey",
         "endDateSurvey",
         "statusSurvey"
    ];
}
