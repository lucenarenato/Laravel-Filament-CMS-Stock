<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    public function run()
    {
        $media = [
            [
                'model_type' => 'App\\Models\\Category',
                'model_id' => 1,
                'uuid' => 'd85a4c1f-78f4-446a-88a4-4470a279815d',
                'collection_name' => 'default',
                'name' => 'Prumada-Individual-GN',
                'file_name' => 'XSsYR9FWWA3LjZMbPLjUApKbETwNsn-metaUHJ1bWFkYS1JbmRpdmlkdWFsLUdOLmpwZw==-.webp',
                'mime_type' => 'image/webp',
                'disk' => 'public',
                'conversions_disk' => 'public',
                'size' => 19374,
                'manipulations' => json_encode([]),
                'custom_properties' => json_encode([]),
                'generated_conversions' => json_encode([]),
                'responsive_images' => json_encode([]),
                'order_column' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'model_type' => 'App\\Models\\Product',
                'model_id' => 1,
                'uuid' => 'e3b3e72a-3e07-440e-a952-b82088d29c6a',
                'collection_name' => 'default',
                'name' => 'conexoes-pex-01',
                'file_name' => '6ucU6kRQSp9uQKQ0ssct1Vl2czNOu5-metaY29uZXhvZXMtcGV4LTAxLmpwZw==-.webp',
                'mime_type' => 'image/webp',
                'disk' => 'public',
                'conversions_disk' => 'public',
                'size' => 6688,
                'manipulations' => json_encode([]),
                'custom_properties' => json_encode([]),
                'generated_conversions' => json_encode([]),
                'responsive_images' => json_encode([]),
                'order_column' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'model_type' => 'App\\Models\\Product',
                'model_id' => 2,
                'uuid' => '8e0926d4-4684-43b1-9da2-79946fff2e09',
                'collection_name' => 'default',
                'name' => '4603055220_1SZ',
                'file_name' => 'uuPplwB4WBF9OjynnPnu6a0xs9ucPi-metaNDYwMzA1NTIyMF8xU1oud2VicA==-.webp',
                'mime_type' => 'image/webp',
                'disk' => 'public',
                'conversions_disk' => 'public',
                'size' => 62942,
                'manipulations' => json_encode([]),
                'custom_properties' => json_encode([]),
                'generated_conversions' => json_encode([]),
                'responsive_images' => json_encode([]),
                'order_column' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($media as $m) {
            Media::create($m);
        }
    }
}
