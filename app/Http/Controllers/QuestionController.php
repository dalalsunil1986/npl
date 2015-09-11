<?php

namespace App\Http\Controllers;


use App\Src\Question\QuestionRepository;
use App\Src\Student\Student;
use App\Src\Subject\SubjectRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class QuestionController extends Controller
{
    /**
     * @var QuestionRepository
     */
    private $questionRepository;

    /**
     * @param QuestionRepository $questionRepository
     */
    public function __construct(QuestionRepository $questionRepository)
    {
        $this->middleware('auth');
        $this->questionRepository = $questionRepository;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $questions = $this->questionRepository->model->all();

        return view('modules.question.index', compact('questions'));
    }

    public function create(SubjectRepository $subjectRepository)
    {
        $subjects = $subjectRepository->model->lists('name_en', 'id');

        return view('modules.question.create', compact('subjects'));
    }


    /**
     * @param Request $request
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'subject_id' => 'integer|required',
            'body_en'    => 'required'
        ]);

        $user = Auth::user();

        if (!is_a($user->getType(), Student::class)) {
            return Redirect::back()->with('warning', 'Sorry You Cannot ask a Question');
        }

        $level = $user->levels->last();

        $question = $this->questionRepository->model->create(
            array_merge([
                'user_id'  => $user->id,
                'level_id' => $level->id
            ], $request->all())
        );

        return Redirect::action('StudentController@getQuestions')->with('success', 'Question posted');

    }
}
