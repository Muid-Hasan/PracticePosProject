<?php

namespace App\Http\Controllers;

use ErrorException;
use Exception;
use App\Models\user;
use App\Mail\otpMail;
use App\Helper\JWTTOKEN;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class userController extends Controller
{
    function userRegistration(Request $request){

        try{
             user::create([
                'firstName'=>$request->input('firstName'),
                'lastName'=>$request->input('lastName'),
                'email'=>$request->input('email'),
                'mobile'=>$request->input('mobile'),
                'password'=>$request->input('password')
    
              ]);

              return response()->json([
                 'Status' => 'Success',
                 'Message' => 'Registration Successfull'
              ]);
        }
        catch(Exception $e){
            return response()->json([
            'Status'=>'Unsuccessful',
            'Message'=> 'Registration failed'
        ]);

        }
          
    }

       function userLogin(Request $request){
            $count= user::where('email','=',$request->input('email'))
                    ->where('password','=',$request->input('password'))
                    ->count();

             if($count==1){
                $token=JWTTOKEN::CreateToken($request->input('email'));
                return response()->json([
                    'status'=>'Success',
                    'Messsage'=>'Logged In Successfully!!!',
                   
                ],200)->cookie('Token',$token,60*60);
             } 
             else{
                
                return response()->json([
                    'status'=>'Failed',
                    'message'=>'unauthorized',
                   
                   
                ],401);
             }      
        }

    function sendOtpCode(Request $request){

        $email= request()->input('email');
        $otp=rand(1000,9999);

        $count=user::where('email','=',$email)->count();

        if($count==1){

            Mail::to($email)->send(new otpMail($otp));
            user::where('email','=',$email)->update(['otp'=>$otp]);

            return response()->json([
                'email'=>$email,
                'Status'=>'we send you a four digits OTP, Please Check Your Email'
            ],200);


        }
        else{
            response()->json([
                'status'=>'Failed',
                'message'=>'Unauthorised'

            ],400);
        }
        

    }

    function verifyToken(Request $request){
       $email= $request->input('email');
       $otp= $request->input('otp');

       $count= user::where('email','=',$email)
                    ->where('otp','=',$otp)
                    ->count();

        if($count==1){
            user::where('otp','=',$otp)->update(['otp'=>'0']);

            $token=JWTTOKEN::CreateTokenForSetPassword($request->input('email'));
            return response()->json([
                'status'=>'Success',
                'Messsage'=>'OTP varified Successfully!!!'
               
            ],200)->cookie('tuktukToken',$token,60*60);

        }
        else{
            return response()->json([
                'status'=>'Failed',
                'Message'=>'Unauthorised'
            ]);
        }
    }
    function ResetPassword(Request $request){
        try{
        $email=$request->header('email');
        $password=$request->input('password');
        user::where('email','=',$email)->update(['password'=>$password]);   

        return response()->json([
            'status'=>'Success',
            'message'=>'Pssword Reset Successfully!'

        ],200);
        }
        catch(ErrorException $e){
            
        return response()->json([
            'status'=>'Failed',
            'Message'=>'Something went wrong!'

        ]);
        }
     }

     function LoginPage(){
     return view('pages.auth.Login-Page');
    }
     function UserRegistrationPage(){
        return view('pages.auth.Registration-Page');
     }
     function SendOtpPage(){
        return view('pages.auth.SendOtp-Page');
     }
     function VerifyOtpPage(){
        return view('pages.auth.Verify-Otp-Page');
     }
     function ResetPasswordPage(){
        return view('pages.auth.Reset-Password-Page');
     }
     function DashBoardPage(){
        return view('pages.dashboard.DashBoard-Page');
     }
    
}
