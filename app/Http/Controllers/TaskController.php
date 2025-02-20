<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tugas;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function tugas()
    {
        $tasks = Tugas::where('user_id', Auth::id())->where('is_completed', false)->get();

        return view('home.tugas', compact('tasks'));
    }

    public function create_task()
    {
        return view('home.tugas');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date'
        ]);

        $validated['user_id'] = Auth::id();

        Tugas::create($validated);

        return redirect()->route('home.tugas')->with('success', 'Task created successfully!');
    }

    public function edit(Tugas $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function destroy($id)
    {
        $task = Tugas::findOrFail($id);
        $task->delete();

        return redirect()->route('home.tugas')->with('success', 'Tugas berhasil di hapus.');
    }

    public function update(Request $request, Tugas $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date'
        ]);

        $task->update($validated);

        return redirect()->route('home.tugas')->with('success', 'Task updated successfully!');
    }

    public function complete(Tugas $task)
    {
        $task->update([
            'is_completed' => true,
            'completed_at' => now()->format('Y-m-d H:i:s'), // Pastikan format waktu benar
        ]);

        return redirect()->route('home.tugas')->with('success', 'Task marked as completed!');
    }

    public function history_task()
    {
        $history = Tugas::where('user_id', Auth::id())->where('is_completed', true)->get();
        return view('home.history_task', compact('history'));
    }

}
