<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'posts' => \App\Models\Post::count(),
            'published_posts' => \App\Models\Post::published()->count(),
            'categories' => \App\Models\Category::count(),
            'galleries' => \App\Models\Gallery::count(),
            'programs' => \App\Models\Program::count(),
            'announcements' => \App\Models\Announcement::count(),
            'downloads' => \App\Models\Download::count(),
            'testimonials' => \App\Models\Testimonial::count(),
            'faqs' => \App\Models\Faq::count(),
            'unread_contacts' => \App\Models\Contact::unread()->count(),
        ];

        $recent_posts = \App\Models\Post::with('category', 'user')
            ->latest()
            ->limit(5)
            ->get();

        $recent_contacts = \App\Models\Contact::latest()
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_posts', 'recent_contacts'));
    }
}
