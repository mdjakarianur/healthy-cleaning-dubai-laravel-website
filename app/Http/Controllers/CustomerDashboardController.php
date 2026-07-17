<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\CustomerLoginRequest;
use Session;
use Hash;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\CustomerInfo;
use App\Models\Service;
use App\Models\Booking;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
	public function customerprofile()
	{
		$data = CustomerInfo::find(Auth::guard('customer')->user()->id);
		return view('customer.customerprofile',compact('data'));
	}

	public function updatecustomerdashboard(Request $request,$id)
	{
        $update = CustomerInfo::find($id)->update([
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        if ($update) {
            Toastr::success('Data Insert Success', 'success');
            return redirect()->back();
        }
    }

	public function changepasswordcustomer()
	{
		return view("customer.changepasswordcustomer");
	}

	public function upchangepasswordcustomer(Request $r)
    {
        // Validate the input
        $r->validate([
            'old_password' => 'required|string|min:6', // Old password validation
            'password' => 'required|string|min:6|confirmed', // New password validation
        ]);

        // Get the currently authenticated customer
        $customer = Auth::guard('customer')->user();

        // Check if the old password entered by the customer matches the hashed password in the database
        if (!Hash::check($r->old_password, $customer->password)) {
            toastr()->error('The old password you entered is incorrect.', 'Error');
            return redirect()->back();
        }

        // Update the password to the new one (after hashing it)
        $customer->password = Hash::make($r->password);
        $customer->save();

        // Success Toastr message
        toastr()->success('Your password has been changed successfully.', 'Success');

        // Redirect back with the success message displayed by Toastr
        return redirect()->back();
    }

	public function destroy(Request $request)
    {
        Auth::guard('customer')->logout();

		return redirect("/");
    }


    public function viewservice()
    {
        $customer = Auth::guard('customer')->user();

        if (!$customer) {
            abort(403, 'Unauthorized access');
        }

        $data = Booking::where('customer_id', $customer->id)
            ->get();
        // return $data;

        return view('customer.viewservice', compact('data'));
    }



    public function servicebooking()
	{
        $category = ServiceCategory::where('status',1)->get();

		return view('customer.servicebooking',compact('category'));
	}


    public function createservice(Request $request)
    {
        $customerId = Auth::guard('customer')->user()->id;

        $data = [
            'booking_date' => $request->booking_date,
            'category_id' => $request->category_id,
            'service_id' => $request->service_id,
            'customer_id' => $customerId,
            'notes' => $request->notes,
        ];

        $insert = Booking::create($data);

        if ($insert) {
            Toastr::success('Booking created successfully!', 'Success');
            return redirect()->back();
        } else {
            Toastr::error('Failed to create booking. Please try again.', 'Error');
            return redirect()->back();
        }
    }

    public function GetService(Request $request)
    {
        $service = Service::where('category_id',$request->category_id)->get();
        if(count($service) == 0)
        {
            return 'No Service';
        }
        $output = '<label class="mb-2">'.__('Service Name') .':</label>
        <select class="form-control" id="service_id" name="service_id">
        <option selected>Choose...</option>';
        foreach($service as $d)
        {
            $service_name = $d->service_name;

            $output .= '<option value="'.$d->id.'">'.$d->service_name.'</option>';
        }
        $output.='</select>';

        return $output;
    }
}
