<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Traits\AuthHelperTrait;

class VideoController extends Controller
{
    //
    use AuthHelperTrait;

    public function videoList()
    {
        $userId = $this->getAuthenticatedUserId();
        $videos = Video::where('user_id',$userId)->get()->toArray();
        return view('customer.Video.videoList',compact('videos'));
    }

    public function addVideo(Request $request)
    {

        $userId = $this->getAuthenticatedUserId();

        if($request->isMethod('post')){
            $video = new Video();
            $video->title = $request->input('title');
            $video->user_id = $userId;
        
            if ($request->hasFile('video_file')) {
                $videoFile = $request->file('video_file');
                $videoFileName = time() . '.' . $videoFile->getClientOriginalExtension();
                $videoFile->move(public_path('storage/videos'), $videoFileName);
                $video->video_path = $videoFileName;
            }
        
            $video->save();

            return redirect()->route('videoList');
        }
        return view('customer.Video.addVideo');
    }

    public function deleteVideo(Request $request, $id)
    {
        $id = base64_decode($id);
        $video = Video::find($id);
        // Delete the branch record
        $video->delete();

        return redirect()->route('videoList')->with('success', 'Video deleted successfully.');
    }


}
