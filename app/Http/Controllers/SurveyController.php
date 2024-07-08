<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Jawaban;
use App\Models\Kuisioner;
use App\Models\Survey;
use Illuminate\Http\Request;
use View;

class SurveyController extends Controller
{
    public function index()
    {
        $results = Kuisioner::with('jawabans')->get();
        $surveys = Survey::with('kuisioners.jawabans')->where('status', true)->get();
        return view('survey.index', compact('surveys','results'));
    }

    public function submit(Request $request, $surveyId)
    {
        $data = $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required|exists:jawabans,id',
        ]);

        foreach ($data['answers'] as $kuisionerId => $jawabanId) {
            Hasil::create([
                'survey_id' => $surveyId,
                'kuisioner_id' => $kuisionerId,
                'jawaban_id' => $jawabanId,
                'user_id' => auth()->id(),
            ]);
        }

        return redirect()->route('survey.showByStatus', 'your-status-here')->with('success', 'Jawaban berhasil disimpan.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
