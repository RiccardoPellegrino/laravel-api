<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;
class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Front-end', 'Back-end', 'Full-stack'];
        foreach($types as $type){
            $new_types = new Type();
            $new_types->workflow = $type;
            $new_types->slug = $new_types->generateSlug($new_types->workflow);
            $new_types->save();
        }
    }
}
