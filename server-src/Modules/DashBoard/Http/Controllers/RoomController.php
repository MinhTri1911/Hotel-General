<?php

namespace Modules\DashBoard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\DashBoard\Business\RoomBusiness;
use App\Upload;
use Intervention\Image\Facades\Image;

class RoomController extends Controller
{
    private $_roomBusiness;
    private $_photosPath;

    public function __construct(RoomBusiness $room)
    {
        $this->_roomBusiness = $room;
        $this->_photosPath = public_path('/images');
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

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function uploadImage(Request $request)
    {
        $photos = $request->file('file');

        if (!is_array($photos)) {
            $photos = [$photos];
        }

        if (!is_dir($this->_photosPath)) {
            mkdir($this->_photosPath, 0777);
        }

        for ($i = 0; $i < count($photos); $i++) {
            $photo = $photos[$i];
            $name = sha1(date('YmdHis') . str_random(30));
            $saveName = $name . '.' . $photo->getClientOriginalExtension();
            $resizeName = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();

            Image::make($photo)->resize(250, null, function ($constraints) {
                    $constraints->aspectRatio();
                })
                ->save($this->_photosPath . '/' . $resizeName);

            $photo->move($this->_photosPath, $saveName);
        }

        return response()->json([
            'message' => 'Image saved Successfully'
        ], 200);
    }

    /**
     * Remove the images from the storage.
     *
     * @param Request $request
     */
    public function removeImage(Request $request)
    {
        dd($request->get('id'));
        $filename = $request->id;
        $uploaded_image = Upload::where('original_name', basename($filename))->first();

        if (empty($uploaded_image)) {
            return Response::json(['message' => 'Sorry file does not exist'], 400);
        }

        $file_path = $this->photos_path . '/' . $uploaded_image->filename;
        $resized_file = $this->photos_path . '/' . $uploaded_image->resized_name;

        if (file_exists($file_path)) {
            unlink($file_path);
        }

        if (file_exists($resized_file)) {
            unlink($resized_file);
        }

        if (!empty($uploaded_image)) {
            $uploaded_image->delete();
        }

        return Response::json(['message' => 'File successfully delete'], 200);
    }
}
