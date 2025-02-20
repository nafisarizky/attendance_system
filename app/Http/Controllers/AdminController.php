<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use Carbon\Carbon;
use App\Models\User;
use App\Models\CheckIn;
use App\Models\CheckOut;
use App\Models\Informasi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    public function index()
    {
        $maleCount = User::where('gender', 'Male')->where('usertype', 'user')->count();
        $femaleCount = User::where('gender', 'Female')->where('usertype', 'user')->count();

        $dinasCount = Pengajuan::where('category', 'Dinas')->where('status', 'Pending')->count();
        $sakitCount = Pengajuan::where('category', 'Sakit')->where('status', 'Pending')->count();
        $izinCount = Pengajuan::where('category', 'Izin')->where('status', 'Pending')->count();

        return view('admin.index', compact('maleCount', 'femaleCount', 'dinasCount', 'sakitCount', 'izinCount'));
    }
    public function data_karyawan()
    {
        $karyawan = User::where('usertype', 'user')->paginate(5);;

        return view('admin.data_karyawan', compact('karyawan'));
    }

  public function karyawan_search(Request $request)
{
    $search = $request->search;
    $karyawan = User::where('name', 'LIKE', '%'.$search.'%')->where('usertype', 'user')->get();
    return view('admin.data_karyawan', compact('karyawan'));
}

    public function add_karyawan()
    {
        return view('admin.add_karyawan');
    }

    public function create()
    {
        return view('admin.add_karyawan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:15'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', 'string'],
            'address' => ['required', 'string'],
            'department' => ['required', 'string'],
            'position' => ['required', 'string'],
            'profile_photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:9048'],
            'password' => ['required', 'string', Rules\Password::defaults()],
        ]);

        // Simpan foto profil jika ada
        $profilePhotoPath = null;
        if ($request->hasFile('profile_photo')) {
            $profilePhotoPath = $request->file('profile_photo')->store('images', 'public');
        }

        // Buat user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'address' => $request->address,
            'department' => $request->department,
            'position' => $request->position,
            'profile_photo' => $profilePhotoPath,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('karyawan')->with('success', 'Karyawan berhasil ditambahkan!');
    }

    public function show($id)
    {
        // Ambil data karyawan berdasarkan ID
        $karyawan = User::findOrFail($id);

        return view('admin.detail_karyawan', compact('karyawan'));
    }

    public function destroy($id)
    {
        $karyawan = User::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawan')->with('success', 'Data karyawan berhasil dihapus.');
    }

    public function destroy_info($id)
    {
        $informasi = Informasi::findOrFail($id);
        $informasi->delete();

        return redirect()->route('view_informasi')->with('success', 'Info berhasil di hapus.');
    }

    public function data_pengajuan()
    {
        $pengajuan = Pengajuan::where('status', 'Pending')->get();

        return view('admin.data_pengajuan', compact('pengajuan'));
    }
    public function pengajuan_history()
{
    $pengajuan = Pengajuan::whereIn('status', ['Approved', 'Rejected'])
                          ->orderBy('updated_at', 'desc')
                          ->get();

    return view('admin.pengajuan_history', compact('pengajuan'));
}

    public function rekapAbsensi(Request $request)
{
    $filterType = $request->query('filter', 'today'); // Default: Hari ini
    $selectedDate = $request->query('date');
    $selectedMonth = $request->query('month');

    $queryCheckIns = CheckIn::with('user');
    $queryCheckOuts = CheckOut::with('user');

    switch ($filterType) {
        case 'today':
            $today = Carbon::today()->toDateString();
            $queryCheckIns->where('date', $today);
            $queryCheckOuts->where('date', $today);
            $displayDate = Carbon::today()->format('d-m-Y');
            break;

        case 'date':
            if ($selectedDate) {
                $queryCheckIns->where('date', $selectedDate);
                $queryCheckOuts->where('date', $selectedDate);
                $displayDate = Carbon::parse($selectedDate)->format('d-m-Y');
            } else {
                $displayDate = "Pilih tanggal";
            }
            break;

        case 'month':
            if ($selectedMonth) {
                $startOfMonth = Carbon::createFromFormat('Y-m', $selectedMonth)->startOfMonth();
                $endOfMonth = Carbon::createFromFormat('Y-m', $selectedMonth)->endOfMonth();
                $queryCheckIns->whereBetween('date', [$startOfMonth, $endOfMonth]);
                $queryCheckOuts->whereBetween('date', [$startOfMonth, $endOfMonth]);
                $displayDate = Carbon::parse($selectedMonth)->format('F Y');
            } else {
                $displayDate = "Pilih bulan";
            }
            break;

        case 'all':
            $displayDate = "Semua Data";
            break;

        default:
            $displayDate = "Tidak diketahui";
            break;
    }

    $checkIns = $queryCheckIns->get();
    $checkOuts = $queryCheckOuts->get();

    // Gabungkan check-in dan check-out berdasarkan user & tanggal
    $rekap = [];
    foreach ($checkIns as $checkIn) {
        $checkOut = $checkOuts->where('user_id', $checkIn->user_id)->where('date', $checkIn->date)->first();

        $rekap[] = [
            'name' => optional($checkIn->user)->name ?? 'Unknown',
            'date' => $checkIn->date,
            'check_in_time' => $checkIn->check_in_time,
            'check_out_time' => $checkOut->check_out_time ?? '-',
        ];
    }

    return view('admin.rekap_absen', compact('rekap', 'displayDate', 'filterType', 'selectedDate', 'selectedMonth'));
}

public function add_info()
{
    return view ('admin.add_info');
}

public function upload_info(Request $request)
{
    $info = new Informasi;

    $info->title = $request->title;
    $info->description = $request->description;

    $image = $request->image;

    if($image)
    {
        $imagename = time().'.'.$image->getClientOriginalExtension();

        $image->move(public_path('images'), $imagename);

        $info->image = $imagename;
    }

    $info->save();

    noty()->closeWith(['click', 'button'])->success('Informasi berhasil diupload.');

    return redirect()->back();
}

public function view_info()
{
    $info = Informasi::all();
    return view('admin.view_info', compact('info'));
}

public function update_info(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:9048',
    ]);

    $info = Informasi::find($request->id);
    if (!$info) {
        return redirect()->back()->with('error', 'Informasi tidak ditemukan');
    }

    $info->title = $request->title;
    $info->description = $request->description;

    if ($request->hasFile('image')) {
        if ($info->image) {
            Storage::delete('public/images/' . $info->image);
        }
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
        $info->image = $filename;
    }

    $info->save();

    return redirect()->back()->with('success', 'Informasi berhasil diperbarui');
}


}
