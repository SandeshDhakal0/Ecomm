<?php
    function uploadImage($dir){
        $path = public_path().'/uploads/'.$dir;
        if(File::exists($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        //TODO: model function to fetch last inserted data, 10, 10
        $file_name = ucfirst($dir)."-".data('YmdHis').rand(0,99999999).image->getClientOriginalExtension();
        //$file_name = \Str::random(50).".".$request->image->getClientOriginalExtension();

        $success = image->move($path, $file_name);
        if($success){
           return $file_name;
        } else {
            return null;
        }
    }

    function deleteFile($dir, $file_name){
        $path = public_path().'/uploads/'.$dir;
        if(file_exists($path.'/'.$file_name)){
            unlink($path.'/'.$file_name);
        }
    }
