<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flashmsg;
use Image;
use Auth;
use File;

class FlashmsgController extends Controller
{
    public function index(Request $request)
    {
        $q =  $request->input('q');
        if($q!=""){

            $flash_msgs = Flashmsg::where('active', 1)
                        ->where('title','LIKE','%'.$q.'%')
                        ->orderBy('created_at', 'DESC')
                        ->paginate(10);

            $flash_msgs->appends(['q' => $q]);

        }else{

            $flash_msgs = Flashmsg::where('active', 1)
                        ->orderBy('created_at', 'DESC')
                        ->paginate(10);
        }

        return view('flashmsg.index', compact('flash_msgs'));
    }

    public function createMessage(Request $request)
    {
        return view('flashmsg.create');
    }
    
    public function saveMessage(Request $request)
    {
        $requestData = $request->all();

        $active_status = $request->get('active');
        if ($active_status == 1) {
            $requestData['active'] = 1;
        } else {
            $requestData['active'] = 0;
        }

        $originalImage= $request->file('file');
        if(!empty($originalImage)){

            $image_name = time().$originalImage->getClientOriginalName();
            $thumbnailImage = Image::make($originalImage->getRealPath());

            $thumbnailPath = public_path().'/project_img/flashmsgs/thumbnail/';
            $originalPath = public_path().'/project_img/flashmsgs/images/';

            // $thumbnailPath = public_path('/flashmsgs/thumbnail/');
            // $originalPath = public_path('/flashmsgs/images/');

            $thumbnailImage->save($originalPath.$image_name);
            $thumbnailImage->resize(150,150);
            $thumbnailImage->save($thumbnailPath.$image_name); 

        }else{
            $image_name = "";
        }

        $requestData['file'] = $image_name;
        $requestData['description'] = $request->get('messageData');

        $flashmsg = Flashmsg::create($requestData);

        if ($flashmsg) {
            return response()->json(['data' => $flashmsg, 'error' => true, 'msg' => "Your flash message has been saved"], 201);
        }
        return response()->json(['data' => "null", 'error' => false, 'msg' => "Unable to add your flash message."], 200);
    }

    public function flashmsgView(Request $request, $id)
    {
        $fmsg = Flashmsg::findOrFail($id);
        return view('flashmsg.view', compact('fmsg'));
    }

    public function flashmsgEdit(Request $request, $id)
    {
        $fmsg = Flashmsg::findOrFail($id);
        return view('flashmsg.edit', compact('fmsg'));
    }

    public function flashmsgUpdate(Request $request)
    {
        $id = $request->get('id');

        $flashmsg = Flashmsg::find($id);
        $requestData = $request->all();

        $active_status = $request->get('active');
        if ($active_status == 1) {
            $requestData['active'] = 1;
        } else {
            $requestData['active'] = 0;
        }

        $originalImage= $request->file('file');
        if(!empty($originalImage)){

            $image_name = time().$originalImage->getClientOriginalName();
            $thumbnailImage = Image::make($originalImage->getRealPath());

            $thumbnailPath = public_path().'/project_img/flashmsgs/thumbnail/';
            $originalPath = public_path().'/project_img/flashmsgs/images/';

            $thumbnailImage->save($originalPath.$image_name);
            $thumbnailImage->resize(150,150);
            $thumbnailImage->save($thumbnailPath.$image_name); 

        }else{
            $image_name = $flashmsg->file;
        }

        $requestData['file'] = $image_name;
        $requestData['description'] = $request->get('messageData');

        $flsmsg = $flashmsg->update($requestData);

        if ($flsmsg) {
            return response()->json(['data' => $flsmsg, 'error' => true, 'msg' => "Your flash message has been updated"], 201);
        }
        return response()->json(['data' => "null", 'error' => false, 'msg' => "Unable to add your flash message."], 200);
    }

    public function flashmsgDelete(Request $request, $id)
    {
        $flashmsg = Flashmsg::find($id);
        $requestData['active'] = 0;

        $flsmsg = $flashmsg->update($requestData);

        return redirect('/flash/messages')->with("success","The flash message has been deleted.");
    }
    
}
