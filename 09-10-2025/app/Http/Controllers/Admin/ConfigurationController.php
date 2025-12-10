<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Services\ConfigurationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class ConfigurationController extends BaseController
{
    protected ConfigurationService $service;

    public function __construct(ConfigurationService $service)
    {
        $this->service = $service;
    }

    public function edit()
    {
        $config = $this->service->get();
        return view('admin.configuration.edit', compact('config'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'logo' => 'nullable|image|max:2048',
            'favicon' => 'nullable|image|max:512',
            'white_label_name' => 'nullable|string|max:255',
            'white_label_url' => 'nullable|url',
            'website' => 'nullable|url',
            'address' => 'nullable|string|max:255',
            'about' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        // File upload
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }
        if ($request->hasFile('favicon')) {
            $data['favicon'] = $request->file('favicon')->store('favicons', 'public');
        }

        $this->service->update($data);

        return redirect()->back()->with('success', 'Configuration updated successfully.');
    }
}
