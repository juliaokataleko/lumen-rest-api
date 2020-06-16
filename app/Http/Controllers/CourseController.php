<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private $course;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    //
    public function index()
    {
        return $this->course->paginate(10);
    }

    public function show($course)
    {
        return $this->course->findOrFail($course);
    }

    public function store(Request $request)
    {
        # eturn $request->all();
        $this->course->create($request->all());
        // mensagem da criacao
        return response()
        ->json(['data' => [
            'message' => 'Curso criado com sucesso'
        ]]);
    }

    public function update($course)
    {
        $course = $this->course->findOrFail($course);
        $course->update(request()->all());

        // mensagem da actualização...
        return response()
        ->json(['data' => [
            'message' => 'Curso actualizado com sucesso',
            'course' => $course
        ]]);
    }

    public function destroy($course)
    {
        $course = $this->course->findOrFail($course);
        $course->delete();

        // mensagem da actualização...
        return response()
        ->json(['data' => [
            'message' => 'Curso excluido com sucesso'
        ]]);
    }
}
