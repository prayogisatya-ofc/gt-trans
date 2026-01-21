<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DriverApp;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DriverAuthController extends Controller
{
    public function auth(Request $request)
    {
        $request->validate([
            'pin' => ['required', 'digits:6'],
        ]);

        $pinHash = SiteSetting::getByKey('driver_scan_pin_hash');
        if (!$pinHash) {
            return response()->json([
                'message' => 'PIN belum diatur.'
            ], 500);
        }

        $ok = Hash::check($request->pin, $pinHash);
        if (!$ok) {
            return response()->json([
                'message' => 'PIN salah.'
            ], 401);
        }

        $driverApp = DriverApp::query()->firstOrCreate([
            'name' => 'gttrans-driver',
        ]);

        $token = $driverApp->createToken('driver-app')->plainTextToken;

        return response()->json([
            'token' => $token,
            'message' => 'Berhasil login driver.',
        ]);
    }
}
