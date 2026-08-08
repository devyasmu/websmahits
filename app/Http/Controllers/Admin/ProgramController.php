<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::latest()->get();
        return view('admin.programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.programs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        return redirect()->route('admin.admin-programs.edit', $program);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        return view('admin.programs.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'featured_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:5120'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'duration' => ['nullable', 'string', 'max:255'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'is_featured' => ['nullable'],
            'is_active' => ['nullable'],
        ]);

        $slug = Str::slug($validated['title']);
        if (Program::where('slug', $slug)->where('id', '!=', $program->id)->exists()) {
            $slug = $slug . '-' . $program->id;
        }

        $data = [
            'title' => $validated['title'],
            'slug' => $slug,
            'excerpt' => $validated['excerpt'] ?? null,
            'content' => $validated['content'],
            'price' => $validated['price'] ?? null,
            'duration' => $validated['duration'] ?? null,
            'is_featured' => $request->boolean('is_featured'),
            'is_active' => $request->boolean('is_active'),
        ];

        if ($request->hasFile('featured_image')) {
            $uploadDir = public_path('storage/programs');
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            if ($program->featured_image) {
                $oldPath = public_path('storage/' . $program->featured_image);
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
                $oldStoragePath = storage_path('app/public/' . $program->featured_image);
                if (file_exists($oldStoragePath)) {
                    @unlink($oldStoragePath);
                }
            }
            $file = $request->file('featured_image');
            $name = $file->hashName();
            $file->move($uploadDir, $name);
            $data['featured_image'] = 'programs/' . $name;
        }

        $program->update($data);

        return redirect()->route('admin.admin-programs.index')
            ->with('success', 'Program berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(\App\Models\Program $program)
    {
        $program->delete();
        return redirect()->route('admin.programs.index')
            ->with('success', 'Program berhasil dihapus.');
    }
}
