<?php


namespace MainSettings\Repositories;

use MainSettings\Models\MainSetting;
use File;

class MainSettingRepository implements MainSettingRepositoryInterface
{
    public function allData(){
        return MainSetting::all();
    }

    public function dataWithConditions( $conditions){
        $wheres = '';
        foreach ($conditions as $key => $value){
            $wheres .= '->where("'.$key.'","'.$key.'")';
        }
        $wheres = str_replace("'","",$wheres);
        return MainSetting::$wheres->get();
    }

    public function getDataId($id){
        return MainSetting::findOrfail($id);
    }

    public function saveData($request)
    {
        $title = json_encode($request->title);
        $content = json_encode($request->content);
        $mobile = ($request->mobile) ? $request->mobile :  null;
        $email = ($request->email) ? $request->email :  null;
        $address = ($request->address) ? $request->address :  null;
        $meta_title = ($request->meta_title) ? json_encode($request->meta_title) :  null;
        $meta_desc = ($request->meta_desc) ? json_encode($request->meta_desc) :  null;
        $meta_keywords = ($request->meta_keywords) ? json_encode($request->meta_keywords) :  null;
        $socialmedia = ($request->soicalmedia) ? json_encode($request->soicalmedia) :  null;
        $home_title = ($request->home_title) ? json_encode($request->home_title) :  null;
        $home_content = ($request->home_content) ? json_encode($request->home_content) :  null;

        $mainsettings = MainSetting::findOrfail(1);

        $pathImage = public_path().'/uploads/backend/settings/';
        File::makeDirectory($pathImage, $mode = 0777, true, true);

        if ($request->logo) {
            foreach ($request->logo as $key => $value) {
                $imageName = $key.'_logo.'.$value->getClientOriginalExtension();
                $value->move($pathImage, $imageName);
                $logos[$key] = $imageName;
            }
            $logo = json_encode($logos);
            $mainsettings->logo = $logo;
        }

        if ($request->home_video != null) {
            if ($request->hasFile('home_video')){
                $imageName = time().'.'.request()->home_video->getClientOriginalExtension();
                $request->home_video->move($pathImage, $imageName);
                $mainsettings->home_video = $imageName;
            }
        }


        $mainsettings->title = $title;
        $mainsettings->content = $content;
        $mainsettings->mobile = $mobile;
        $mainsettings->email = $email;
        $mainsettings->address = $address;
        $mainsettings->message_ctrl = ($request->message_ctrl == 'on') ? 1 : 0;
        $mainsettings->follow_ctrl = ($request->follow_ctrl == 'on') ? 1 : 0;
        $mainsettings->service_ctrl = ($request->service_ctrl == 'on') ? 1 : 0;

        $mainsettings->meta_title = $meta_title;
        $mainsettings->meta_desc = $meta_desc;
        $mainsettings->meta_keywords = $meta_keywords;
        $mainsettings->socialmedia = $socialmedia;
        $mainsettings->home_title = $home_title;
        $mainsettings->home_content = $home_content;

        $mainsettings->account_name = $request->account_name;
        $mainsettings->account_number = $request->account_number;
        $mainsettings->percentage = $request->percentage;
        $mainsettings->save();
    }
}
