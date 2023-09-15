<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index() {
        return view('order');
    }

    public function store(Request $req): RedirectResponse 
    {

        $order = new Order;
        $order->no_pesanan = $req->no_pesanan;
        $order->tanggal = $req->tanggal;
        $order->nm_supllier = $req->nm_supllier;
        $order->nm_produk = $req->nm_produk;
        $order->total = $req->total;
        $order->save();

        return redirect('/orders')->with('success', 'New order has been added!');
    }
}
