<?php

namespace App\Traits;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait ImageUploader
{

    public function imageUploadByName(Request $request, $input)
    {
        if ($request->hasFile($input)) {


            $folder_name = auth()->id();
            $image = $request->file($input);
            $ext = $image->getClientOriginalExtension();

            $uploaded_name_ext = $image->getClientOriginalName();
            $uploaded_name_ext = explode('.', $uploaded_name_ext);
            $uploaded_name = $uploaded_name_ext[0];
            $uploaded_name = str_replace(' ', '-', $uploaded_name);

            $name_input = $request->input('entitle');
            $rand = rand(0, 100);
            if (isset($name_input) && !empty($name_input)) {
                $name_input = str_replace(' ', '-', $name_input);


                $name = $name_input . $rand . '.' . $ext;
            } else {
                $name = $uploaded_name . $rand . '.' . $ext;

            }







            $destinationPath = public_path('/storage/images/' . $folder_name);
            // Storage::disk('local')->put($name, $image);


            $masir = '/images/' . $folder_name . '/' . $name;
            $request->file($input)->storeAs('public/images/' . $folder_name . '/', $name);
            $image->move($destinationPath, $name);

            $waterMarkUrl = 'https://sahandpress.ir/storage//photos/1/download.jpg';
            $image = Image::make(public_path('/storage/images/' . $folder_name. '/'.$name));
            /* insert watermark at bottom-left corner with 5px offset */
            $image->insert($waterMarkUrl, 'bottom-left', 5, 5);
            $image->save(public_path('/storage/images/' . $folder_name. '/'.$name));


            return $masir;

        }
    }


    public function imageUploadExternalLink($url)
    {


        $image_content = file_get_contents($url);
        $name = substr($url, strrpos($url, '/') + 1);


        $folder_name = auth()->id();

        $destinationPath = public_path('/images/' . $folder_name);
        // Storage::disk('local')->put($name, $image);


        $masir = '/images/' . $folder_name . '/' . $name;



        Storage::put($masir, $image_content);
        Storage::disk('rss')->put($folder_name . '/' . $name, $image_content);



        // $waterMarkUrl = 'https://sahandpress.ir/storage/photos/1/download.jpg';
        // $image = Image::make(Storage::url($masir));
        // /* insert watermark at bottom-left corner with 5px offset */
        // $image->insert($waterMarkUrl, 'bottom-left', 5, 5);
        // $image->save(Storage::url($masir));

$otpath = 'app'.$masir;
       
// $test = storage_path($otpath);

// $waterMarkUrl = Image::make(url('admin-theme/assets/media/image/bannerp.png'));

// $waterMarkUrl->resize(180,80);

//             $image = Image::make($test);
//             /* insert watermark at bottom-left corner with 5px offset */
//             $image->insert($waterMarkUrl, 'bottom-left', 0, 60);
//             $image->save($test);
            
        return $otpath;


    }


    public function videoUpload(Request $request, $input)
    {


        if ($request->hasFile($input)) {

            $folder_name = auth()->id();

            $image = $request->file($input);
            $ext = $image->getClientOriginalExtension();

            $rand = rand(0, 100);
            $name = time() . $rand . '.' . $ext;

            $destinationPath = public_path('/storage/videos/' . $folder_name);
//            Storage::disk('local')->put($name, $image);


            $masir = '/videos/' . $folder_name . '/' . $name;
            $request->file($input)->storeAs('public/videos/' . $folder_name . '/', $name);
            $image->move($destinationPath, $name);
            return $masir;

        }
    }

    public function videoUploadByName(Request $request, $input)
    {


        if ($request->hasFile($input)) {

            $folder_name = auth()->id();

            $image = $request->file($input);
            $ext = $image->getClientOriginalExtension();
            $uploaded_name_ext = $image->getClientOriginalName();
            $uploaded_name_ext = explode('.', $uploaded_name_ext);
            $uploaded_name = $uploaded_name_ext[0];
            $uploaded_name = str_replace(' ', '-', $uploaded_name);

            $name_input = $request->input('entitle');
            $name_input = str_replace(' ', '-', $name_input);
            $rand = rand(0, 100);
            if (isset($name_input) && !empty($name_input)) {

                $name = $name_input . $rand . '.' . $ext;
            } else {
                $name = $uploaded_name . $rand . '.' . $ext;

            }

            $destinationPath = public_path('/storage/videos/' . $folder_name);

            $masir = '/videos/' . $folder_name . '/' . $name;
            $request->file($input)->storeAs('public/videos/' . $folder_name . '/', $name);
            $image->move($destinationPath, $name);
            return $masir;

        }
    }

    public function podcastUpload(Request $request, $input)
    {


        if ($request->hasFile($input)) {

            $folder_name = auth()->id();

            $image = $request->file($input);
            $ext = $image->getClientOriginalExtension();

            $rand = rand(0, 100);
            $name = time() . $rand . '.' . $ext;

            $destinationPath = public_path('/storage/podcasts/' . $folder_name);
//            Storage::disk('local')->put($name, $image);


            $masir = '/podcasts/' . $folder_name . '/' . $name;
            $request->file($input)->storeAs('public/podcasts/' . $folder_name . '/', $name);
            $image->move($destinationPath, $name);
            return $masir;

        }
    }

