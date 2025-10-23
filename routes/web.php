<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\RunningTextController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\ProgramController as AdminProgramController;
use App\Http\Controllers\Admin\AnnouncementController as AdminAnnouncementController;
use App\Http\Controllers\Admin\DownloadController as AdminDownloadController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Public\PostController;
use App\Http\Controllers\Public\GalleryController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\FaqController;
use App\Http\Controllers\Public\DownloadController;
use App\Http\Controllers\Public\ProgramController;
use App\Http\Controllers\Public\AnnouncementController;
use App\Http\Controllers\Public\TestimonialController;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public Routes
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Test TinyMCE (no auth required)
Route::get('/test-tinymce', function() {
    return view('admin.posts.test-create');
})->name('test-tinymce');


// Posts Routes
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');

// Gallery Routes
Route::get('/galleries', [GalleryController::class, 'index'])->name('galleries.index');
Route::get('/galleries/{slug}', [GalleryController::class, 'show'])->name('galleries.show');

// Contact Routes
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

// FAQ Routes
Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index');

// Download Routes
Route::get('/downloads', [DownloadController::class, 'index'])->name('downloads.index');
Route::get('/downloads/{id}/download', [DownloadController::class, 'download'])->name('downloads.download');

// Program Routes
Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/programs/{slug}', [ProgramController::class, 'show'])->name('programs.show');

// Announcement Routes
Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');
Route::get('/announcements/{slug}', [AnnouncementController::class, 'show'])->name('announcements.show');

// Testimonial Routes
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');

Auth::routes();

