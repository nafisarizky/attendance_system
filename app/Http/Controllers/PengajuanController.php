<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    // Halaman form pengajuan
    public function create()
    {
        return view('pengajuan.create');
    }

    // Menyimpan pengajuan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|in:Dinas,Sakit,Izin',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'reason' => 'nullable|string',
            'proof' => 'nullable|file|mimes:jpeg,png,pdf|max:9048',
        ]);

        $proofPath = null;
        if ($request->hasFile('proof')) {
            $proofPath = $request->file('proof')->store('proofs', 'public');
        }

        Pengajuan::create([
            'user_id' => Auth::id(),
            'category' => $validated['category'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'reason' => $validated['reason'],
            'proof' => $proofPath,
        ]);

        return redirect()->route('home.pengajuan')->with('success', 'Pengajuan berhasil dibuat!');
    }

    // Halaman daftar pengajuan (pending)
    public function index()
    {
        $pengajuan = Pengajuan::where('user_id', Auth::id())
                                 ->where('status', 'Pending')
                                 ->get();

        return view('home.pengajuan', compact('pengajuan'));
    }

    // Halaman riwayat pengajuan
    public function history_pengajuan()
    {
        $pengajuan = Pengajuan::where('user_id', Auth::id())
                                 ->whereIn('status', ['Approved', 'Rejected'])
                                 ->get();

        return view('home.history_pengajuan', compact('pengajuan'));
    }

    public function updateStatus($submissionId, $status)
{
    if (!in_array($status, ['Approved', 'Rejected'])) {
        return redirect()->back()->with('error', 'Status tidak valid.');
    }

    $pengajuan = Pengajuan::find($submissionId);
    if (!$pengajuan) {
        return redirect()->back()->with('error', 'Pengajuan tidak ditemukan.');
    }

    $pengajuan->update(['status' => $status]);

    return redirect()->back()->with('success', 'Status pengajuan berhasil diperbarui.');
}

}
