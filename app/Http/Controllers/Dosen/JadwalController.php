<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display jadwal for the authenticated dosen (read-only).
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $hari = $request->input('hari');

        $dosenNidn = auth()->user()->dosen?->nidn;

        if (!$dosenNidn) {
            abort(403, 'Data dosen tidak ditemukan.');
        }

        $jadwal = Jadwal::with(['matakuliah', 'dosen'])
            ->where('nidn', $dosenNidn)
            ->when($search, function ($q) use ($search) {
                $q->whereHas('matakuliah', fn($q2) => $q2->where('nama_matakuliah', 'like', "%{$search}%"))
                    ->orWhere('kelas', 'like', "%{$search}%");
            })
            ->when($hari, fn($q) => $q->where('hari', $hari))
            ->orderBy('hari')
            ->orderBy('jam')
            ->paginate(10)->withQueryString();

        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        return view('dosen.jadwal.index', compact('jadwal', 'search', 'hari', 'hariList'));
    }
}
