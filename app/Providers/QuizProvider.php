<?php

namespace App\Providers;

use App\Models\Quiz;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class QuizProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Register any application services.
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Listen for the 'migrate' command to finish
        Event::listen('Illuminate\Console\Events\CommandFinished', function ($event) {
            if ($event->command === 'migrate' && $event->exitCode === 0) {
                $this->runQuizProviderLogic();
            }
        });
    }

    /**
     * The logic to run after migrations.
     */
    protected function runQuizProviderLogic(): void
    {
        // Your existing logic to activate or deactivate quizzes
        $offQuizzes = Quiz::where('status', 'off')
            ->where('quiz_date', now()->format('Y-m-d'))
            ->get();

        $offQuizzes->each(function ($quiz) {
            if ($quiz->quizStart->lte(now()) && $quiz->quizEnd->gt(now())) {
                $quiz->update(['status' => 'active']);
            }
        });

        $activeQuizzes = Quiz::where('status', 'active')->get();
        $activeQuizzes->each(function ($quiz) {
            if ($quiz->quizEnd->lt(now())) {
                $quiz->update(['status' => 'off']);
            }
        });
    }
}
