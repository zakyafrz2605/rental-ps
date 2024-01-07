<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index(Pembayaran $pembayaran)
    {
        $pembayaran = Pembayaran::query()->get();
        return Response()->view('pembayaran.index', ['pembayaran' => $pembayaran]);
    }

    public function edit(Pembayaran $pembayaran, $id)
    {
        $pembayaran = Pembayaran::query()->where('id', $id)->get();
        return Response()->view('pembayaran.edit', ['pembayaran' => $pembayaran[0]]);
    }

    public function editPembayaran(Request $request, Pembayaran $pembayaran, $id)
    {
        $imageName = '';
        if (!empty($request->file('bukti_pembayaran'))) {
            $image = $request->file('bukti_pembayaran');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storePubliclyAs('bukti', $imageName, 'public');
        } else {
            $imageName = $request->input('gambar');
        }

        Pembayaran::where('id', $id)->update([
            'nominal' => $request->input('nominal'),
            'status' => $request->input('status'),
            'bukti_pembayaran' => $imageName,
        ]);
        return redirect('/pembayaran');
    }
}
