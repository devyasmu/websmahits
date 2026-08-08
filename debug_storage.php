<?php
/**
 * Debug script untuk memeriksa masalah storage
 * Jalankan dengan: php debug_storage.php
 */

require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Storage;

echo "=== DEBUG STORAGE ===\n\n";

// 1. Cek SiteSetting data
echo "1. SiteSetting Data:\n";
try {
    $siteSetting = SiteSetting::first();
    if ($siteSetting) {
        echo "   ID: " . $siteSetting->id . "\n";
        echo "   Logo: " . ($siteSetting->logo ?? 'NULL') . "\n";
        echo "   Favicon: " . ($siteSetting->favicon ?? 'NULL') . "\n";
    } else {
        echo "   No SiteSetting found!\n";
    }
} catch (Exception $e) {
    echo "   Error: " . $e->getMessage() . "\n";
}

echo "\n";

// 2. Cek storage disk
echo "2. Storage Disk Check:\n";
try {
    $disk = Storage::disk('public');
    echo "   Disk: public\n";
    echo "   Exists: " . ($disk->exists('.') ? 'YES' : 'NO') . "\n";
} catch (Exception $e) {
    echo "   Error: " . $e->getMessage() . "\n";
}

echo "\n";

// 3. Cek file logo
echo "3. Logo File Check:\n";
if ($siteSetting && $siteSetting->logo) {
    try {
        $logoPath = $siteSetting->logo;
        echo "   Path: " . $logoPath . "\n";
        echo "   Exists: " . (Storage::disk('public')->exists($logoPath) ? 'YES' : 'NO') . "\n";
        
        if (Storage::disk('public')->exists($logoPath)) {
            $fullPath = Storage::disk('public')->path($logoPath);
            echo "   Full Path: " . $fullPath . "\n";
            echo "   File Size: " . filesize($fullPath) . " bytes\n";
            echo "   Readable: " . (is_readable($fullPath) ? 'YES' : 'NO') . "\n";
        }
        
        $assetUrl = asset('storage/' . $logoPath);
        echo "   Asset URL: " . $assetUrl . "\n";
    } catch (Exception $e) {
        echo "   Error: " . $e->getMessage() . "\n";
    }
} else {
    echo "   No logo data\n";
}

echo "\n";

// 4. Cek file favicon
echo "4. Favicon File Check:\n";
if ($siteSetting && $siteSetting->favicon) {
    try {
        $faviconPath = $siteSetting->favicon;
        echo "   Path: " . $faviconPath . "\n";
        echo "   Exists: " . (Storage::disk('public')->exists($faviconPath) ? 'YES' : 'NO') . "\n";
        
        if (Storage::disk('public')->exists($faviconPath)) {
            $fullPath = Storage::disk('public')->path($faviconPath);
            echo "   Full Path: " . $fullPath . "\n";
            echo "   File Size: " . filesize($fullPath) . " bytes\n";
            echo "   Readable: " . (is_readable($fullPath) ? 'YES' : 'NO') . "\n";
        }
        
        $assetUrl = asset('storage/' . $faviconPath);
        echo "   Asset URL: " . $assetUrl . "\n";
    } catch (Exception $e) {
        echo "   Error: " . $e->getMessage() . "\n";
    }
} else {
    echo "   No favicon data\n";
}

echo "\n";

// 5. Cek symbolic link
echo "5. Symbolic Link Check:\n";
$publicStoragePath = public_path('storage');
echo "   Public Storage Path: " . $publicStoragePath . "\n";
echo "   Exists: " . (file_exists($publicStoragePath) ? 'YES' : 'NO') . "\n";
echo "   Is Link: " . (is_link($publicStoragePath) ? 'YES' : 'NO') . "\n";

if (is_link($publicStoragePath)) {
    echo "   Link Target: " . readlink($publicStoragePath) . "\n";
    echo "   Target Exists: " . (file_exists(readlink($publicStoragePath)) ? 'YES' : 'NO') . "\n";
}

echo "\n";

// 6. Cek permission
echo "6. Permission Check:\n";
$storagePath = storage_path('app/public');
echo "   Storage Path: " . $storagePath . "\n";
echo "   Exists: " . (file_exists($storagePath) ? 'YES' : 'NO') . "\n";
echo "   Readable: " . (is_readable($storagePath) ? 'YES' : 'NO') . "\n";
echo "   Writable: " . (is_writable($storagePath) ? 'YES' : 'NO') . "\n";

if (file_exists($storagePath)) {
    echo "   Permission: " . substr(sprintf('%o', fileperms($storagePath)), -4) . "\n";
}

echo "\n=== END DEBUG ===\n";
