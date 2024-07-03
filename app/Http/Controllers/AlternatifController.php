<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();
        $nilaiWP = $this->calculateWP($alternatifs, $kriterias);

        return view('layouts/content', compact('nilaiWP'));
    }

    public function showAll()
    {
        $alternatifs = Alternatif::all();
        return view('layouts/index', compact('alternatifs'));
    }

    private function calculateWP($alternatifs, $kriterias)
    {
        $hasil = [];
    
        // Hitung total bobot absolut
        $totalBobot = $kriterias->sum(function($kriteria) {
            return abs($kriteria->bobot);
        });
    
        // Normalisasi bobot
        $normalized_weights = $kriterias->mapWithKeys(function($kriteria) use ($totalBobot) {
            return [$kriteria->nama_kriteria => $kriteria->bobot / $totalBobot];
        });
    
        foreach ($alternatifs as $alternatif) {
            $nilai = 1;
    
            foreach ($normalized_weights as $nama_kriteria => $normalized_bobot) {
                $nilai_kriteria = $alternatif->{$nama_kriteria};
    
                if (in_array($nama_kriteria, ['harga', 'ping'])) {
                    // Jika kriterianya adalah 'harga' atau 'ping', anggap sebagai biaya
                    $nilai *= pow($nilai_kriteria, -$normalized_bobot);
                } else {
                    // Jika tidak, anggap sebagai keuntungan
                    $nilai *= pow($nilai_kriteria, $normalized_bobot);
                }
            }
    
            $hasil[] = [
                'alternatif' => $alternatif->nama,
                'harga' => $alternatif->harga,
                'cpu' => $alternatif->cpu,
                'ram' => $alternatif->ram,
                'storage' => $alternatif->storage,
                'ping' => $alternatif->ping,
                'backup' => $alternatif->backup,
                'nilai_wp' => $nilai
            ];
        }
    
        // Hitung total nilai WP
        $total_nilai_wp = array_sum(array_column($hasil, 'nilai_wp'));
    
        // Hitung hasil akhir dengan membagi nilai WP dengan total nilai WP
        $final_hasil = array_map(function($item) use ($total_nilai_wp) {
            $item['hasil'] = round($item['nilai_wp'] / $total_nilai_wp, 4);
            return $item;
        }, $hasil);
    
        // Urutkan hasil dalam urutan menurun
        usort($final_hasil, function ($a, $b) {
            return $b['hasil'] <=> $a['hasil'];
        });
    
        return $final_hasil;
    }
    
    
    public function create()
    {
        return view('layouts/add');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:100',
            'harga' => 'required|numeric',
            'cpu' => 'required|numeric',
            'ram' => 'required|numeric',
            'storage' => 'required|numeric',
            'ping' => 'required|numeric',
            'backup' => 'required|numeric',
        ]);

        // Simpan data ke database
        Alternatif::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'cpu' => $request->cpu,
            'ram' => $request->ram,
            'storage' => $request->storage,
            'ping' => $request->ping,
            'backup' => $request->backup,
        ]);

        // Redirect ke halaman yang diinginkan dengan pesan sukses
        return redirect()->route('layouts.create')->with('success', 'Data alternatif berhasil ditambahkan.');
    }

    public function edit($id)
        {
            $alternatif = Alternatif::findOrFail($id);
            return view('layouts/edit', compact('alternatif'));
        }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'harga' => 'required|numeric',
            'cpu' => 'required|numeric',
            'ram' => 'required|numeric',
            'storage' => 'required|numeric',
            'ping' => 'required|numeric',
            'backup' => 'required|numeric',
        ]);

        $alternatif = Alternatif::findOrFail($id);
        $alternatif->update($request->all());

        return redirect()->to('/list')->with('success', 'Data alternatif berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        $alternatif->delete();

        return redirect()->to('/list')->with('success', 'Data alternatif berhasil dihapus.');
    }
}