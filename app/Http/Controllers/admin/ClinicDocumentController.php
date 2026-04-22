<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClinicDocument;
use Illuminate\Support\Facades\Storage;

class ClinicDocumentController extends Controller
{
    public function view(ClinicDocument $clinicDocument)
    {
        // default disk (local) -> storage/app
        abort_unless(Storage::exists($clinicDocument->path), 404);

        return Storage::response(
            $clinicDocument->path,
            $clinicDocument->original_name,
            ['Content-Type' => $clinicDocument->mime_type ?: Storage::mimeType($clinicDocument->path)]
        );
    }

    public function download(ClinicDocument $clinicDocument)
    {
        abort_unless(Storage::exists($clinicDocument->path), 404);

        return Storage::download($clinicDocument->path, $clinicDocument->original_name);
    }
}