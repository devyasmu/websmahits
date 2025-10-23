<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\SiteSetting;
use App\Models\Menu;
use App\Models\RunningText;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of programs.
     */
    public function index()
    {
        $programs = Program::active()->ordered()->paginate(9);
        $featured_programs = Program::active()->featured()->ordered()->limit(3)->get();
        
        // Load data for layout
        $siteSettings = SiteSetting::first();
        $menus = Menu::where('is_active', true)->orderBy('order')->get();
        $runningTexts = RunningText::where('is_active', true)->orderBy('order')->get();
        
        return view('public.programs.index', compact('programs', 'featured_programs', 'siteSettings', 'menus', 'runningTexts'));
    }

    /**
     * Display the specified program.
     */
    public function show($slug)
    {
        $program = Program::active()->where('slug', $slug)->firstOrFail();
        
        // Get related programs
        $related_programs = Program::active()
            ->where('id', '!=', $program->id)
            ->ordered()
            ->limit(3)
            ->get();
        
        // Load data for layout
        $siteSettings = SiteSetting::first();
        $menus = Menu::where('is_active', true)->orderBy('order')->get();
        $runningTexts = RunningText::where('is_active', true)->orderBy('order')->get();
        
        return view('public.programs.show', compact('program', 'related_programs', 'siteSettings', 'menus', 'runningTexts'));
    }
}
