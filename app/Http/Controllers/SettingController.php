<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::orderBy('group')->orderBy('key')->get()->groupBy('group');
        return view('admin.setting.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'settings' => 'required|array',
        ]);

        foreach ($request->settings as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            
            if ($setting && $setting->type === 'image' && $request->hasFile("settings.{$key}")) {
                // Handle image upload
                if ($setting->value) {
                    Storage::disk('public')->delete($setting->value);
                }
                $value = $request->file("settings.{$key}")->store('settings', 'public');
            }

            Setting::set($key, $value);
        }

        Setting::clearCache();

        return redirect()->route('admin.setting.index')
            ->with('success', 'Pengaturan berhasil diperbarui');
    }
}