    public function podcastUploadByName(Request $request, $input)
    {


        if ($request->hasFile($input)) {

            $folder_name = auth()->id();

            $image = $request->file($input);
            $ext = $image->getClientOriginalExtension();
            $uploaded_name_ext = $image->getClientOriginalName();
            $uploaded_name_ext = explode('.', $uploaded_name_ext);
            $uploaded_name = $uploaded_name_ext[0];
            $uploaded_name = str_replace(' ', '-', $uploaded_name);

            $name_input = $request->input('entitle');
            $name_input = str_replace(' ', '-', $name_input);
            $rand = rand(0, 100);
            if (isset($name_input) && !empty($name_input)) {

                $name = $name_input . $rand . '.' . $ext;
            } else {
                $name = $uploaded_name . $rand . '.' . $ext;

            }

            $destinationPath = public_path('/storage/podcasts/' . $folder_name);
//            Storage::disk('local')->put($name, $image);


            $masir = '/podcasts/' . $folder_name . '/' . $name;
            $request->file($input)->storeAs('public/podcasts/' . $folder_name . '/', $name);
            $image->move($destinationPath, $name);
            return $masir;

        }
    }

    public function imageUploadData(Request $request, $input)
    {


        if ($request->hasFile($input)) {

            $image = $request->file($input);
            $ext = $image->getClientOriginalExtension();

            $rand = rand(0, 100);
            $name = time() . $rand . '.' . $ext;

            $destinationPath = public_path('/images');
//            Storage::disk('local')->put($name, $image);


            $request->file($input)->storeAs('public', $name);
            $image->move($destinationPath, $name);
            return $name;

        }
    }

    public function get_image_update(Request $request, $object)
    {
        $image_request = $request->file('image');
        if (isset($image_request) && !empty($image_request)) {
            $image = $this->imageUpload($request, 'image');
        } else {
            $image = $object->image;
        }

        return $image;
    }

    public function imageUpload(Request $request, $input)
    {


        if ($request->hasFile($input)) {

            $folder_name = auth()->id();

            $image = $request->file($input);
            $ext = $image->getClientOriginalExtension();

            $rand = rand(0, 100);
            $name = time() . $rand . '.' . $ext;

            $destinationPath = public_path('/storage/images/' . $folder_name);
//            Storage::disk('local')->put($name, $image);


            $masir = '/images/' . $folder_name . '/' . $name;
            $request->file($input)->storeAs('public/images/' . $folder_name . '/', $name);
            $image->move($destinationPath, $name);
            return $masir;

        }
    }

    public function get_avatar_update(Request $request, $object)
    {
        $image_request = $request->file('avatar');
        if (isset($image_request) && !empty($image_request)) {
            $image = $this->imageUpload($request, 'avatar');
        } else {
            $image = $object->avatar;

        }

        return $image;
    }

    public function get_file_update(Request $request, $name, $object)
    {
        $file_request = $request->file($name);

        if (isset($file_request) && !empty($file_request)) {

            $file = $this->fileUpload($request, $name);
        } else {
            $file = $object->videos[0]->src;
        }

        return $file;
    }

    public function fileUpload(Request $request, $input)
    {


        if ($request->hasFile($input)) {

            $folder_name = auth()->id();

            $image = $request->file($input);
            $ext = $image->getClientOriginalExtension();

            $rand = rand(0, 100);
            $name = time() . $rand . '.' . $ext;

            $destinationPath = public_path('/storage/files/' . $folder_name);
//            Storage::disk('local')->put($name, $image);


            $masir = '/files/' . $folder_name . '/' . $name;
            $request->file($input)->storeAs('public/files/' . $folder_name . '/', $name);
            $image->move($destinationPath, $name);
            return $masir;

        }
    }


    public function fileUploadByName(Request $request, $input)
    {


        if ($request->hasFile($input)) {

            $folder_name = auth()->id();

            $image = $request->file($input);
            $ext = $image->getClientOriginalExtension();

            $uploaded_name_ext = $image->getClientOriginalName();
            $uploaded_name_ext = explode('.', $uploaded_name_ext);
            $uploaded_name = $uploaded_name_ext[0];
            $uploaded_name = str_replace(' ', '-', $uploaded_name);

            $name_input = $request->input('entitle');
            $name_input = str_replace(' ', '-', $name_input);
            $rand = rand(0, 100);
            if (isset($name_input) && !empty($name_input)) {

                $name = $name_input . $rand . '.' . $ext;
            } else {
                $name = $uploaded_name . $rand . '.' . $ext;

            }


            $destinationPath = public_path('/storage/files/' . $folder_name);
//            Storage::disk('local')->put($name, $image);


            $masir = '/files/' . $folder_name . '/' . $name;
            $request->file($input)->storeAs('public/files/' . $folder_name . '/', $name);
            $image->move($destinationPath, $name);
            return $masir;

        }
    }

}
