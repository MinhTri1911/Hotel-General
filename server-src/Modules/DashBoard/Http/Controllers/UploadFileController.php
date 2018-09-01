<?php

namespace Modules\DashBoard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\DashBoard\Business\UploadFileBusiness;
use Modules\DashBoard\Common\Constant;

class UploadFileController extends Controller
{
    private $_uploadBusiness;
    private $_photosPath;

    public function __construct(UploadFileBusiness $upload)
    {
        $this->_photosPath = public_path('/images');
        $this->_uploadBusiness = $upload;
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

        try {
            $nameFile = $this->_uploadBusiness->uploadImagesToTempPath($photos);
        } catch (\Exception $e) {
            #Log error
            return response()->json([
                'message' => 'Upload fail',
            ], Constant::CODE_ERROR);
        }

        return response()->json([
            'message' => 'Image saved Successfully',
            'data' => $nameFile,
        ], Constant::CODE_OKE);
    }

    /**
     * Remove the images from the storage.
     *
     * @param Request $request
     */
    public function removeImage(Request $request)
    {
        try {
            $this->_uploadBusiness->removeFile($request->id);
        } catch (\Exception $e) {
            #Log error
        }

        return response()->json(['message' => 'File successfully delete'], Constant::CODE_OKE);
    }
}
