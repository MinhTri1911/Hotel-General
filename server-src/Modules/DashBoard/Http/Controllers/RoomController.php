<?php

namespace Modules\DashBoard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\DashBoard\Business\RoomBusiness;
use Modules\DashBoard\Business\UploadFileBusiness;
use Modules\DashBoard\Common\Constant;

class RoomController extends Controller
{
    private $_roomBusiness;

    public function __construct(RoomBusiness $room, UploadFileBusiness $upload)
    {
        $this->_roomBusiness = $room;
        $this->_photosPath = public_path('/images');
        $this->_uploadBusiness = $upload;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('dashboard::room.list');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        try {

            return view('dashboard::room.create');
        } catch (\Exception $e) {
            dd($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('dashboard::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('dashboard::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
