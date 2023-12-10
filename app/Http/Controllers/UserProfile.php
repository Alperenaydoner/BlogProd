<?php

namespace App\Http\Controllers;

use App\Http\Requests\Mail\BlogMailRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomMail;

class UserProfile extends Controller
{

    public function blog()
    {
        $info = User::with(['education', 'experiences', 'projects', 'skills', 'languages', 'interests'])->first();

        if (!empty($info)) {
            return view('index', ['user' => $info]);
        } else {
            return redirect()->back()->withErrors('Somthing went wrong');
        }

        return view('index', ['user' => $info]);
    }

    public function create()
    {
        return view('create');
    }

    public function edit()
    {
        $info = User::with(['education', 'experiences', 'projects', 'skills', 'languages', 'interests'])->first();

        if (!empty($info)) {
            return view('edit', ['user' => $info]);
        } else {
            return redirect()->back()->withErrors('Somthing went wrong');
        }
    }

    public function update(Request $request)
    {
        $user = User::first();
        $userUpdate = $user->updateOrCreate(
            [],
            [
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'website' => $request->website,
                'linkedin_link' => $request->linkedin_link,
                'github_link' => $request->github_link,
                'twitter' => $request->twitter,
                'first_name' => $request->first_name,
                'last_name ' => $request->last_name,
                'profile_title' => $request->profile_title,
                'about_me' => $request->about_me,
            ]
        );

        if ($request->file('image_path')) {
            $picture = $request->file('image_path')->getClientOriginalName();
            $request->file('image_path')->move(public_path('assets/images/'), $picture);

            // Resim yolu sütununu güncelleyin
            $userUpdate->image_path = $picture;
            $userUpdate->save();
        }

        //Skills Eklenecek . Skills
        if(isset($request->skill_name)){

            foreach ($request->skill_name as $key => $value) {
                $skill[$key]['skill_name'] = $value;
                $skill[$key]['skill_percentage'] = $request->skill_percentage[$key];
            }

            $user->skills()->delete();
            $user->skills()->createMany($skill);
        }

                
        //Eğitim
        /*$user->education()->delete();
        $user->education()->createMany($request->education);

        //Deneyim //Çalışmıyor.

        $user->experiences()->delete();
        $user->experiences()->createMany($request->experience);

        //Projects Eklenecek. Projects
        $user->projects()->delete();
        $user->projects()->createMany($request->projects);



        //Languages Eklenecek . Languages

        //Interests Eklenecek . Interests
*/
        return redirect()->back()->withSuccess("User Profile updated successfully");
    }

    public function blogMail(Request $request){

        if(empty($request->email) || empty($request->name) || empty($request->subject) || empty($request->message)){
            return response()->json(['success' => false, 'message' => 'Mail Alanlarını doldurunuz.']);
        }
        try {
            // E-posta gönderme işlemi
            $messageContent = $request->mail . ' adresi iletişime geçmek istiyor. Mail içeriği: ' . $request->message;
            $subject = $request->subject;
            
            Mail::to(env('MAIL_FROM_ADDRESS', 'hello@example.com'))->send(new CustomMail($subject, $messageContent));
    
            // E-posta başarıyla gönderildi
            return response()->json(['success' => true, 'message' =>'Mailiniz iletildi']);
        } catch (\Exception $e) {
            // Hata durumunda hatayı logla veya farklı bir işlem yap
            \Log::error('E-posta gönderme hatası: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Hata oluştu lüfen tekrar deneyiniz']);
        }


    }
}