// Admin Routes
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Site Settings
    Route::resource('site-settings', SiteSettingController::class)->only(['index', 'update'])->names([
        'index' => 'admin.site-settings.index',
        'update' => 'admin.site-settings.update'
    ]);
    Route::post('site-settings/reset-theme', [SiteSettingController::class, 'resetTheme'])->name('admin.site-settings.reset-theme');
    
    // Image Upload
    Route::post('upload-image', [App\Http\Controllers\Admin\ImageUploadController::class, 'upload'])->name('upload-image');
    
    // Test TinyMCE
    Route::get('posts/test-create', function() {
        return view('admin.posts.test-create');
    })->name('posts.test-create');
    
    // Sliders
    Route::resource('sliders', SliderController::class)->names([
        'index' => 'admin.sliders.index',
        'create' => 'admin.sliders.create',
        'store' => 'admin.sliders.store',
        'show' => 'admin.sliders.show',
        'edit' => 'admin.sliders.edit',
        'update' => 'admin.sliders.update',
        'destroy' => 'admin.sliders.destroy'
    ]);
    
    // Running Texts
    Route::resource('running-texts', RunningTextController::class)->names([
        'index' => 'admin.running-texts.index',
        'create' => 'admin.running-texts.create',
        'store' => 'admin.running-texts.store',
        'show' => 'admin.running-texts.show',
        'edit' => 'admin.running-texts.edit',
        'update' => 'admin.running-texts.update',
        'destroy' => 'admin.running-texts.destroy'
    ]);
    
    // Menus
    Route::resource('menus', MenuController::class)->names([
        'index' => 'admin.menus.index',
        'create' => 'admin.menus.create',
        'store' => 'admin.menus.store',
        'show' => 'admin.menus.show',
        'edit' => 'admin.menus.edit',
        'update' => 'admin.menus.update',
        'destroy' => 'admin.menus.destroy'
    ]);
    
    // Pages
    Route::resource('pages', AdminPageController::class)->names([
        'index' => 'admin.pages.index',
        'create' => 'admin.pages.create',
        'store' => 'admin.pages.store',
        'show' => 'admin.pages.show',
        'edit' => 'admin.pages.edit',
        'update' => 'admin.pages.update',
        'destroy' => 'admin.pages.destroy'
    ]);
    
    // Categories
    Route::resource('categories', CategoryController::class)->names([
        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'show' => 'admin.categories.show',
        'edit' => 'admin.categories.edit',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy'
    ]);
    
    // Posts
    Route::resource('admin-posts', AdminPostController::class)->names([
        'index' => 'admin.admin-posts.index',
        'create' => 'admin.admin-posts.create',
        'store' => 'admin.admin-posts.store',
        'show' => 'admin.admin-posts.show',
        'edit' => 'admin.admin-posts.edit',
        'update' => 'admin.admin-posts.update',
        'destroy' => 'admin.admin-posts.destroy'
    ]);
    
    // Galleries
    Route::resource('galleries', AdminGalleryController::class)->names([
        'index' => 'admin.galleries.index',
        'create' => 'admin.galleries.create',
        'store' => 'admin.galleries.store',
        'show' => 'admin.galleries.show',
        'edit' => 'admin.galleries.edit',
        'update' => 'admin.galleries.update',
        'destroy' => 'admin.galleries.destroy'
    ]);
    
    // Programs
    Route::resource('admin-programs', AdminProgramController::class)->names([
        'index' => 'admin.admin-programs.index',
        'create' => 'admin.admin-programs.create',
        'store' => 'admin.admin-programs.store',
        'show' => 'admin.admin-programs.show',
        'edit' => 'admin.admin-programs.edit',
        'update' => 'admin.admin-programs.update',
        'destroy' => 'admin.admin-programs.destroy'
    ]);
    
    // Announcements
    Route::resource('announcements', AdminAnnouncementController::class)->names([
        'index' => 'admin.announcements.index',
        'create' => 'admin.announcements.create',
        'store' => 'admin.announcements.store',
        'show' => 'admin.announcements.show',
        'edit' => 'admin.announcements.edit',
        'update' => 'admin.announcements.update',
        'destroy' => 'admin.announcements.destroy'
    ]);
    
    // Downloads
    Route::resource('downloads', AdminDownloadController::class)->names([
        'index' => 'admin.downloads.index',
        'create' => 'admin.downloads.create',
        'store' => 'admin.downloads.store',
        'show' => 'admin.downloads.show',
        'edit' => 'admin.downloads.edit',
        'update' => 'admin.downloads.update',
        'destroy' => 'admin.downloads.destroy'
    ]);
    
    // Testimonials
    Route::resource('testimonials', AdminTestimonialController::class)->names([
        'index' => 'admin.testimonials.index',
        'create' => 'admin.testimonials.create',
        'store' => 'admin.testimonials.store',
        'show' => 'admin.testimonials.show',
        'edit' => 'admin.testimonials.edit',
        'update' => 'admin.testimonials.update',
        'destroy' => 'admin.testimonials.destroy'
    ]);
    
    // Statistics
    Route::resource('statistics', App\Http\Controllers\Admin\StatisticController::class)->names([
        'index' => 'admin.statistics.index',
        'create' => 'admin.statistics.create',
        'store' => 'admin.statistics.store',
        'show' => 'admin.statistics.show',
        'edit' => 'admin.statistics.edit',
        'update' => 'admin.statistics.update',
        'destroy' => 'admin.statistics.destroy'
    ]);
    
    // Features
    Route::resource('features', App\Http\Controllers\Admin\FeatureController::class)->names([
        'index' => 'admin.features.index',
        'create' => 'admin.features.create',
        'store' => 'admin.features.store',
        'show' => 'admin.features.show',
        'edit' => 'admin.features.edit',
        'update' => 'admin.features.update',
        'destroy' => 'admin.features.destroy'
    ]);
    
    // FAQs
    Route::resource('faqs', AdminFaqController::class)->names([
        'index' => 'admin.faqs.index',
        'create' => 'admin.faqs.create',
        'store' => 'admin.faqs.store',
        'show' => 'admin.faqs.show',
        'edit' => 'admin.faqs.edit',
        'update' => 'admin.faqs.update',
        'destroy' => 'admin.faqs.destroy'
    ]);
    
    // Contacts
    Route::resource('contacts', AdminContactController::class)->only(['index', 'show', 'destroy'])->names([
        'index' => 'admin.contacts.index',
        'show' => 'admin.contacts.show',
        'destroy' => 'admin.contacts.destroy'
    ]);
    Route::patch('contacts/{contact}/mark-read', [AdminContactController::class, 'markAsRead'])->name('admin.contacts.mark-read');
});

// Static Pages Routes (must be last to avoid conflicts)
Route::get('/{slug}', [PageController::class, 'show'])->name('pages.show');
