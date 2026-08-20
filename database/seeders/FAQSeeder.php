<?php

namespace Database\Seeders;

use App\Models\FAQ;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        Faq::create([
            'category' => 'general',
            'question' => 'What is BuddyTalks?',
            'answer' => 'BuddyTalks is a platform that helps you meet new people who share your interests. Whether you want to find a hiking buddy, gaming partner, or someone to chat with, BuddyTalks helps you connect with your tribe.',
        ]);

        Faq::create([
            'category' => 'general',
            'question' => 'How does BuddyTalks work?',
            'answer' => 'Simply create a profile, share your interests, and discover people who have things in common with you. From there, you can start a conversation and see where the connection takes you.',
        ]);

        Faq::create([
            'category' => 'general',
            'question' => 'Is this platform free?',
            'answer' => 'Yes, the platform is completely free to use. Premium features may be added in the future.',
        ]);

        Faq::create([
            'category' => 'data',
            'question' => 'What personal information does BuddyTalks collect?',
            'answer' => 'BuddyTalks may collect information such as your name, email address, profile details, interests, and information you choose to share while using the platform.',
        ]);

        Faq::create([
            'category' => 'data',
            'question' => 'Does BuddyTalks sell my personal data?',
            'answer' => 'No. BuddyTalks does not sell your personal information to third parties.',
        ]);

        Faq::create([
            'category' => 'data',
            'question' => 'Can I delete my account and personal data?',
            'answer' => 'Yes. You can request to delete your account and associated personal information, subject to any information we may be required to retain for legal, security, or legitimate business purposes.',
        ]);

        Faq::create([
            'category' => 'safe',
            'question' => 'How can I stay safe when talking to someone new?',
            'answer' => 'Take your time getting to know people and trust your instincts. Avoid sharing sensitive information such as your home address, passwords, financial details, or other private information.',
        ]);

        Faq::create([
            'category' => 'safe',
            'question' => 'Is it safe to meet someone I connected with in person?',
            'answer' => 'If you decide to meet someone, take precautions. Meet in a busy public place, tell a friend or family member where you\'re going, arrange your own transportation, and consider keeping your first meeting relatively short.',
        ]);

        Faq::create([
            'category' => 'technical',
            'question' => 'What should I do if the website doesn\'t load on my home network?',
            'answer' => 'Contact your Internet Service Provider (company that supplies your network) and kindly ask if there are any technical issues on their end.',
        ]);
    }
}