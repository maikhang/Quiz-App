<?php

namespace App\Models;

use App\Models\Answer;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model {
	protected $fillable = ['question_id', 'answer', 'is_correct'];

	public function questions() {
		return $this->belongsTo('App\Models\Question', 'question_id', 'id');
	}

	public function storeAnswer($data, $questions) {
		foreach ($data['options'] as $key => $option) {
			$is_correct = false;
			if ($key == $data['correct_answer']) {
				$is_correct = true;
			}
			$answer = Answer::create([
				'question_id' => $questions->id,
				'answer' => $option,
				'is_correct' => $is_correct,
			]);
		}
	}

	public function updateAnswer($data, $questions) {
		$this->deleteAnswer($questions->id);
		$this->storeAnswer($data, $questions);
	}

	public function deleteAnswer($questionId) {
		Answer::where('question_id', $questionId)->delete();
	}
}
