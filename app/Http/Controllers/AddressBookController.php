<?php

namespace App\Http\Controllers;

use App\Models\AddressBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $address = AddressBook::where('user_id', Auth::user()->id)->get();
        return view('profile.address.index', compact('address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'first_name' => 'required',
            'country_code' => 'required',
            'mobile_number' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);

        $address = AddressBook::create([
            'company_name' => $request->company_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'country_code' => $request->country_code,
            'mobile_number' => $request->mobile_number,
            'city' => $request->city,
            'address' => $request->address,
            'landmark' => $request->landmark,
            'user_id' => auth()->id(),
        ]);

        if ($address) {
            $request->session()->flash('green', 'Addess was successful added!');
            return redirect()->route('address-books.show', $address->id);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AddressBook  $addressBook
     * @return \Illuminate\Http\Response
     */
    public function show(AddressBook $addressBook)
    {
        return view('profile.address.single', compact('addressBook'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AddressBook  $addressBook
     * @return \Illuminate\Http\Response
     */
    public function edit(AddressBook $addressBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AddressBook  $addressBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AddressBook $addressBook)
    {
        $request->validate([
            'company_name' => 'required',
            'first_name' => 'required',
            'country_code' => 'required',
            'mobile_number' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);

        $addressBook->company_name = $request->company_name;
        $addressBook->first_name = $request->first_name;
        $addressBook->last_name = $request->last_name;
        $addressBook->country_code = $request->country_code;
        $addressBook->mobile_number = $request->mobile_number;
        $addressBook->city = $request->city;
        $addressBook->address = $request->address;
        $addressBook->landmark = $request->landmark;
        $addressBook->save();

        if ($addressBook) {
            $request->session()->flash('green', 'Addess was successful updated!');
            return redirect()->route('address-books.show', $addressBook->id);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AddressBook  $addressBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, AddressBook $addressBook)
    {
        if($addressBook->delete()){
            $request->session()->flash('green', 'Address successful deleted!');
            return redirect("/profile/address-books/");
        }else {
            $request->session()->flash('red', 'Something went wrong, Please try again!');
            return back();
        }
    }
}
