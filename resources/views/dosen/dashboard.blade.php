@extends('layouts.siakad')
@section('title', 'Dashboard Dosen')
@section('page-title', 'Dashboard')

@section('content')
    <div class="page-header">
        <h1>Selamat Datang, {{ auth()->user()->name }}!</h1>
        <p style="color:var(--text-muted); margin-top:.5rem">Dosen - {{ $dosen->nama ?? '-' }}</p>
    </div>

    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:1.5rem; margin-bottom:2rem">
        <div class="card">
            <div class="card-body" style="text-align:center; padding:2rem">
                <div style="font-size:2.5rem; font-weight:bold; color:var(--primary)">{{ $totalJadwal }}</div>
                <div style="color:var(--text-muted); margin-top:.5rem">Total Jadwal Mengajar</div>
            </div>
        </div>
        <div class="card">
            <div class="card-body" style="text-align:center; padding:2rem">
                <div style="font-size:2.5rem; font-weight:bold; color:var(--success)">{{ $jadwalHariIni }}</div>
                <div style="color:var(--text-muted); margin-top:.5rem">Jadwal Hari Ini</div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2 class="card-title"><i class="bi bi-calendar3"></i> Jadwal Mengajar Saya</h2>
            <a href="{{ route('dosen.jadwal.index') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-eye-fill"></i> Lihat Semua
            </a>
        </div>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mata Kuliah</th>
                        <th>Kelas</th>
                        <th>Hari</th>
                        <th>Jam</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jadwal ?? [] as $j)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div style="font-weight:600">{{ $j->matakuliah->nama_matakuliah ?? '-' }}</div>
                                <div style="font-size:.75rem; color:var(--text-muted)">{{ $j->kode_matakuliah }}</div>
                            </td>
                            <td><span class="badge badge-purple">{{ $j->kelas }}</span></td>
                            <td><span class="badge badge-blue">{{ $j->hari }}</span></td>
                            <td style="font-weight:600">{{ $j->jam?->format('H:i') }} -
                                {{ $j->jam_selesai?->format('H:i') ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align:center; color:var(--text-muted); padding:2rem">Belum ada
                                jadwal mengajar</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
