<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest\storeAddressRequest;
use App\Http\Requests\AddressRequest\updateAddressRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use App\Models\AddressUser;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addresses = Auth::user()->addresses;
        return response(AddressResource::collection($addresses));
        /* $addresses = Auth::user()->addresses;
         return response([
             'address' => $addresses,
         ]);*/

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeAddressRequest $request)
    {
        $address = Address::query()->create($request->validated());
        AddressUser::query()->create([
            'user_id' => Auth::user()->id,
            'address_id' => $address->id,
        ]);
        if (Auth::user()->current_address === null) {
            Auth::user()->update([
                'current_address' => $address->id,
            ]);
        } else {
            return response([
                'message' => 'User Address added successfully',
            ], 201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        $this->authorize('myAddress', $address);
        return response(new AddressResource($address));
        /*return response([
            'address' => $address
        ]);*/
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateAddressRequest $request, Address $address)
    {
        $this->authorize('myAddress', $address);
        $address->update($request->validated());
        return response([
            'message' => 'User Address Updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        $this->authorize('myAddress', $address);
        $address->delete();
        return response([
            'message' => $address->title . ' Has been Deleted successfully',
        ]);
    }

    public function updateUserAddress(Address $address)
    {
        $this->authorize('myAddress', $address);
        Auth::user()->update([
            'current_address' => $address->id,
        ]);
        return response([
            'message ' => 'Current Address Updated Successfully'
        ],201);
    }
}
