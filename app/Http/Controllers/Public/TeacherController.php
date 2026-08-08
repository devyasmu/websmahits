<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\SiteSetting;
use App\Models\Menu;
use App\Models\RunningText;

class TeacherController extends Controller
{
    /**
     * Display a listing of teachers (Guru).
     */
    public function index(Request $request)
    {
        $siteSettings = SiteSetting::first();
        $menus = Menu::active()->ordered()->get();
        $runningTexts = RunningText::active()->ordered()->get();

        $query = Teacher::active();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('position', 'like', '%' . $request->search . '%')
                  ->orWhere('short_bio', 'like', '%' . $request->search . '%');
            });
        }

        $teachers = $query->ordered()->paginate(12);

        return view('public.teachers.index', compact('teachers', 'siteSettings', 'menus', 'runningTexts'));
    }
}
