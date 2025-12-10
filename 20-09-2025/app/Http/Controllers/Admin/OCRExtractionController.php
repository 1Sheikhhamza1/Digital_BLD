<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OCRExtractionRequest;
use App\Http\Requests\OCRExtractionUpdateRequest;
use App\Services\CommonService;
use App\Services\OCRExtractionService;
use Illuminate\Http\Request;
use App\Jobs\ProcessOCRExtraction;
use App\Models\OCRExtraction;
use Illuminate\Support\Facades\DB;
use Laravel\Reverb\Loggers\Log;

class OCRExtractionController extends Controller
{
    protected OCRExtractionService $ocrExtractionService;
    protected CommonService $commonService;

    public function __construct(OCRExtractionService $ocrExtractionService, CommonService $commonService)
    {
        $this->ocrExtractionService = $ocrExtractionService;
        $this->commonService = $commonService;
    }

    /* public function index()
    {
        $ocr_extractions = $this->ocrExtractionService->index();
        $volumeList = $this->commonService->getVolume();
        return view('admin.ocr_extractions.index', compact('ocr_extractions','volumeList'));
    } */

    public function index(Request $request)
    {
        $filters = [
            'case_no'        => $request->get('case_no'),
            'parties'        => $request->get('parties'),
            'division'       => $request->get('division'),
            'volume_id'      => $request->get('volume_id'),
            'published_year' => $request->get('published_year'),
            'judgename'      => $request->get('judgename'),
        ];

        $ocr_extractions = $this->ocrExtractionService->index($filters);
        $volumeList = $this->commonService->getVolume();

        return view('admin.ocr_extractions.index', compact('ocr_extractions', 'volumeList', 'filters'));
    }



    public function create()
    {
        $volumeList = $this->commonService->getVolume();
        return view('admin.ocr_extractions.create', compact('volumeList'));
    }

    public function store(OCRExtractionUpdateRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('index_file') && $request->file('index_file')->isValid()) {
            $pdfFile = $request->file('index_file');
            $fileName = uniqid('volume_') . '.' . $pdfFile->getClientOriginalExtension();
            $destinationPath = public_path('uploads/volume/pdfs');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $pdfFile->move($destinationPath, $fileName);
            $validated['index_file'] = $fileName;
        }

        // dd($validated);
        $this->ocrExtractionService->create($validated);

        // Redirect back to the list with success message
        return redirect()->route('ocr_extractions.index')
            ->with('success', 'OCRExtraction created successfully.');
    }

    /* 
    public function store(OCRExtractionRequest $request)
    {
        $file = $request->file('document');
        $path = $file->store('documents');
        $extension = $file->getClientOriginalExtension();

        ProcessOCRExtraction::dispatch(1, $path, $extension);

        return redirect()->route('ocr_extractions.index')
            ->with('success', 'File uploaded successfully! OCR is processing in the background.');
    } */

    public function show($id)
    {
        $ocrExtraction = $this->ocrExtractionService->find($id);
        return view('admin.ocr_extractions.show', compact('ocrExtraction'));
    }

    public function edit($id)
    {
        $ocrExtraction = $this->ocrExtractionService->find($id);
        $volumeList = $this->commonService->getVolume();
        return view('admin.ocr_extractions.edit', compact('ocrExtraction', 'volumeList'));
    }

    public function update(OCRExtractionUpdateRequest $request, $id)
    {
        $validated = $request->validated();

        if ($request->hasFile('index_file') && $request->file('index_file')->isValid()) {
            $pdfFile = $request->file('index_file');
            $fileName = uniqid('volume_') . '.' . $pdfFile->getClientOriginalExtension();
            $destinationPath = public_path('uploads/volume/pdfs');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $pdfFile->move($destinationPath, $fileName);
            $validated['index_file'] = $fileName;
        }

        $this->ocrExtractionService->update($id, $validated);
        return redirect()->route('ocr_extractions.index')->with('success', 'OCRExtraction updated successfully.');
    }

    public function destroy($id)
    {
        $this->ocrExtractionService->delete($id);
        return redirect()->route('ocr_extractions.index')->with('success', 'OCRExtraction soft deleted.');
    }

    public function restore($id)
    {
        $this->ocrExtractionService->restore($id);
        return redirect()->route('ocr_extractions.index')->with('success', 'OCRExtraction restored successfully.');
    }

    public function forceDelete($id)
    {
        $this->ocrExtractionService->forceDelete($id);
        return redirect()->route('ocr_extractions.index')->with('success', 'OCRExtraction permanently deleted.');
    }
}
