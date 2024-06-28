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
        $totalBobot = $kriterias->sum('bobot');

        foreach ($alternatifs as $alternatif) {
            $nilai = 1;

            foreach ($kriterias as $kriteria) {
                $nilai_kriteria = $alternatif->{$kriteria->nama_kriteria};
                $normalized_bobot = $kriteria->bobot / $totalBobot;

                if (in_array($kriteria->nama_kriteria, ['harga', 'ping'])) {
                    // If the criteria is 'harga' or 'ping', treat it as a cost
                    $nilai *= pow($nilai_kriteria, -$normalized_bobot);
                } else {
                    // Otherwise, treat it as a benefit
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
                'nilai_wp' => round($nilai, 4) // Round the result to 2 decimal places
            ];
        }

        // Sort the results in descending order
        usort($hasil, function ($a, $b) {
            return $b['nilai_wp'] <=> $a['nilai_wp'];
        });

        return $hasil;
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