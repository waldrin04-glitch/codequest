<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Choice;
use App\Models\User;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find a faculty user to associate the quizzes with
        $faculty = User::where('role', 'faculty')->first();

        if (!$faculty) {
            $faculty = User::factory()->create(['role' => 'faculty']);
        }

        // Quiz 1: Basics of HTML
        $quiz1 = Quiz::create([
            'user_id' => $faculty->id,
            'title' => 'Basics of HTML',
            'description' => 'Test your knowledge on the fundamental concepts of HTML.',
            'time_limit' => 30, // minutes
            'status' => 'published',
        ]);

        $question1_1 = Question::create([
            'quiz_id' => $quiz1->id,
            'content' => 'What does HTML stand for?',
            'type' => 'multiple_choice',
            'points' => 10,
        ]);

        Choice::create(['question_id' => $question1_1->id, 'content' => 'Hyper Text Markup Language', 'is_correct' => true]);
        Choice::create(['question_id' => $question1_1->id, 'content' => 'Hyperlinks and Text Markup Language', 'is_correct' => false]);
        Choice::create(['question_id' => $question1_1->id, 'content' => 'Home Tool Markup Language', 'is_correct' => false]);
        Choice::create(['question_id' => $question1_1->id, 'content' => 'Hyperlinking Text Marking Language', 'is_correct' => false]);

        $question1_2 = Question::create([
            'quiz_id' => $quiz1->id,
            'content' => 'Which HTML tag is used to define an internal style sheet?',
            'type' => 'multiple_choice',
            'points' => 10,
        ]);

        Choice::create(['question_id' => $question1_2->id, 'content' => '<style>', 'is_correct' => true]);
        Choice::create(['question_id' => $question1_2->id, 'content' => '<script>', 'is_correct' => false]);
        Choice::create(['question_id' => $question1_2->id, 'content' => '<css>', 'is_correct' => false]);
        Choice::create(['question_id' => $question1_2->id, 'content' => '<link>', 'is_correct' => false]);


        // Quiz 2: Basics of CSS
        $quiz2 = Quiz::create([
            'user_id' => $faculty->id,
            'title' => 'Basics of CSS',
            'description' => 'Assess your understanding of the basic principles of CSS.',
            'time_limit' => 45, // minutes
            'status' => 'published',
        ]);

        $question2_1 = Question::create([
            'quiz_id' => $quiz2->id,
            'content' => 'What does CSS stand for?',
            'type' => 'multiple_choice',
            'points' => 10,
        ]);

        Choice::create(['question_id' => $question2_1->id, 'content' => 'Cascading Style Sheets', 'is_correct' => true]);
        Choice::create(['question_id' => $question2_1->id, 'content' => 'Creative Style Sheets', 'is_correct' => false]);
        Choice::create(['question_id' => $question2_1->id, 'content' => 'Computer Style Sheets', 'is_correct' => false]);
        Choice::create(['question_id' => $question2_1->id, 'content' => 'Colorful Style Sheets', 'is_correct' => false]);

        $question2_2 = Question::create([
            'quiz_id' => $quiz2->id,
            'content' => 'Which property is used to change the background color?',
            'type' => 'multiple_choice',
            'points' => 10,
        ]);

        Choice::create(['question_id' => $question2_2->id, 'content' => 'background-color', 'is_correct' => true]);
        Choice::create(['question_id' => $question2_2->id, 'content' => 'color', 'is_correct' => false]);
        Choice::create(['question_id' => $question2_2->id, 'content' => 'bgcolor', 'is_correct' => false]);
        Choice::create(['question_id' => $question2_2->id, 'content' => 'background', 'is_correct' => false]);

        // Quiz 3: Basics of JavaScript
        $quiz3 = Quiz::create([
            'user_id' => $faculty->id,
            'title' => 'Basics of JavaScript',
            'description' => 'Explore fundamental concepts of JavaScript programming.',
            'time_limit' => 60, // minutes
            'status' => 'published',
        ]);

        $question3_1 = Question::create([
            'quiz_id' => $quiz3->id,
            'content' => 'Inside which HTML element do we put the JavaScript?',
            'type' => 'multiple_choice',
            'points' => 10,
        ]);

        Choice::create(['question_id' => $question3_1->id, 'content' => '<script>', 'is_correct' => true]);
        Choice::create(['question_id' => $question3_1->id, 'content' => '<javascript>', 'is_correct' => false]);
        Choice::create(['question_id' => $question3_1->id, 'content' => '<js>', 'is_correct' => false]);
        Choice::create(['question_id' => $question3_1->id, 'content' => '<scripting>', 'is_correct' => false]);

        $question3_2 = Question::create([
            'quiz_id' => $quiz3->id,
            'content' => 'How do you write "Hello World" in an alert box?',
            'type' => 'multiple_choice',
            'points' => 10,
        ]);

        Choice::create(['question_id' => $question3_2->id, 'content' => 'alert("Hello World");', 'is_correct' => true]);
        Choice::create(['question_id' => $question3_2->id, 'content' => 'msg("Hello World");', 'is_correct' => false]);
        Choice::create(['question_id' => $question3_2->id, 'content' => 'alertBox("Hello World");', 'is_correct' => false]);
        Choice::create(['question_id' => $question3_2->id, 'content' => 'msgBox("Hello World");', 'is_correct' => false]);
    }
}
