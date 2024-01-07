<?php

namespace App\Http\Controllers;

use App\Models\Konsol;
use App\Models\Pembayaran;
use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Rental $rental)
    {
        $rental = Rental::query()->where('id_customer', '=', Auth::user()['id'])->get();
        return Response()->view('rental.index', ['rental' => $rental]);
    }

    public function indexAdmin(Rental $rental)
    {
        $rental = Rental::with('customer')->get();
        $nama = $rental->pluck('customer.nama')->all();
        $id_customer = $rental->pluck('customer.id')->all();
        $selesai = $rental->pluck('selesai')->all();

        $perbedaan = [];
        foreach($selesai as $s) {
            if (Carbon::parse($s, 'Asia/Jakarta')->lt(Carbon::now('Asia/Jakarta'))) {
                array_push($perbedaan, true);
            } else {
                array_push($perbedaan, false);
            }
        }

        return Response()->view('admin.index', ['rental' => $rental, 'nama' => $nama, 'id_customer' => $id_customer, 'perbedaan' => $perbedaan]);
    }

    public function indexSewa()
    {
        $konsol = Konsol::select(['id', 'status'])->get();
        return Response()->view('rental.sewa', ['konsol' => $konsol]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $rental = Rental::where('id_konsol', $request->input('konsol'))->get();
        $mulai = $rental->pluck('mulai')->all();
        $selesai = $rental->pluck('selesai')->all();

        if (Carbon::parse($request->input('mulai'), 'Asia/Jakarta')->lt(Carbon::now('Asia/Jakarta'))) {
            return back()->withInput()->withErrors(['error' => 'Tanggal/waktu yang dipilih sudah terlewat']);
        } else if (Carbon::parse($request->input('selesai'), 'Asia/Jakarta')->lt(Carbon::parse($request->input('mulai'), 'Asia/Jakarta'))) {
            return back()->withInput()->withErrors(['error' => 'Tanggal/waktu selesai tidak boleh lebih kecil dari waktu mulai']);
        } else if (!empty($rental)) {
            $exceedSelesai = false;
            foreach ($mulai as $m) {
                foreach ($selesai as $s) {
                    if (Carbon::parse($s, 'Asia/Jakarta')->gt(Carbon::parse($request->input('mulai'), 'Asia/Jakarta')) && Carbon::parse($m, 'Asia/Jakarta')->lt(Carbon::parse($request->input('selesai'), 'Asia/Jakarta'))) {
                        $exceedSelesai = true;
                    }
                }
            }
            if ($exceedSelesai) {
                return back()->withInput()->withErrors(['error' => 'Konsol sudah terpakai']);
            }
        }

        $pembayaran = Pembayaran::create([
            'nominal' => 0,
        ]);

        $id_pembayaran = $pembayaran->id;

        Rental::create([
            'id_customer' => Auth::user()['id'],
            'id_konsol' => $request->input('konsol'),
            'id_pembayaran' => $id_pembayaran,
            'mulai' => $request->input('mulai'),
            'selesai' => $request->input('selesai'),
        ]);

        return Redirect::to("https://wa.me/6281476652656?text=" . urlencode("Rental PS\nNama : ") . Auth::user()['nama'] . urlencode("\nKonsol : ") . $request->input('konsol') . urlencode("\nMulai : ") . $request->input('mulai') . urlencode("\nSelesai : ") . $request->input('selesai'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function delete(Request $request, Rental $rental, $id)
    {
        $rental = Rental::where('id', '=', $id);
        $rental->delete();
        return back();
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Rental $rental, $id)
    {
        $rental = Rental::where('id', '=', $id)->get();
        $konsol = Konsol::select(['id', 'status'])->get();
        return Response()->view('rental.edit', ['rental' => $rental, 'konsol' => $konsol]);
    }

    public function editRental(Request $request, Rental $rental, $id)
    {
        $rental = Rental::where('id_konsol', $request->input('konsol'))->get();
        $mulai = $rental->pluck('mulai')->all();
        $selesai = $rental->pluck('selesai')->all();
        
        if (Carbon::parse($request->input('mulai'), 'Asia/Jakarta')->lt(Carbon::now('Asia/Jakarta'))) {
            return back()->withInput()->withErrors(['error' => 'Tanggal/waktu mulai yang dipilih sudah terlewat']);
        } else if (!empty($rental->pluck('id')->all())) {
            $exceedSelesai = false;
            foreach ($mulai as $m) {
                foreach ($selesai as $s) {
                    if (Carbon::parse($s, 'Asia/Jakarta')->gt(Carbon::parse($request->input('mulai'), 'Asia/Jakarta')) && Carbon::parse($m, 'Asia/Jakarta')->lt(Carbon::parse($request->input('selesai'), 'Asia/Jakarta'))) {
                        $exceedSelesai = true;
                    }
                }
            }
            if ($exceedSelesai) {
                return back()->withInput()->withErrors(['error' => 'Konsol sudah terpakai']);
            }
        }

        Rental::where('id', $id)->update([
            'id_konsol' => $request->input('konsol'),
            'mulai' => $request->input('mulai'),
            'selesai' => $request->input('selesai'),
        ]);
        return redirect('/rental');
    }
}
