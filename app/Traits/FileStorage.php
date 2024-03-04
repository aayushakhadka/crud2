<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait FileStorage
{
    public function storeFile($path, $file)
    {
        $name = Str::slug(Carbon::now()) . '.' . $file->getClientOriginalExtension();
        Storage::disk('public')->putFileAs($path, $file, $name);
        return $name;
    }

    public function getFile($path, $name)
    {
        return Storage::disk('public')->url($path . '/' . $name);
    }

    public function destroyFile($path, $name)
    {
        return Storage::disk('public')->delete($path . '/' . $name);
    }
}
