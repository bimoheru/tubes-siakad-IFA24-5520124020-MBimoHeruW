<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of jadwal.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $hari = $request->input('hari');

        $jadwal = Jadwal::with(['matakuliah', 'dosen'])
            ->when($search, function ($q) use ($search) {
                $q->whereHas('matakuliah', fn($q2) => $q2->where('nama_matakuliah', 'like', "%{$search}%"))
                    ->orWhereHas('dosen', fn($q2) => $q2->where('nama', 'like', "%{$search}%"))
                    ->orWhere('kelas', 'like', "%{$search}%");
            })
            ->when($hari, fn($q) => $q->where('hari', $hari))
            ->paginate(10)->withQueryString();

        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        return view('admin.jadwal.index', compact('jadwal', 'search', 'hari', 'hariList'));
    }

    /**
     * Show the form for creating a new jadwal.
     */
    public function create()
    {
        $matakuliah = MataKuliah::orderBy('nama_matakuliah')->get();
        $dosen = Dosen::orderBy('nama')->get();
        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        return view('admin.jadwal.create', compact('matakuliah', 'dosen', 'hariList'));
    }

    /**
     * Store a newly created jadwal.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_matakuliah' => ['required', 'string', 'exists:matakuliah,kode_matakuliah'],
            'nidn' => ['required', 'string', 'exists:dosen,nidn'],
            'kelas' => ['required', 'string', 'max:5'],
            'hari' => ['required', 'string', 'in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu'],
            'jam' => ['required', 'date_format:H:i'],
            'jam_selesai' => ['nullable', 'date_format:H:i'],
        ], [
            'kode_matakuliah.required' => 'Mata kuliah wajib dipilih.',
            'kode_matakuliah.exists' => 'Mata kuliah tidak terdaftar.',
            'nidn.required' => 'Dosen pengajar wajib dipilih.',
            'nidn.exists' => 'Dosen pengajar tidak terdaftar.',
            'kelas.required' => 'Kelas wajib diisi.',
            'kelas.max' => 'Kelas tidak boleh lebih dari 5 karakter (misal: A/B/C atau 1.1).',
            'hari.required' => 'Hari wajib dipilih.',
            'hari.in' => 'Hari pilihan tidak valid.',
            'jam.required' => 'Jam wajib diisi.',
            'jam.date_format' => 'Format jam mulai tidak valid (contoh format: HH:MM).',
            'jam_selesai.date_format' => 'Format jam selesai tidak valid (contoh format: HH:MM).',
        ]);

        Jadwal::create([
            'kode_matakuliah' => $request->kode_matakuliah,
            'nidn' => $request->nidn,
            'kelas' => strtoupper($request->kelas),
            'hari' => $request->hari,
            'jam' => '2024-01-01 ' . $request->jam . ':00',
            'jam_selesai' => $request->jam_selesai ? '2024-01-01 ' . $request->jam_selesai . ':00' : null,
        ]);

        return redirect()->route('admin.jadwal.index')
            ->with('success', 'Jadwal berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified jadwal.
     */
    public function edit(Jadwal $jadwal)
    {
        $matakuliah = MataKuliah::orderBy('nama_matakuliah')->get();
        $dosen = Dosen::orderBy('nama')->get();
        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        return view('admin.jadwal.edit', compact('jadwal', 'matakuliah', 'dosen', 'hariList'));
    }

    /**
     * Update the specified jadwal.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'kode_matakuliah' => ['required', 'string', 'exists:matakuliah,kode_matakuliah'],
            'nidn' => ['required', 'string', 'exists:dosen,nidn'],
            'kelas' => ['required', 'string', 'max:5'],
            'hari' => ['required', 'string', 'in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu'],
            'jam' => ['required', 'date_format:H:i'],
            'jam_selesai' => ['nullable', 'date_format:H:i'],
        ], [
            'kode_matakuliah.required' => 'Mata kuliah wajib dipilih.',
            'kode_matakuliah.exists' => 'Mata kuliah tidak terdaftar.',
            'nidn.required' => 'Dosen pengajar wajib dipilih.',
            'nidn.exists' => 'Dosen pengajar tidak terdaftar.',
            'kelas.required' => 'Kelas wajib diisi.',
            'kelas.max' => 'Kelas tidak boleh lebih dari 5 karakter (misal: A/B/C atau 1.1).',
            'hari.required' => 'Hari wajib dipilih.',
            'hari.in' => 'Hari pilihan tidak valid.',
            'jam.required' => 'Jam wajib diisi.',
            'jam.date_format' => 'Format jam mulai tidak valid (contoh format: HH:MM).',
            'jam_selesai.date_format' => 'Format jam selesai tidak valid (contoh format: HH:MM).',
        ]);

        $jadwal->update([
            'kode_matakuliah' => $request->kode_matakuliah,
            'nidn' => $request->nidn,
            'kelas' => strtoupper($request->kelas),
            'hari' => $request->hari,
            'jam' => '2024-01-01 ' . $request->jam . ':00',
            'jam_selesai' => $request->jam_selesai ? '2024-01-01 ' . $request->jam_selesai . ':00' : null,
        ]);

        return redirect()->route('admin.jadwal.index')
            ->with('success', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Remove the specified jadwal.
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()->route('admin.jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus.');
    }
}
