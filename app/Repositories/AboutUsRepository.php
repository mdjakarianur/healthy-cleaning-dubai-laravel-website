<?php

namespace App\Repositories;

use App\Interfaces\AboutUsInterface;
use App\Traits\ViewDirective;
use App\Models\AboutUs;
use Auth;
use App\Models\History;
use App\Models\ActivityLog;
use Yajra\DataTables\Facades\DataTables;

class AboutUsRepository
{

    use ViewDirective;
    protected $path, $sl;

    public function __construct()
    {
        $this->path = 'admin.about_us';
    }

    public function index($datatable)
    {
        //
    }

    public function create()
    {
        $data['data'] = AboutUs::find(1);

        return ViewDirective::view($this->path, 'index', $data);
    }

    public function store($request) {}

    public function show($id) {}

    public function properties($id) {}

    public function edit($id) {}

    public function update($request)
    {
        try {
            $about = AboutUs::findOrFail(1);

            $data = [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'description' => $request->description,
            ];

            // IMAGE UP
            if ($request->hasFile('image_up')) {

                // old delete
                if ($about->image_up && file_exists(public_path('backend/Images/AboutImage/' . $about->image_up))) {
                    unlink(public_path('backend/Images/AboutImage/' . $about->image_up));
                }

                $file = $request->file('image_up');
                $name = time() . '_up.' . $file->getClientOriginalExtension();
                $file->move(public_path('backend/Images/AboutImage'), $name);

                $data['image_up'] = $name;
            }

            // IMAGE BOTTOM
            if ($request->hasFile('image_bottom')) {

                if ($about->image_bottom && file_exists(public_path('backend/Images/AboutImage/' . $about->image_bottom))) {
                    unlink(public_path('backend/Images/AboutImage/' . $about->image_bottom));
                }

                $file = $request->file('image_bottom');
                $name = time() . '_bottom.' . $file->getClientOriginalExtension();
                $file->move(public_path('backend/Images/AboutImage'), $name);

                $data['image_bottom'] = $name;
            }

            $about->update($data);

            // Activity Log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::id(),
                'slug' => 'update',
                'description' => 'Update About Us which name is ' . $about->title,
                'description_bn' => 'একটি আমাদের সম্পর্কে আপডেট করেছেন যার নাম ' . $about->title,
            ]);

            History::create([
                'tag' => 'about_us',
                'fk_id' => 1,
                'type' => 'update',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::id(),
            ]);

            toastr()->success(__('about_us.update_message'), __('common.success'), ['timeOut' => 5000]);

            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id) {}

    public function trash_list($datatable) {}

    public function restore($id) {}

    public function delete($id) {}

    public function print() {}
}
