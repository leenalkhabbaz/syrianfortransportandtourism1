<?php
namespace App\ImageClass;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class images
{
    public static function uplodimage($request,$id,$uni)

    {
        if(!$request->hasFile('fileName')) {
            return response()->json(['upload_file_not_found'], 400);
        }

        $allowedfileExtension=['pdf','jpg','png','PNG','JPG','mp4','MP4','jpeg','JPEG'];
        $files = $request->file('fileName');

        $errors = [];
           foreach ($files as $file) {
            //dd($request->fileName);

            $extension = $file->getClientOriginalExtension();

            $check = in_array($extension,$allowedfileExtension);

            if($check) {
                foreach($request->fileName as $mediaFiles) {
                 //   dd($request->fileName);
                    //$name = $mediaFiles->getClientOriginalName();
                    $path = Storage::disk('public')->put('',$mediaFiles);
                    //$path = $mediaFiles->storeAs('',$name,'public');
                    $image = new Image();
                    $image->url= $path;
                    if($uni=='beaches')
                    {
                        $image->beach_id=$id;
                    }
                    if($uni=='rooms')
                    {
                        $image->room_id=$id;
                    }
                    if($uni=='hotel')
                    {
                        $image->hotel_id=$id;
                    }
                    if($uni=='tours')
                    {
                        $image->tour_id=$id;
                    }
                    if($uni=='ads')
                    {
                        $image->ad_id=$id;
                    }
                    if($uni=='lines')
                    {
                        $image->line_id=$id;
                    }

                    $image->save();
                }
            } else {
                return response()->json(['invalid_file_format'], 422);
            }

            return response()->json(['file_uploaded'], 200);

        }
}
}
