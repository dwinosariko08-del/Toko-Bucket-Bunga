<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('abouts')->insert([
            'section_title' => 'About Us',
            'headline' => 'Why Choose Our Story Bucket',
            
            'item1_title' => 'Creative Content',
            'item1_desc' => 'Kami menyediakan konten kreatif yang menarik dan relevan untuk kebutuhan bisnis Anda.',
            
            'item2_title' => 'Professional Team',
            'item2_desc' => 'Tim kami terdiri dari kreator berpengalaman di bidang desain, video, dan digital marketing.',
            
            'item3_title' => 'Best Quality',
            'item3_desc' => 'Kami selalu memastikan kualitas terbaik dalam setiap proyek yang kami kerjakan.',
            
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}