<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DentistDocument;
use Illuminate\Support\Facades\Storage;

class DentistDocumentController extends Controller
{
    public function view(DentistDocument $dentistDocument)
    {
        abort_unless(Storage::exists($dentistDocument->path), 404);

        return Storage::response(
            $dentistDocument->path,
            $dentistDocument->original_name,
            ['Content-Type' => $dentistDocument->mime_type ?: Storage::mimeType($dentistDocument->path)]
        );
    }

    public function download(DentistDocument $dentistDocument)
    {
        abort_unless(Storage::exists($dentistDocument->path), 404);

        return Storage::download($dentistDocument->path, $dentistDocument->original_name);
    }
}
