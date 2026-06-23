<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;

class DashboardController extends Controller
{
    /**
     * Display the dosen dashboard.
     */
    public function index()
    {
        $dosenNidn = auth()->user()->dosen?->nidn;

        if (!$dosenNidn) {
            abort(403, 'Data dosen tidak ditemukan.');
        }

        $dosen = auth()->user()->dosen;
        $totalJadwal = Jadwal::where('nidn', $dosenNidn)->count();

        $hariIni = now()->format('l');
        $hariMapping = [
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
            'Sunday' => 'Minggu',
        ];
        $hariIndonesia = $hariMapping[$hariIni] ?? 'Senin';

        $jadwalHariIni = Jadwal::where('nidn', $dosenNidn)
            ->where('hari', $hariIndonesia)
            ->count();

        $jadwal = Jadwal::with(['matakuliah'])
            ->where('nidn', $dosenNidn)
            ->orderBy('hari')
            ->orderBy('jam')
            ->limit(5)
            ->get();

        return view('dosen.dashboard', compact('dosen', 'totalJadwal', 'jadwalHariIni', 'jadwal'));
    }
}
