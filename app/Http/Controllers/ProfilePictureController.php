<?php
namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ProfilePictureController
{
    public function UploadImage(string $path)
    {
        $file = Storage::files('public/profile_pictures')->firstMatching($path);

        if ($file) {
            return Storage::response('public/profile_pictures/' . $path, 200, [
                'Content-Type' => 'image/' . pathinfo($path, PATHINFO_EXTENSION),
                'Cache-Control' => 'private, max-age=3600',
            ]);
        }

        return response('Image not found', 404);
    }
}
?>