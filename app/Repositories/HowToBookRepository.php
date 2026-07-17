<?php
namespace App\Repositories;
use App\Interfaces\HowToBookInterface;
use App\Traits\ViewDirective;
use App\Models\HowToBook;
use Auth;
use App\Models\History;
use App\Models\ActivityLog;
use Yajra\DataTables\Facades\DataTables;

class HowToBookRepository {

    use ViewDirective;
    protected $path,$sl;

    public function __construct()
    {
        $this->path = 'admin.how_to_book';
    }

    public function index($datatable)
    {
        //
    }

    public function create()
    {
        $data['data'] = HowToBook::find(1);

        return ViewDirective::view($this->path,'index',$data);

    }

    public function store($request)
    {

    }

    public function show($id){

    }

    public function properties($id){

    }

    public function edit($id){

    }

    public function update($request)
    {
        try {
            $data = array(
                'description' => $request->description,
            );

            HowToBook::find(1)->update($data);
            $data = HowToBook::find(1);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'update',
                'description' => 'Update How To Book Menu which name is '.$data->description,
                'description_bn' => 'কিভাবে বুক করবেন মেন্যু আপডেট করেছেন যার নাম '.$data->description,
            ]);
            History::create([
                'tag' => 'how_to_book',
                'fk_id' => 1,
                'type' => 'update',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('how_to_book.update_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function destroy($id){

    }

    public function trash_list($datatable){

    }

    public function restore($id){

    }

    public function delete($id){

    }

    public function print(){

    }
}
