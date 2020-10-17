<?php

namespace App\Models;

use App\Models\Question;
// use App\Models\Quiz;
use Illuminate\Database\Eloquent\Model;

class Question extends Model {
	protected $fillable = ['question', 'quiz_id'];

	public function quizzes() {
		return $this->belongsTo('App\Models\Quiz', 'quiz_id', 'id');
	}

	public function answers() {
		return $this->hasMany('App\Models\Answer', 'question_id', 'id');
	}

	public function storeQuestion($data) {
		$data['quiz_id'] = $data['quiz'];
		return Question::create($data);
	}

	public function getQuestions() {
		// $quizzes = (new Quiz)->allQuiz();
		return Question::all();
		// return Question::orderBy('created_at', $this->order)->with('quizzes')->simplePaginate($this->limit);
	}

	public function getQuestionById($id) {
		return Question::find($id);
	}

	public function updateQuestion($id, $data) {
		$questions = Question::find($id);
		$questions->question = $data['question'];
		$questions->quiz_id = $data['quiz'];
		$questions->save();
		return $questions;
	}

	public function deleteQuestion($id) {
		return Question::where('id', $id)->delete();
	}
}

// $questions = App\Models\Question::find(38)
// echo  $questions->quizzes->id;