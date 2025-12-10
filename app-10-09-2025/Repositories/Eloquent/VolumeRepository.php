<?php

namespace App\Repositories\Eloquent;

use App\Models\Volume;
use App\Repositories\Contracts\VolumeRepositoryInterface;

class VolumeRepository implements VolumeRepositoryInterface
{
    public function index()
    {
        return Volume::orderByDesc('id')->paginate(50);
    }

    public function create(array $data)
    {
        return Volume::create([
            'number'        => $data['number'] ?? '',
            'year'        => $data['year'] ?? '',
            'image'        => $data['image'] ?? '',
            'index_file'        => $data['index_file'] ?? '',
            'document_path'        => $data['document_path'] ?? '',
            'document_name'        => $data['document_name'] ?? '',
            'document_size'        => $data['document_size'] ?? '',
            'document_mimetype'    => $data['document_mimetype'] ?? '',
            'status'                => 1,
        ]);
    }

    public function find($id)
    {
        return Volume::find($id);
    }

    public function update($id, array $data)
    {
        $package = Volume::findOrFail($id);

        $package->update([
            'number'        => $data['number'] ?? $package->number,
            'year'        => $data['year'] ?? $package->year,
            'image'        => $data['image'] ?? $package->image,
            'index_file'        => $data['index_file'] ?? $package->index_file,
            'status'                => 1,
        ]);

        return true;
    }

    public function delete($id)
    {
        $package = Volume::findOrFail($id);
        return $package->delete();
    }

    public function restore($id)
    {
        $package = Volume::onlyTrashed()->findOrFail($id);
        return $package->restore();
    }

    public function forceDelete($id)
    {
        $package = Volume::onlyTrashed()->findOrFail($id);
        return $package->forceDelete();
    }
}
