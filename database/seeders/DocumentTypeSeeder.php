<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $request["type_code"] = "code 1";

        $request["type_description"] = [
            'ar' => "الوثيقه العامه",
            'en' => "general document"
        ];

        $request["document_code"] = "code 1";

        $request["document_description"] = [
            'ar' => "تفاصيل الوثيقه العامه",
            'en' => "general document description"
        ];
        create( Type::class , $request ) ;
    }
}
