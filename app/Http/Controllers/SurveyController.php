<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Jawaban;
use App\Models\Jurusan;
use App\Models\Kuisioner;
use App\Models\Responden;
use App\Models\Sekolah;
use App\Models\Survey;
use Illuminate\Http\Request;
use View;

class SurveyController extends Controller
{
    public function index(Request $request)
    {
        $sekolahs = Sekolah::all();
        $jurusans = Jurusan::all();
        $surveys = Survey::with('kuisioners.jawabans', 'kategories')->get();
        return view('survey.index', compact('surveys', 'sekolahs', 'jurusans'));
    }

    public function responden(Request $request)
    {
        // validasi
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'sekolah_id' => 'required|exists:sekolahs,id',
            'jurusan_id' => 'required|exists:jurusans,id',
        ]);

        // Save respondent data
        Responden::create([
            'user_id' => 1,
            'survey_id' => 1,
            'nama' => $data['nama'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'sekolah_id' => $data['sekolah_id'],
            'jurusan_id' => $data['jurusan_id'],
        ]);
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'sekolah_id' => 'required|exists:sekolahs,id',
            'jurusan_id' => 'required|exists:jurusans,id',
            'answers' => 'required|array',
            'answers.*' => 'required|exists:jawabans,id',
        ]);
        // validasi
        // $data = $request->validate([
        // ]);

        // Save respondent data
        Responden::create([
            'user_id' => 1,
            'survey_id' => 1,
            'nama' => $data['nama'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'sekolah_id' => $data['sekolah_id'],
            'jurusan_id' => $data['jurusan_id'],
        ]);
        // Save survey answers
        foreach ($data['answers'] as $kuisionerId => $jawabanId) {
            Hasil::create([
                'user_id' => 1,
                'survey_id' => 1,
                'kuisioner_id' => $kuisionerId,
                'responden_id' => 1,
                'jawaban_id' => $jawabanId,
            ]);
        }

        // return view('landing-page');
        return redirect()->route('home');
    }
}
