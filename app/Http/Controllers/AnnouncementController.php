<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of announcements.
     */
    public function index()
    {
        $announcements = Announcement::active()->current()->latest('start_date')->paginate(10);
        $priority_announcements = Announcement::active()->current()->priority()->latest('start_date')->limit(3)->get();
        
        return view('announcements.index', compact('announcements', 'priority_announcements'));
    }

    /**
     * Display the specified announcement.
     */
    public function show($id)
    {
        $announcement = Announcement::active()->current()->findOrFail($id);
        
        // Get related announcements
        $related_announcements = Announcement::active()
            ->current()
            ->where('id', '!=', $announcement->id)
            ->latest('start_date')
            ->limit(3)
            ->get();
        
        return view('announcements.show', compact('announcement', 'related_announcements'));
    }
}
