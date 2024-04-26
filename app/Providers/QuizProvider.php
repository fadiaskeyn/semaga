<?php

namespace App\Providers;


use App\Models\Quiz;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class QuizProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $offQuizzes = Quiz::where('status', 'off')
            ->where('quiz_date', now()->format('Y-m-d'))
            ->get();

        $offQuizzes->map(function($quiz){
            if($quiz->quizStart->lte(now()) && $quiz->quizEnd->gt(now()))
                $quiz->update(['status' => 'active']);
        });


        $activeQuizzes = Quiz::where('status', 'active')->get();
        $activeQuizzes->map(function($quiz){
            if($quiz->quizEnd->lt(now()))
                $quiz->update(['status' => 'off']);
        });
    }

    

}
