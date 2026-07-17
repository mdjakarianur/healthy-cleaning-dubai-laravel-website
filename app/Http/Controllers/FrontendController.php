<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\choose_us;
use App\Models\company_praise;
use App\Models\AboutUs;
use App\Models\CompanyProfile;
use App\Models\PrivacyPolicy;
use App\Models\TermsConditions;
use App\Models\ReturnRefundPolicy;
use App\Models\Service;
use App\Models\Employee;
use App\Models\Client;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;
use App\Models\Message;
use App\Models\Blogs;
use App\Models\ServiceCategory;
use App\Models\Ads;
use App\Models\Booking;
use App\Models\Review;
use App\Models\ServiceGuarantee;
use App\Models\Career;
use App\Models\Faq;
use App\Models\HomeFaq;
use App\Models\CustomerInfo;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\CustomerLoginRequest;
use App\Models\HowToBook;
use Session;
use App\Traits\Date;
use Hash;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        // session::forget('ads');
        // return Session::get('ads');

        $about = AboutUs::find(1);

        $choose_us = choose_us::where('status', 1)->orderby('sl', 'ASC')->get();

        $company_praise = company_praise::where('status', 1)->orderby('sl', 'ASC')->get();

        $employee = Employee::where('status', 1)->orderby('sl', 'ASC')->get();

        $client = Client::where('status', 1)->orderby('sl', 'ASC')->get();

        $blog = Blogs::where('status', 1)->orderby('sl', 'ASC')->limit(8)->get();

        $slider = PhotoGallery::where('slider', 1)->where('status', 1)->orderby('sl', 'ASC')->get();

        // $category = ServiceCategory::where('status', 1)->with(['services' => function ($query) {
        // $query->orderBy('sl', 'ASC');}])
        // ->orderBy('sl', 'ASC')
        // ->get();
        // $category = ServiceCategory::where('status', 1)
        //     ->with(['services' => function ($query) {
        //         $query->where('select', 1)
        //             ->orderBy('sl', 'ASC');
        //     }])
        //     ->orderBy('sl', 'ASC')
        //     ->get();

        $services = Service::where('status', 1)->where('click', 1)->orderby('sl', 'ASC')->get();

        $servicebottom = Service::where('status', 1)->where('select', 1)->orderby('sl', 'ASC')->get();

        $ads = Ads::where('status', 1)->get();

        $home_faq = HomeFaq::where('status', 1)->orderby('sl', 'ASC')->get();

        $how_to_book = HowToBook::find(1);

        return view("frontend.index", compact('slider', 'about', 'choose_us', 'company_praise', 'employee', 'client', 'blog', 'services', 'servicebottom', 'ads', 'home_faq', 'how_to_book'));
    }

    public function about()
    {
        $data = AboutUs::find(1);

        $employee = Employee::where('status', 1)->get();
        $client = Client::where('status', 1)->get();

        return view("frontend.about", compact('data', 'employee', 'client'));
    }

    public function services()
    {
        $data = Service::where('status', 1)->get();

        return view("frontend.services", compact('data'));
    }

    public function service_detail($id)
    {
        $data = Service::where('id', $id)->first();

        $review = Review::where('status', 1)->where('service_id', $id)->get();

        $how_to_book = HowToBook::find(1);

        $queans = Faq::where('service_id', $id)->where('status', 1)->orderby('sl', 'ASC')->get();

        return view("frontend.service_detail", compact('data', 'review', 'how_to_book', 'queans'));
    }

    public function ads_details($id)
    {
        $data = Ads::where('id', $id)->first();

        return view("frontend.ads_details", compact('data'));
    }

    public function blogs()
    {
        $data = Blogs::where('status', 1)->get();

        return view("frontend.blogs", compact('data'));
    }

    public function blog_details($id)
    {
        $data = Blogs::where('id', $id)->first();

        return view("frontend.blog_details", compact('data'));
    }

    public function careers()
    {
        $data = Career::where('status', 1)->get();

        return view("frontend.careers", compact('data'));
    }

    public function career_details($id)
    {
        $data = Career::where('id', $id)->first();

        return view("frontend.career_details", compact('data'));
    }

    public function privacypolicy()
    {
        $data = PrivacyPolicy::find(1);
        return view("frontend.privacypolicy", compact('data'));
    }

    public function termsconditions()
    {
        $data = TermsConditions::find(1);
        return view("frontend.termsconditions", compact('data'));
    }

    public function returnrefund()
    {
        $data = ReturnRefundPolicy::find(1);
        return view("frontend.returnrefund", compact('data'));
    }

    public function serviceguarantee()
    {
        $data = ServiceGuarantee::find(1);
        return view("frontend.serviceguarantee", compact('data'));
    }

    public function BookService(Request $request, $id)
    {
        try {
            $data = array(
                'service_id' => $id,
                'booking_date' => $request->booking_date,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'notes' => $request->notes,
            );

            $insert = Booking::create($data);

            toastr()->success(__('Booking Done, Your Will Recieve A Call Or Email From Us'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage(), __('common.error'), ['timeOut' => 5000]);
            return redirect()->back();
        }
    }

    public function sendReview(Request $request, $id)
    {
        try {
            $data = [
                'service_id' => $id,
                'name'       => $request->name,
                'email'      => $request->email,
                'phone'      => $request->phone,
                'address'    => $request->address,
                'review'     => $request->review,
                'rating'     => $request->rating, // Star rating from form
                'status'     => 0, // Inactive until verified
            ];

            Review::create($data);

            toastr()->success(__('Your review will be displayed after verification.'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage(), __('common.error'), ['timeOut' => 5000]);
            return redirect()->back();
        }
    }


    public function team()
    {
        $data = Employee::where('status', 1)->get();

        return view("frontend.team", compact('data'));
    }

    public function gallery()
    {
        $data = PhotoGallery::where('status', 1)->orderBy('id', 'DESC')->get();

        return view("frontend.gallery", compact('data'));
    }

    public function videoalbum()
    {
        $data = VideoGallery::where('status', 1)->orderBy('id', 'DESC')->get();

        return view("frontend.videoalbum", compact('data'));
    }

    public function contact()
    {
        $client = Client::where('status', 1)->get();

        $choose_us = choose_us::where('status', 1)->get();

        return view("frontend.contact", compact('client', 'choose_us'));
    }

    public function sendMessage(Request $request)
    {
        try {
            $data = array(
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
            );

            $insert = Message::create($data);

            toastr()->success(__('Thank You For Your Valuable Message.'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage(), __('common.error'), ['timeOut' => 5000]);
            return redirect()->back();
        }
    }

    public function customer_registration()
    {
        $data = CustomerInfo::get();

        return view('frontend.customer_registration', compact('data'));
    }

    public function CustomerRegistration(CustomerRequest $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['status'] = '0';
        $data['password'] = Hash::make($request->password);

        $insert = CustomerInfo::create($data);

        if ($insert) {
            return response()->json(['success' => 'Your Registration is successfull! wait for admin approval']);
        }
    }

    public function customerLogin()
    {
        return view("frontend.customer_login"); // path to your Blade login view
    }

    // Handle login attempt
    public function loginAttempt(CustomerLoginRequest $request)
    {
        $customer = CustomerInfo::where('email', $request->email)->first();

        if (!$customer) {
            toastr()->error('No customer found with this email.', 'Login Failed');
            return redirect()->back();
        }

        if ($customer->status == 0) {
            toastr()->error('Your account is inactive. Please contact support.', 'Access Denied');
            return redirect()->back();
        }

        // Proceed with authentication
        $request->authenticate(); // This should use Laravel's built-in login logic

        $request->session()->regenerate();

        toastr()->success('Welcome back!, Login Successful', 'Success');
        return redirect()->route('customer.dashboard');
    }

    // Show dashboard (only if active)
    public function customer_dashboard()
    {
        $customer = Auth::guard('customer')->user();

        if ($customer->status == 0) {
            Auth::guard('customer')->logout();
            toastr()->error('Your account is inactive.', 'Access Denied');
            return redirect()->route('customer.login');
        }

        $data = CustomerInfo::find($customer->id);

        return view("customer.dashboard", compact('data'));
    }


    public function pendingCustomer()
    {
        return view("customer.pendingCustomerNotice");
    }
}
