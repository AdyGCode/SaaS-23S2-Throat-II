<?php

namespace Database\Seeders;

use App\Models\Word;
use App\Models\WordType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Logger\ConsoleLogger;
use function PHPUnit\Framework\isNull;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedWords = [
            [
                'word' => 'IBM',
                'definition' => 'International Business Machines',
                'word_type' => 'Initialism',
            ],
                    [
                'word' => 'laser',
                'definition' => 'Light Amplification by Stimulated Emission of Radiation',
                'word_type' => 'Acronym',
            ],

                    [
                'word' => 'MoSCoW',
                'definition' => "Must Have, Should Have, Could Have, Won't Have",
                'word_type' => 'Acronym',
            ],

            [
                'word'=>'THROAT',
                'definition'=>"The Huge Resource Of Acronyms and Terms",
                'word_type'=>'backronym',
            ],
        ];

        foreach ($seedWords as $seedWord) {
            $wordType = WordType::whereName($seedWord['word_type'])->first();

            if(isNull($wordType)){
                $this->command->line("Word type not found: {$seedWord['word_type']}",'error');
            }else {
                $seedWord['word_type_id'] = $wordType->id;
                unset($seedWord['word_type']);
                Word::create($seedWord);
            }
        }
    }
}
