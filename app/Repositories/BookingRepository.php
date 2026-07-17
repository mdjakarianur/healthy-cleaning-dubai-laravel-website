<?php
namespace App\Repositories;
use App\Interfaces\BookingInterface;
use App\Traits\ViewDirective;
use App\Models\Booking;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\User;
use Auth;
use App\Models\History;
use App\Models\ActivityLog;
use App\Models\CustomerInfo;
use Yajra\DataTables\Facades\DataTables;

class BookingRepository implements BookingInterface{

    use ViewDirective;
    protected $path,$sl;

    public function __construct()
    {
        $this->path = 'admin.bookings';
    }

    public function index($datatable)
    {
        if($datatable == 1)
        {
            $data = Booking::all();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('booking_date',function($row){
                return $row->booking_date;
            })
            ->addColumn('category_name',function($row){
                if($row->category_id > 0)
                {
                    $category_name = ServiceCategory::where('id',$row->category_id)->first();
                }
                else
                {
                    $category_name = '-';
                }

                if($row->category_id > 0)
                {
                    return $category_name->category_name;
                }
                else
                {
                    $category_name = '-';
                }

            })
            ->addColumn('service_name',function($row){
                if($row->service_id > 0)
                {
                    $service_name = Service::where('id',$row->service_id)->first();
                }
                else
                {
                    $service_name = '-';
                }

                if($row->service_id > 0)
                {
                    return $service_name->service_name;
                }
                else
                {
                    $service_name = '-';
                }

            })
            ->addColumn('customer_name',function($row){
                if($row->customer_id > 0)
                {
                    $customer_name = CustomerInfo::where('id',$row->customer_id)->first();
                }
                else
                {
                    $customer_name = '-';
                }

                if($row->customer_id > 0)
                {
                    return $customer_name->customer_name;
                }
                else
                {
                    $customer_name = '-';
                }

            })
            ->addColumn('email',function($row){
                if($row->customer_id > 0)
                {
                    $email = CustomerInfo::where('id',$row->customer_id)->first();
                }
                else
                {
                    $email = '-';
                }

                if($row->customer_id > 0)
                {
                    return $email->email;
                }
                else
                {
                    $email = '-';
                }

            })
            ->addColumn('phone',function($row){
                if($row->customer_id > 0)
                {
                    $phone = CustomerInfo::where('id',$row->customer_id)->first();
                }
                else
                {
                    $phone = '-';
                }

                if($row->customer_id > 0)
                {
                    return $phone->phone;
                }
                else
                {
                    $phone = '-';
                }

            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Bookings status'))
                {
                    if($row->status == 1)
                    {
                        $checked = 'checked';
                    }
                    else
                    {
                        $checked = 'false';
                    }
                    return '<div class="checkbox-wrapper-51">
                    <input onchange="return changeBookingsStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
                    <label class="toggle" for="cbx-51-'.$row->id.'">
                      <span>
                        <svg viewBox="0 0 10 10" height="10px" width="10px">
                          <path d="M5,1 L5,1 C2.790861,1 1,2.790861 1,5 L1,5 C1,7.209139 2.790861,9 5,9 L5,9 C7.209139,9 9,7.209139 9,5 L9,5 C9,2.790861 7.209139,1 5,1 L5,9 L5,1 Z"></path>
                        </svg>
                      </span>
                    </label>
                  </div>';
                }
                else
                {
                    return '';
                }
            })
            ->addColumn('action', function($row){
                if(Auth::user()->can('Bookings show'))
                {
                    $show_btn = '<a class="dropdown-item" href="'.route('bookings.show',$row->id).'"><i class="fa fa-eye"></i> '.__('common.show').'</a>';
                }
                else
                {
                    $show_btn ='';
                }

                if(Auth::user()->can('Bookings destroy'))
                {
                    $delete_btn = '<form id="" method="post" action="'.route('bookings.destroy',$row->id).'">
                    '.csrf_field().'
                    '.method_field('DELETE').'
                    <button onclick="return Sure()" type="post" class="dropdown-item text-danger"><i class="fa fa-trash"></i> '.__('common.destroy').'</button>
                    </form>';
                }
                else
                {
                    $delete_btn ='';
                }



                $output = '<div class="dropdown font-sans-serif">
                <a class="btn btn-phoenix-default dropdown-toggle" id="dropdownMenuLink" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.__('common.action').'</a>
                <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="dropdownMenuLink" style="">'.$show_btn.' '.$delete_btn.'
                </div>
              </div>';
                return $output;
            })
            ->rawColumns(['action','booking_date','category_name','service_name','customer_name','email','phone','status'])
            ->make(true);

        }
        return ViewDirective::view($this->path,'index');
    }

    public function create()
    {

    }

    public function store($request){

    }

    public function show($id)
    {
        $data = Booking::with(['category', 'service'])->findOrFail($id);
        return view($this->path . '.show', compact('data'));
    }


    public function properties($id){

    }

    public function edit($id){

    }

    public function update($request, $id){

    }

    public function destroy($id)
    {
        try {
            Booking::find($id)->delete();
            $data = Booking::where('id',$id)->first();
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'destroy',
                'description' => 'Destroy Booking which name is '.$data->name,
                'description_bn' => 'একটি বুকিং ডিলেট করেছেন যার নাম '.$data->name,
            ]);

            History::create([
                'tag' => 'message',
                'fk_id' => $id,
                'type' => 'destroy',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('bookings.delete_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function trash_list($datatable){

    }

    public function restore($id){

    }

    public function delete($id){

    }

    public function print(){

    }

    public function status($id)
    {
        try {
            $data = Booking::where('id',$id)->first();
            if($data->status == 1)
            {
                Booking::where('id',$id)->update([
                    'status' => 0,
                ]);
            }
            else
            {
                Booking::where('id',$id)->update([
                    'status' => 1,
                ]);
            }
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'status',
                'description' => 'Change Status Bookings which name is '.$data->name,
                'description_bn' => 'একটি বুকিং স্ট্যাটাস পরিবর্তন করেছেন যার নাম '.$data->name,
            ]);

            History::create([
                'tag' => 'message',
                'fk_id' => $id,
                'type' => 'status',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('bookings.status_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
