<?php
namespace App\Repositories;
use App\Interfaces\HomeFaqInterface;
use App\Traits\ViewDirective;
use App\Models\HomeFaq;
use Auth;
use App\Models\History;
use App\Models\ActivityLog;
use Yajra\DataTables\Facades\DataTables;

class HomeFaqRepository implements HomeFaqInterface{

    use ViewDirective;
    protected $path,$sl;

    public function __construct()
    {
        $this->path = 'admin.home_faq';
    }

    public function index($datatable)
    {
        if($datatable == 1)
        {
            $data = HomeFaq::all();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('serial',function($row){
                return $this->sl = $this->sl +1;
            })
            ->addColumn('name',function($row){
                $row->questions_bn;
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Home Faq status'))
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
                    <input onchange="return changeHomeFaqStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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

                if(Auth::user()->can('Home Faq edit'))
                {
                    $edit_btn = '<a class="dropdown-item" href="'.route('home_faq.edit',$row->id).'"><i class="fa fa-edit"></i> '.__('common.edit').'</a>';
                }
                else
                {
                    $edit_btn ='';
                }

                if(Auth::user()->can('Home Faq destroy'))
                {
                    $delete_btn = '<form id="" method="post" action="'.route('home_faq.destroy',$row->id).'">
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
                <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="dropdownMenuLink" style=""> '.$edit_btn.' '.$delete_btn.'
                </div>
                </div>';
                return $output;
            })
            ->rawColumns(['action','questions','serial','status'])
            ->make(true);

        }
        return ViewDirective::view($this->path,'index');
    }

    public function create()
    {
        return ViewDirective::view($this->path,'create');
    }

    public function store($request)
    {
        try {
            $data = array(
                'sl' => $request->sl,
                'questions' => $request->questions,
                'answer' => $request->answer,
                'status' => 1,
            );

            HomeFaq::create($data);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'create',
                'description' => 'Create Faq which name is '.$request->questions,
                'description_bn' => 'একটি প্রশ্ন ক্যাটাগরি তৈরি করেছেন যার নাম '.$request->questions,
            ]);

            toastr()->success(__('home_faq.create_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function show($id)
    {
        $data['data'] = HomeFaq::find($id);
        $data['histories'] = History::where('tag','home_faq')->where('fk_id',$id)->get();
        return ViewDirective::view($this->path,'show',$data);
    }

    public function properties($id)
    {

    }

    public function edit($id)
    {
        $data['data'] = HomeFaq::find($id);
        return ViewDirective::view($this->path,'edit',$data);
    }

    public function update($request, $id)
    {
        try {
            $data = array(
                'sl' => $request->sl,
                'questions' => $request->questions,
                'answer' => $request->answer,
            );

            HomeFaq::find($id)->update($data);
            $data = HomeFaq::find($id);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'update',
                'description' => 'Update Faq which name is '.$data->questions,
                'description_bn' => 'একটি প্রশ্ন আপডেট করেছেন যার নাম '.$data->questions,
            ]);
            History::create([
                'tag' => 'home_faq',
                'fk_id' => $id,
                'type' => 'update',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('home_faq.update_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            HomeFaq::find($id)->delete();
            $data = HomeFaq::withTrashed()->where('id',$id)->first();
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'destroy',
                'description' => 'Destroy Faq which name is '.$data->questions,
                'description_bn' => 'একটি প্রশ্ন ডিলেট করেছেন যার নাম '.$data->questions,
            ]);

            History::create([
                'tag' => 'home_faq',
                'fk_id' => $id,
                'type' => 'destroy',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('home_faq.delete_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function trash_list($datatable)
    {
        if($datatable == 1)
        {
            $data = HomeFaq::onlyTrashed()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('serial',function($row){
                return $this->sl = $this->sl +1;
            })
            ->addColumn('questions',function($row){
                return $row->questions;
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Home Faq status'))
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
                    <input onchange="return changeHomeFaqStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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
                if(Auth::user()->can('Home Faq restore'))
                {
                    $restore_btn = '<a class="dropdown-item" href="'.route('home_faq.restore',$row->id).'"><i class="fa fa-trash-arrow-up"></i> '.__('common.restore').'</a>';
                }
                else
                {
                    $restore_btn = '';
                }

                if(Auth::user()->can('Home Faq delete'))
                {
                    $delete_btn = '<a onclick="return Sure()" class="dropdown-item text-danger" href="'.route('home_faq.delete',$row->id).'"><i class="fa fa-trash"></i> '.__('common.delete').'</a>';
                }
                else
                {
                    $delete_btn = '';
                }


                $output = '<div class="dropdown font-sans-serif">
                <a class="btn btn-phoenix-default dropdown-toggle" id="dropdownMenuLink" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.__('common.action').'</a>
                <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="dropdownMenuLink" style="">'.$restore_btn.' '.$delete_btn.'
                </div>
                </div>';
                return $output;
            })
            ->rawColumns(['action','questions','serial','status'])
            ->make(true);

        }
        return ViewDirective::view($this->path,'trash_list');
    }

    public function restore($id)
    {
        try {
            HomeFaq::withTrashed()->where('id',$id)->restore();
            $data = HomeFaq::withTrashed()->where('id',$id)->first();
            //history
            History::create([
                'tag' => 'home_faq',
                'fk_id' => $id,
                'type' => 'restore',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            //actvity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'restore',
                'description' => 'Restore Faq which name is '.$data->questions,
                'description_bn' => 'একটি প্রশ্ন পুনুরুদ্ধার করেছেন যার নাম '.$data->questions,
            ]);
            toastr()->success(__('home_faq.restore_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $data = HomeFaq::withTrashed()->where('id',$id)->first();

            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'delete',
                'description' => 'Permenantly Delete Faq which name is '.$data->questions,
                'description_bn' => 'একটি প্রশ্ন সম্পূর্ণ ডিলেট করেছেন যার নাম '.$data->questions,
            ]);
            History::where('tag','home_faq')->where('fk_id',$id)->delete();
            HomeFaq::withTrashed()->where('id',$id)->forceDelete();
            toastr()->success(__('home_faq.delete_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function print(){

    }

    public function status($id)
    {
        try {
            $data = HomeFaq::withTrashed()->where('id',$id)->first();
            if($data->status == 1)
            {
                HomeFaq::withTrashed()->where('id',$id)->update([
                    'status' => 0,
                ]);
            }
            else
            {
                HomeFaq::withTrashed()->where('id',$id)->update([
                    'status' => 1,
                ]);
            }
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'status',
                'description' => 'Change Status Faq which name is '.$data->questions,
                'description_bn' => 'একটি প্রশ্ন স্ট্যাটাস পরিবর্তন করেছেন যার নাম '.$data->questions,
            ]);

            History::create([
                'tag' => 'home_faq',
                'fk_id' => $id,
                'type' => 'status',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('home_faq.status_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
