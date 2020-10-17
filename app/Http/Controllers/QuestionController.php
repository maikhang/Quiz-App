<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
// use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		// $questions = (new Question)->getQuestions();
		// $quizzes = (new Quiz)->allQuiz();
		// return view('backend.question.index', compact('questions', 'quizzes'));
		$questions = Question::all();
		return view('backend.question.index', compact('questions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('backend.question.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$data = $this->validateForm($request);

		$question = (new Question)->storeQuestion($data);
		$answers = (new Answer)->storeAnswer($data, $question);
		return redirect()->back()->with('message', 'Question Created Successfully');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$questions = (new Question)->getQuestionById($id);
		return view('backend.question.show', compact('questions'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$questions = (new Question)->getQuestionById($id);
		return view('backend.question.edit', compact('questions'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$data = $this->validateForm($request);

		$questions = (new Question)->updateQuestion($id, $request);
		$answers = (new Answer)->updateAnswer($request, $questions);
		return redirect()->back()->with('message', 'Question Updated Successfully!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		(new Answer)->deleteAnswer($id);
		(new Question)->deleteQuestion($id);
		return redirect(route('question.index'))->with('message', 'Question Deleted Successfully!');
	}

	public function destroyInQuiz($id) {
		(new Answer)->deleteAnswer($id);
		(new Question)->deleteQuestion($id);
		return redirect()->back()->with('message', 'Question Deleted Successfully!');
	}

	public function updateInQuiz(Request $request, $id) {
		$data = $this->validateForm($request);

		$questions = (new Question)->updateQuestion($id, $request);
		$answers = (new Answer)->updateAnswer($request, $questions);
		return redirect(route('quiz.question'))->with('message', 'Question Updated Successfully!');
	}

	public function validateForm($request) {
		return $this->validate($request, [
			'quiz' => 'required',
			'question' => 'required|min:3',
			'options' => 'bail|required|array|min:3',
			'options.*' => 'bail|required|string|distinct',
			'correct_answer' => 'required',
		]);
	}
}