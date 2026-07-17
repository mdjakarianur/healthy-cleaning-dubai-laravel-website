<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerInfo;
use Brian2694\Toastr\Facades\Toastr;

class ApproveCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CustomerInfo::orderBy('id','DESC')->get();
        return view('admin.approve_customer.index',compact('data'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function DenyCustomer($id)
    {
		CustomerInfo::where('id', $id)->update(['status' =>0]);
		$notification=array(
			'messege'   =>'Approval Cancel',
			'alert-type'=>'error'
		);
		return Redirect()->back()->with($notification);
	}

	public function ApproveCustomer($id)
    {
		CustomerInfo::where('id', $id)->update(['status' =>1]);
		$notification=array(
			'messege'   =>'Approval Success',
			'alert-type'=>'success'
		);
		return Redirect()->back()->with($notification);
	}
}
