<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\HowToBookRepository;
use App\Http\Requests\HowToBookRequest;

class HowToBookController extends Controller
{
    protected $repo;
    public function __construct(HowToBookRepository $repo)
    {
        $this->repo= $repo;
        $this->middleware(['permission:How To Book view'])->only(['index']);
        $this->middleware(['permission:How To Book create'])->only(['create']);
        $this->middleware(['permission:How To Book edit'])->only(['edit']);
        $this->middleware(['permission:How To Book destroy'])->only(['destroy']);
        $this->middleware(['permission:How To Book status'])->only(['status']);
        $this->middleware(['permission:How To Book restore'])->only(['restore']);
        $this->middleware(['permission:How To Book delete'])->only(['delete']);
        $this->middleware(['permission:How To Book show'])->only(['show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->repo->create();
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
    public function update(HowToBookRequest $request, string $id)
    {
        return $this->repo->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
