<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::ordered()->latest()->get();
        return view('admin.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'position' => ['nullable', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:5120'],
            'short_bio' => ['nullable', 'string'],
            'is_active' => ['nullable'],
            'order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data = [
            'name' => $validated['name'],
            'position' => $validated['position'] ?? null,
            'short_bio' => $validated['short_bio'] ?? null,
            'is_active' => $request->boolean('is_active', true),
            'order' => (int) ($validated['order'] ?? Teacher::max('order') + 1),
        ];

        if ($request->hasFile('photo')) {
            $uploadDir = public_path('storage/teachers');
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $file = $request->file('photo');
            $name = $file->hashName();
            $file->move($uploadDir, $name);
            $data['photo'] = 'teachers/' . $name;
        }

        Teacher::create($data);

        return redirect()->route('admin.teachers.index')
            ->with('success', 'Guru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        return redirect()->route('admin.teachers.edit', $teacher);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('admin.teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'position' => ['nullable', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:5120'],
            'short_bio' => ['nullable', 'string'],
            'is_active' => ['nullable'],
            'order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data = [
            'name' => $validated['name'],
            'position' => $validated['position'] ?? null,
            'short_bio' => $validated['short_bio'] ?? null,
            'is_active' => $request->boolean('is_active', true),
            'order' => (int) ($validated['order'] ?? $teacher->order),
        ];

        if ($request->hasFile('photo')) {
            $uploadDir = public_path('storage/teachers');
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            if ($teacher->photo) {
                $oldPath = public_path('storage/' . $teacher->photo);
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
            }
            $file = $request->file('photo');
            $name = $file->hashName();
            $file->move($uploadDir, $name);
            $data['photo'] = 'teachers/' . $name;
        }

        $teacher->update($data);

        return redirect()->route('admin.teachers.index')
            ->with('success', 'Guru berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        if ($teacher->photo) {
            $oldPath = public_path('storage/' . $teacher->photo);
            if (file_exists($oldPath)) {
                @unlink($oldPath);
            }
        }
        $teacher->delete();

        return redirect()->route('admin.teachers.index')
            ->with('success', 'Guru berhasil dihapus.');
    }
}
