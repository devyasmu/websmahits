<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\Slider;
use App\Models\RunningText;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Program;
use App\Models\Announcement;
use App\Models\Testimonial;
use App\Models\Statistic;
use App\Models\Feature;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     */
    public function index()
    {
        $siteSettings = SiteSetting::first();
        $sliders = Slider::active()->ordered()->get();
        $runningTexts = RunningText::active()->ordered()->get();
        $menus = Menu::active()->ordered()->get();
        
        // Paginated sections
        $featuredPosts = Post::published()->featured()->with('category')->latest()->paginate(6, ['*'], 'posts_page');
        $recentPosts = Post::published()->with('category')->latest()->paginate(4, ['*'], 'recent_page');
        $featuredPrograms = Program::active()->featured()->ordered()->paginate(6, ['*'], 'programs_page');
        $announcements = Announcement::active()->current()->latest()->paginate(5, ['*'], 'announcements_page');
        $testimonials = Testimonial::active()->featured()->ordered()->paginate(6, ['*'], 'testimonials_page');
        
        // New sections
        $statistics = Statistic::active()->ordered()->get();
        $features = Feature::active()->ordered()->get();

        return view('home', compact(
            'siteSettings',
            'sliders', 
            'runningTexts',
            'menus',
            'featuredPosts',
            'recentPosts',
            'featuredPrograms',
            'announcements',
            'testimonials',
            'statistics',
            'features'
        ));
    }
}
