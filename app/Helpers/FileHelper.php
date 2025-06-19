<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class FileHelper
{
    public static function getImageFilesForCharacter(string $characterName, string $typeFolder): array
    {
        $directory = "public/assets/characters/{$characterName}/{$typeFolder}";

        if (!Storage::exists($directory)) {
            return [];
        }

        $files = Storage::files($directory);

        return collect($files)->map(fn ($filePath) => basename($filePath))->toArray();
    }
}
