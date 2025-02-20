<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CheckIn;
use App\Models\CheckOut;
use App\Models\Tugas;
use App\Models\Informasi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $today = Carbon::now('Asia/Jakarta')->toDateString();
        $userId = Auth::id();

        $checkIn = CheckIn::where('user_id', $userId)->whereDate('date', $today)->first();
        $checkOut = CheckOut::where('user_id', $userId)->whereDate('date', $today)->first();

        return view('home.dashboard', compact('checkIn', 'checkOut', 'user'));
    }

    public function checkIn(Request $request)
    {
        $userId = Auth::id();
        $today = Carbon::now('Asia/Jakarta')->toDateString();
        $currentTime = Carbon::now('Asia/Jakarta');

        $existingCheckIn = CheckIn::where('user_id', $userId)->whereDate('date', $today)->first();

        if ($existingCheckIn) {
            return redirect()->back()->with('error', 'Kamu sudah melakukan check-in hari ini!');
        }

        CheckIn::create([
            'user_id' => $userId,
            'date' => $today,
            'check_in_time' => $currentTime,
        ]);

        return redirect()->back()->with('success', 'Check-in berhasil!');
    }

    public function checkOut(Request $request)
    {
        $userId = Auth::id();
        $today = Carbon::now('Asia/Jakarta')->toDateString();
        $currentTime = Carbon::now('Asia/Jakarta');

        $existingCheckOut = CheckOut::where('user_id', $userId)->whereDate('date', $today)->first();

        if ($existingCheckOut) {
            return redirect()->back()->with('error', 'Kamu sudah melakukan check-out hari ini!');
        }

        if ($currentTime->format('H:i') < '16:00') {
            return redirect()->back()->with('error', 'Check-out belum dibuka, silakan kembali setelah jam 16:00!');
        }

        CheckOut::create([
            'user_id' => $userId,
            'date' => $today,
            'check_out_time' => $currentTime,
        ]);

        return redirect()->back()->with('success', 'Check-out berhasil!');
    }

    public function profile_details()
    {
        $user = Auth::user();
        return view('home.profile_details', compact('user'));
    }

    public function edit_profile($id)
    {
    $data = User::find($id);
    $user = Auth::user();
    return view('home.edit_profile', compact('data', 'user'));
    }

    public function update_profile(Request $request, $id)
{
    $user = User::find($id);

    $request->validate([
    'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi file gambar
    'name' => 'required|string|max:255',
    'date_of_birth' => 'required|date',
    'phone' => 'required|string|max:15', // Validasi regex untuk nomor telepon
    'gender' => 'required|in:Male,Female',
    'address' => 'nullable|string',
    ]);

    $user->name = $request->name;
    $user->date_of_birth = $request->date_of_birth;
    $user->phone = $request->phone;
    $user->gender = $request->gender;
    $user->address = $request->address;

    // Update foto profil jika ada file baru yang diunggah
    if ($request->hasFile('profile_photo')) {
        $file = $request->file('profile_photo');
        // Simpan foto di storage/app/public dengan nama file unik
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/images', $filename); // Simpan di subfolder public/profile_photos
        $user->profile_photo = 'images/' . $filename;
    }

    $user->save();

    return redirect()->route('home.profile')->with('success', 'Profile updated successfully!');

}

    public function pengajuan()
    {
        return view('home.pengajuan');
    }

    public function history(Request $request)
{
    $userId = Auth::id();
    $filterType = $request->query('filter', 'today');
    $selectedDate = $request->query('date');
    $selectedMonth = $request->query('month');

    $queryCheckIns = CheckIn::where('user_id', $userId);
    $queryCheckOuts = CheckOut::where('user_id', $userId);

    switch ($filterType) {
        case 'today':
            $today = Carbon::today()->toDateString();
            $queryCheckIns->where('date', $today);
            $queryCheckOuts->where('date', $today);
            break;
        case 'date':
            if ($selectedDate) {
                $queryCheckIns->where('date', $selectedDate);
                $queryCheckOuts->where('date', $selectedDate);
            }
            break;
        case 'month':
            if ($selectedMonth) {
                $startOfMonth = Carbon::createFromFormat('Y-m', $selectedMonth)->startOfMonth();
                $endOfMonth = Carbon::createFromFormat('Y-m', $selectedMonth)->endOfMonth();
                $queryCheckIns->whereBetween('date', [$startOfMonth, $endOfMonth]);
                $queryCheckOuts->whereBetween('date', [$startOfMonth, $endOfMonth]);
            }
            break;
        case 'all':
            // Tidak ada filter, mengambil semua data
            break;
    }

    $checkIns = $queryCheckIns->get();
    $checkOuts = $queryCheckOuts->get();

    // Gabungkan check-in dan check-out berdasarkan tanggal
    $history = [];
    foreach ($checkIns as $checkIn) {
        $checkOut = $checkOuts->firstWhere('date', $checkIn->date);
        $history[] = [
            'date' => $checkIn->date,
            'day' => Carbon::parse($checkIn->date)->isoFormat('dddd'),
            'check_in_time' => $checkIn->check_in_time,
            'check_out_time' => $checkOut->check_out_time ?? '-',
        ];
    }

    return view('home.history', compact('history', 'filterType', 'selectedDate', 'selectedMonth'));
}

public function information()
{
    $informasi = Informasi::all();
    return view('home.information', compact('informasi'));
}

public function show_info($id)
{
    $info = Informasi::find($id);
    return view('home.detail_info', compact('info'));
}

}
