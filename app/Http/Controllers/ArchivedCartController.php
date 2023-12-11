<?php

namespace App\Http\Controllers;

use App\Models\ArchivedCart;
use Illuminate\Http\Request;

class ArchivedCartController extends Controller
{

    public function index()
    {
        $archivedCarts = ArchivedCart::all();

        return view('archived_carts.index', compact('archivedCarts'));
    }


}
