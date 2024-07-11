<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::query()->truncate();
        $count = Language::withoutGlobalScopes()->get()->count();

        if ($count == 0) {
            echo "Qtde: " . $count . " Populating...";
            echo "\n";
            Language::create([
                'name' => 'English',
                'code' => 'en',
                'flag' => 'usa.png',
                'items' => []
            ]);

            Language::create([
                'name' => 'Português Brasileiro',
                'code' => 'pt_BR',
                'flag' => 'brazil.png',
                'items' => [
                    [
                        'key' => 'home',
                        'value' => 'início'
                    ]
                ]
            ]);
            // Language::create(['language' => 'Bulgarian', 'language_code' => 'bg']);
            // Language::create(['language' => 'Czech', 'language_code' => 'cs']);
            // Language::create(['language' => 'Danish', 'language_code' => 'da']);
            // Language::create(['language' => 'German', 'language_code' => 'de']);
            // Language::create(['language' => 'Greek', 'language_code' => 'el']);
            // Language::create(['language' => 'English', 'language_code' => 'en']);
            // Language::create(['language' => 'Spanish', 'language_code' => 'es']);
            // Language::create(['language' => 'Estonian', 'language_code' => 'et']);
            // Language::create(['language' => 'Finnish', 'language_code' => 'fi']);
            // Language::create(['language' => 'French', 'language_code' => 'fr']);
            // Language::create(['language' => 'Hungarian', 'language_code' => 'hu']);
            // Language::create(['language' => 'Italian', 'language_code' => 'it']);
            // Language::create(['language' => 'Japanese', 'language_code' => 'ja']);
            // Language::create(['language' => 'Lithuanian', 'language_code' => 'lt']);
            // Language::create(['language' => 'Latvian', 'language_code' => 'lv']);
            // Language::create(['language' => 'Dutch', 'language_code' => 'nl']);
            // Language::create(['language' => 'Polish', 'language_code' => 'pl']);
            // Language::create(['language' => 'Portuguese', 'language_code' => 'pt']);
            // Language::create(['language' => 'Romanian', 'language_code' => 'ro']);
            // Language::create(['language' => 'Russian', 'language_code' => 'ru']);
            // Language::create(['language' => 'Slovak', 'language_code' => 'sk']);
            // Language::create(['language' => 'Slovenian', 'language_code' => 'sl']);
            // Language::create(['language' => 'Swedish', 'language_code' => 'sv']);
            // Language::create(['language' => 'Chinese', 'language_code' => 'zh']);
            echo "Qtde: " . Language::withoutGlobalScopes()->get()->count() . " Populated...";

        } else {
            echo "Qtde: " . $count . " Records Inside Database!";
        }

    }
}
