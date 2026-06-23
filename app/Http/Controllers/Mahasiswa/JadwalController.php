<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display jadwal for mahasiswa based on their KRS.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $hari = $request->get('hari');
        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        // Get logged-in user's mahasiswa data
        $mahasiswa = Mahasiswa::where('user_id', auth()->id())->first();

        // Get kode_matakuliah from this mahasiswa's KRS
        $krsMatakuliah = $mahasiswa->krs()->pluck('kode_matakuliah')->toArray();

        $jadwal = Jadwal::with(['matakuliah', 'dosen'])
            ->whereIn('kode_matakuliah', $krsMatakuliah)
            ->when($search, function ($q) use ($search) {
                $q->whereHas('matakuliah', fn($q2) => $q2->where('nama_matakuliah', 'like', "%{$search}%"))
                    ->orWhereHas('dosen', fn($q2) => $q2->where('nama', 'like', "%{$search}%"))
                    ->orWhere('kelas', 'like', "%{$search}%");
            })
            ->when($hari, fn($q) => $q->where('hari', $hari))
            ->paginate(10)->withQueryString();

        return view('mahasiswa.jadwal.index', compact('jadwal', 'search', 'hari', 'hariList'));
    }
}
