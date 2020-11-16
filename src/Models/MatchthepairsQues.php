<?php
namespace Edgewizz\Matchthepairs\Models;

use Illuminate\Database\Eloquent\Model;

class MatchthepairsQues extends Model{
    public function answers(){
        return $this->hasMany('Edgewizz\Matchthepairs\Models\MatchthepairsAns', 'question_id');
    }
    protected $table = 'fmt_matchthepairs_ques';
}