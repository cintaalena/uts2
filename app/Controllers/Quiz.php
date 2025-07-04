<?php

namespace App\Controllers;

class Quiz extends BaseController
{
    public function level1()
    {
        // Cek apakah user sudah login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        // Soal level 1 dalam bentuk array
        $questionsLevel1 = [
            ['question' => 'Apa ibu SDLC?', 'id' => 'q1'],
            ['question' => 'Apa tujuan dari secure coding?', 'id' => 'q2'],
            ['question' => 'Sebutkan salah satu ancaman yang ada dalam SDLC!', 'id' => 'q3'],
            ['question' => 'Apa itu Secure SDLC?', 'id' => 'q4'],
            ['question' => 'Apa yang dimaksud dengan threat modeling?', 'id' => 'q5']
        ];

        return view('quiz/level1', ['questions' => $questionsLevel1]);
    }

    public function level2()
    {
        // Cek apakah user sudah login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        // Soal level 2 dalam bentuk array
        $questionsLevel2 = [
            ['question' => 'Sebutkan dua model ancaman dalam SDLC!', 'id' => 'q6'],
            ['question' => 'Apa yang dimaksud dengan Secure Testing?', 'id' => 'q7'],
            ['question' => 'Apa itu penetration testing?', 'id' => 'q8'],
            ['question' => 'Mengapa SDLC harus mencakup fase keamanan sejak awal?', 'id' => 'q9'],
            ['question' => 'Apa yang dimaksud dengan Zero Trust Architecture?', 'id' => 'q10']
        ];

        return view('quiz/level2', ['questions' => $questionsLevel2]);
    }

    public function submitLevel1()
    {
        // Ambil jawaban level 1
        $answers = [
            $this->request->getPost('q1'),
            $this->request->getPost('q2'),
            $this->request->getPost('q3'),
            $this->request->getPost('q4'),
            $this->request->getPost('q5'),
        ];

        // Jawaban yang benar untuk level 1
        $correctAnswers = ['satu', 'dua', 'tiga', 'empat', 'lima'];
        $correctCount = 0;

        foreach ($answers as $index => $answer) {
            if ($answer === $correctAnswers[$index]) {
                $correctCount++;
            }
        }

        // Jika semua jawaban benar, lanjutkan ke level 2
        if ($correctCount === 5) {
            return redirect()->to('/quiz/level2');
        }

        return redirect()->to('/quiz/level1')->with('error', 'Beberapa jawaban Anda salah. Coba lagi!');
    }

    public function submitLevel2()
    {
        // Ambil jawaban level 2
        $answers = [
            $this->request->getPost('q6'),
            $this->request->getPost('q7'),
            $this->request->getPost('q8'),
            $this->request->getPost('q9'),
            $this->request->getPost('q10'),
        ];

        // Jawaban yang benar untuk level 2
        $correctAnswers = ['enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh'];
        $correctCount = 0;

        foreach ($answers as $index => $answer) {
            if ($answer === $correctAnswers[$index]) {
                $correctCount++;
            }
        }

        // Jika semua jawaban benar, tampilkan halaman ucapan selamat
        if ($correctCount === 5) {
            return redirect()->to('/quiz/success');
        }

        return redirect()->to('/quiz/level2')->with('error', 'Beberapa jawaban Anda salah. Coba lagi!');
    }

    public function success()
    {
        // Cek apakah user sudah login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        return view('quiz/success');
    }
}
