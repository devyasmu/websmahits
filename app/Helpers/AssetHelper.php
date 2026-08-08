<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class AssetHelper
{
    /**
     * Get safe asset URL with fallback.
     * Menggunakan file_exists() agar tidak memicu Storage/Flysystem yang butuh ekstensi PHP fileinfo (finfo).
     * Mendukung symlink dan direct path untuk kompatibilitas cPanel.
     */
    public static function safeAsset($path, $fallback = null)
    {
        try {
            if (empty($path)) {
                return $fallback;
            }

            $fullPath = storage_path('app/public/' . $path);
            
            // Cek apakah file benar-benar ada di storage/app/public
            if (!is_file($fullPath)) {
                \Log::warning("Asset file not found: {$fullPath}");
                return $fallback;
            }

            // Cek apakah public/storage ada (symlink atau directory)
            $publicStoragePath = public_path('storage');
            $publicFile = public_path('storage/' . $path);
            
            // Jika file juga ada di public/storage (symlink atau copy), gunakan itu
            if (is_file($publicFile)) {
                return asset('storage/' . $path);
            }
            
            // Jika public/storage ada tapi file belum ada di sana
            if (is_link($publicStoragePath) || is_dir($publicStoragePath)) {
                // Symlink/directory ada, tapi file belum ada - tetap return URL
                // File mungkin baru di-upload dan belum terlihat via symlink
                return asset('storage/' . $path);
            }
            
            // Jika public/storage tidak ada sama sekali
            \Log::warning("Storage symlink/directory not found at: {$publicStoragePath}. Please run: php artisan storage:link");
            return $fallback;
        } catch (\Exception $e) {
            \Log::warning("Asset generation failed for path: {$path}. Error: " . $e->getMessage());
            return $fallback;
        }
    }

    /**
     * Get safe asset URL with default placeholder
     */
    public static function safeAssetWithPlaceholder($path, $placeholder = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHg9IjUwIiB5PSI1MCIgZm9udC1mYW1pbHk9IkFyaWFsIiBmb250LXNpemU9IjE0IiBmaWxsPSIjOTk5IiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iLjNlbSI+Tm8gSW1hZ2U8L3RleHQ+PC9zdmc+')
    {
        return self::safeAsset($path, $placeholder);
    }

    /**
     * Check if asset exists.
     * Menggunakan is_file() agar tidak memicu Storage/Flysystem yang butuh ekstensi PHP fileinfo (finfo).
     */
    public static function assetExists($path)
    {
        try {
            if (empty($path)) {
                return false;
            }

            $fullPath = storage_path('app/public/' . $path);
            return is_file($fullPath);
        } catch (\Exception $e) {
            \Log::warning("Asset existence check failed for path: {$path}. Error: " . $e->getMessage());
            return false;
        }
    }
}
