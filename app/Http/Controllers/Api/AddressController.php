<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        return response()->json(['data' => AddressResource::collection($addresses)],200);
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
            return response()->json([
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
        return response()->json(['data' => new AddressResource($address)], 200);
    }


    public function update(updateAddressRequest $request, Address $address)
    {
        $this->authorize('myAddress', $address);
        $address->update($request->validated());
        return response()->json([
            'message' => 'User Address Updated successfully'
        ]);
    }

    public function destroy(Address $address)
    {
        $this->authorize('myAddress', $address);
        $address->delete();
        return response()->json([
            'message' => $address->title . ' Has been Deleted successfully',
        ]);
    }

    public function updateUserAddress(Address $address)
    {
        $this->authorize('myAddress', $address);
        Auth::user()->update([
            'current_address' => $address->id,
        ]);
        return response()->json([
            'message ' => 'Current Address Updated Successfully'
        ], 201);
    }
}
