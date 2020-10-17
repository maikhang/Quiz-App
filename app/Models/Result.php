<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// use App\Models\Question;
// use App\Models\Answer;

class Result extends Model {
	protected $fillable = ['user_id', 'question_id', 'answer_id', 'quiz_id'];

	public function questions() {
		return $this->belongsTo('App\Models\Question');
	}

	public function answers() {
		return $this->belongsTo('App\Models\Answer');
	}

}
