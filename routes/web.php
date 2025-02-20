<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PengajuanController;

Route::get('/', function () {
    return view('home.index');
});

// Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('history', [HomeController::class, 'history'])->name('history');
    Route::get('pengajuan', [PengajuanController::class, 'index'])->name('home.pengajuan');
    Route::get('information', [HomeController::class, 'information'])->name('information');
    Route::get('/information/{id}', [HomeController::class, 'show_info']);
    Route::post('/submissions', [PengajuanController::class, 'store'])->name('pengajuan.store');
    Route::get('/submissions/create', [PengajuanController::class, 'create'])->name('pengajuan.create');
    Route::get('history_pengajuan', [PengajuanController::class, 'history_pengajuan'])->name('history_pengajuan');
    Route::get('tugas', [TaskController::class, 'tugas'])->name('home.tugas');
    Route::delete('tugas/{id}', [TaskController::class, 'destroy'])->name('hapus_tugas');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('history_task', [TaskController::class, 'history_task'])->name('history_task');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
    Route::post('/check-in', [HomeController::class, 'checkIn'])->name('check-in');
    Route::post('/check-out', [HomeController::class, 'checkOut'])->name('check-out');
    Route::get('home/profile_details', [HomeController::class, 'profile_details'])->name('home.profile');
    Route::get('edit_profile/{id}', [HomeController::class, 'edit_profile'])->name('edit_profile');
    Route::post('update_profile/{id}', [HomeController::class, 'update_profile'])->name('update_profile');
});

Route::middleware('auth', 'admin')->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index']);
    Route::get('admin/add_karyawan', [AdminController::class, 'add_karyawan'])->name('addKaryawan');
    Route::get('/admin/karyawan/create', [AdminController::class, 'create'])->name('admin.karyawan.create');
    Route::post('/admin/karyawan/store', [AdminController::class, 'store'])->name('admin.karyawan.store');
    Route::get('admin/data_karyawan', [AdminController::class, 'data_karyawan'])->name('karyawan');
    Route::get('karyawan_search', [AdminController::class, 'karyawan_search']);
    // Route::get('rekap_search', [AdminController::class, 'rekap_search']);
    Route::get('admin/rekap_absen', [AdminController::class, 'rekapAbsensi'])->name('rekap');
    Route::get('admin/data_pengajuan', [AdminController::class, 'data_pengajuan'])->name('pengajuan');
    Route::get('admin/pengajuan_history', [AdminController::class, 'pengajuan_history'])->name('pengajuan_history');
    Route::patch('/admin/submissions/{submission}/{status}', [PengajuanController::class, 'updateStatus'])->name('admin.submissions.updateStatus');
    Route::get('admin/data_karyawan/{id}', [AdminController::class, 'show'])->name('detail_karyawan');
    Route::delete('admin/data_karyawan/{id}', [AdminController::class, 'destroy'])->name('hapus_karyawan');
    Route::delete('admin/view_informasi/{id}', [AdminController::class, 'destroy_info'])->name('hapus_informasi');
    Route::get('admin/add_informasi', [AdminController::class, 'add_info'])->name('tambah_informasi');
    Route::get('admin/view_informasi', [AdminController::class, 'view_info'])->name('view_informasi');
    Route::get('edit_info/{id}', [AdminController::class, 'edit_info'])->name('edit_info');
    Route::post('upload_informasi', [AdminController::class, 'upload_info'])->name('upload_info');
    Route::post('/admin/update_info', [AdminController::class, 'update_info'])->name('admin.update_info');

});

require __DIR__.'/auth.php';
