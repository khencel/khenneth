<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HexagramYao3 extends Model
{
    protected $fillable = [
        'hexagram_id',
        'hex_transformation_id',
        'yao_poem',
        'yao_text',
        'rating',
        'gen_luck',
        'health',
        'relationships',
        'career_wealth',
        'expectant_mothers',
        'examinations',
        'lost_property',
        'missing_persons',
        'travel',
        'legal_matters',
        'weather',
        'overall_forecast'
    ];
}
