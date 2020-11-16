<?php
namespace Edgewizz\Matchthepairs\Models;

use Illuminate\Database\Eloquent\Model;

class MatchthepairsAns extends Model
{
    public function match(){
        return $this->hasOne('Edgewizz\Matchthepairs\Models\MatchthepairsAns', 'match_id');
    }
    protected $table = 'fmt_matchthepairs_ans';
}
