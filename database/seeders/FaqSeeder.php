<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Faq::create([
            'question' => 'How do I create an account on this website?',
            'answer' => 'Click on the "Sign Up" button at the top right of the homepage and fill in the required information. You’ll receive a confirmation email to activate your account.',
            'tagList' => implode(', ', [
                'account'
            ]),
        ]);

        Faq::create([
            'question' => 'I forgot my password. How can I reset it?',
            'answer' => 'On the login page, click “Forgot Password?” and enter your registered email address. We’ll send you instructions to reset your password.',
            'tagList' => implode(', ', [
                'account'
            ]),
        ]);
        Faq::create([
            'question' => 'How can I update my profile information?',
            'answer' => 'After logging in, go to your profile page by clicking your display name. Here, you can edit your personal details and save the changes.',
            'tagList' => implode(', ', [
                'account'
            ]),
        ]);
        Faq::create([
            'question' => 'Where can I find the latest news and updates?',
            'answer' => 'The latest news and updates are always featured on the homepage and in the “News” section, accessible from the main menu.',
            'tagList' => implode(', ', [
                'news'
            ]),
        ]);
        Faq::create([
            'question' => 'How do I post a question or start a discussion in the forum?',
            'answer' => 'Navigate to the “Forum” section, choose the relevant category, and click “New Topic” to start your discussion or ask a question.',
            'tagList' => implode(', ', [
                'forum'
            ]),
        ]);
        Faq::create([
            'question' => 'Who can I contact if I have technical issues?',
            'answer' => 'If you experience any technical problems, please use the “Contact” page to send us a message. Our support team will get back to you as soon as possible.',
            'tagList' => implode(', ', [
                'contact'
            ]),
        ]);
        Faq::create([
            'question' => 'Can I suggest a new FAQ question?',
            'answer' => 'Yes! At the bottom of the FAQ page, you’ll find a form where you can submit your own questions for consideration.',
            'tagList' => implode(', ', [
                'faq'
            ]),
        ]);
        Faq::create([
            'question' => 'How do I book or order a service through the website?',
            'answer' => 'Visit the “Bookings” section, select the service you’re interested in, and follow the on-screen instructions to complete your booking.',
            'tagList' => implode(', ', ['service']),
        ]);
    }
}
