<?php

namespace App\Http\Controllers;

use App\Services\TextbookService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class TextbookController extends Controller
{
    public function __construct(
        protected TextbookService $service
    ) {}

    public function index(): View
    {
        $textbooks = $this->service->getAll();

        return view('app.textbooks.index', compact('textbooks'));
    }

    public function download(int $id): BinaryFileResponse
    {
        $textbook = $this->service->getAndIncrementDownloaded($id);

        return response()->download(
            storage_path('app/public/' . $textbook->file));
    }
}
