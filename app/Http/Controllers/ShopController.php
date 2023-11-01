<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\CreateShop;

class ShopController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->except(['show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shops = Shop::all();
        return view('shop.index', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return view('shop.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //validate request
        $data = $request->validate([
            'title' => 'required|unique:shops,title|between:3,100',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'PhoneNumber' => 'required|string|size:11',
            'email' => 'required|unique:users,email',
            'address' => 'nullable',
            'username' => 'required|unique:users,name'
        ]);
        //create random password
        $randomPassword = random_int(10000, 99999);

        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'role' => 'restaurant',
            'email_verified_at' => now(),
            'password' => bcrypt($randomPassword)
        ]);

        // create shop in db
        Shop::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'PhoneNumber' => $request->PhoneNumber,
            'address' => $request->address
        ]);

        //Notification For User
        $user->notify(new CreateShop);

        //redirection
        return redirect()->route('shop.index')->with('success', 'registered success');

    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
