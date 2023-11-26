<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfile extends Controller
{

    public function blog()
    {
        $info = User::with(['education','experience','projects','skills','languages','interests'])->first();
        
        if (!empty($info)) {
            return view('blog', ['user' => $info]);
        } else {
            return redirect()->back()->withErrors('Somthing went wrong');
        }

        return view('view', ['user' => $info]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        /*$contact_info = new ContactInformation();
        $contact_info->user_id          = $personal_information->id;
        $contact_info->email            = $request->email;
        $contact_info->phone_number     = $request->phone_number;
        $contact_info->website          = $request->website;
        $contact_info->linkedin_link    = $request->linkedin_link;
        $contact_info->github_link      = $request->github_link;
        $contact_info->twitter          = $request->twitter;
        $contact_info->save();


        $edu_count = count($request->degree_title);
        if ($edu_count != 0) {
            for ($i = 0; $i < $edu_count; $i++) {

                $education_info = new Education();
                $education_info->user_id                = $personal_information->id;
                $education_info->degree_title           = $request->degree_title[$i];
                $education_info->institute              = $request->institute[$i];
                $education_info->edu_start_date         = $request->edu_start_date[$i];
                $education_info->edu_end_date           = $request->edu_end_date[$i];
                $education_info->education_description  = $request->education_description[$i];
                $education_info->save();
            }
        }


        $exp_count = count($request->job_title);
        if ($exp_count != 0) {
            for ($i = 0; $i < $exp_count; $i++) {

                $experience_info = new Experience();
                $experience_info->user_id          = $personal_information->id;
                $experience_info->job_title        = $request->job_title[$i];
                $experience_info->organization     = $request->organization[$i];
                $experience_info->job_start_date   = $request->job_start_date[$i];
                $experience_info->job_end_date     = $request->job_end_date[$i];
                $experience_info->job_description  = $request->job_description[$i];
                $experience_info->save();
            }
        }

        $project_count = count($request->project_title);
        if ($project_count != 0) {
            for ($i = 0; $i < $project_count; $i++) {

                $project_info = new Projects();
                $project_info->user_id              = $personal_information->id;
                $project_info->project_title        = $request->project_title[$i];
                $project_info->project_description  = $request->project_description[$i];
                $project_info->save();
            }
        }

        $skill_count = count($request->skill_name);
        if ($skill_count != 0) {
            for ($i = 0; $i < $skill_count; $i++) {

                $skill_info = new Skills();
                $skill_info->user_id           = $personal_information->id;
                $skill_info->skill_name        = $request->skill_name[$i];
                $skill_info->skill_percentage  = $request->skill_percentage[$i];
                $skill_info->save();
            }
        }

        $lang_count = count($request->language);
        if ($lang_count != 0) {
            for ($i = 0; $i < $lang_count; $i++) {

                $language_info = new Languages();
                $language_info->user_id         = $personal_information->id;
                $language_info->language        = $request->language[$i];
                $language_info->language_level  = $request->language_level[$i];
                $language_info->save();
            }
        }

        $interest_count = count($request->interest);
        if ($interest_count != 0) {
            for ($i = 0; $i < $interest_count; $i++) {

                $interest_info = new Interests();
                $interest_info->user_id         = $personal_information->id;
                $interest_info->interest        = $request->interest[$i];
                $interest_info->save();
            }
        }

        return redirect()->route('blog')->withSuccess("User Profile created successfully");*/
    }


    public function edit()
    {
        $info = User::with(['education','experience','projects','skills','languages','interests'])->first();

        if (!empty($info)) {
            return view('edit', ['user' => $info]);
        } else {
            return redirect()->back()->withErrors('Somthing went wrong');
        }
    }

    public function update(Request $request)
    {
        $user = User::first();

        if ($request->verify == 1) {
            $id = $request->user_id;

            /*$personal_info = PersonalInformation::find($id);
            $personal_info->first_name        = $request->first_name;
            $personal_info->last_name         = $request->last_name;
            $personal_info->profile_title     = $request->profile_title;
            $personal_info->about_me          = $request->about_me;
            if ($request->file('image_path')) {
                $picture       = !empty($request->file('image_path')) ? $request->file('image_path')->getClientOriginalName() : '';
                $request->file('image_path')->move(public_path('assets/images/'), $picture);
            }
            if (!empty($request->file('image_path'))) {
                $personal_info->image_path        = isset($picture) && !empty($picture) ? $picture : '';
            }
            $personal_info->save();*/

            $contact_info = $user->contactInformation()->updateOrCreate(
                [],
                [
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                    'website' => $request->website,
                    'linkedin_link' => $request->linkedin_link,
                    'github_link' => $request->github_link,
                    'twitter' => $request->twitter,
                ]
            );


            //Eğitim Eklenecek.


            //Deneyim Eklenecek. Experience

            //Projects Eklenecek. Projects

            //Skills Eklenecek . Skills


            //Languages Eklenecek . Languages

            //Interests Eklenecek . Interests

        }

        return redirect()->back()->withSuccess("User Profile updated successfully");
    }

}
