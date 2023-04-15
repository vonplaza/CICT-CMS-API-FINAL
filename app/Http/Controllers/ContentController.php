<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ContentController extends Controller
{
    public function getContent()
    {
        return  response()->json(Content::find(1));
    }

    public function updateContent(Request $request)
    {
        $fields = $request->validate([
            'logo' => 'sometimes|required|image|mimes:png,jpg,jpeg',
            'is_dark_mode_active' => 'required',
            'title_text' => 'required'
        ]);

        $file = $request->file('logo');
        if ($file) {
            $fileName = time() . '-' . $file->getClientOriginalName();
            Storage::putFileAs('content', $file, $fileName);
            $fields['logo_path'] = $fileName;
        }

        // $fields['is_dark_mode_active'] = $fields['is_dark_mode_active'] == '1' ? true : false;
        $content = Content::find(1);
        $content->update($fields);


        return response()->json($content);
    }

    public function getLogo(Request $request, string $logo)
    {
        $filePath = storage_path('app/content/' . $logo);

        if (!file_exists($filePath)) {
            return response()->json(['message' => 'image not found'], 404);
        }

        $fileContents = file_get_contents($filePath);

        return response($fileContents)
            ->header('Content-Type', 'image/jpeg');
    }
}
