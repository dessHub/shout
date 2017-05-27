<?php

namespace App\Http\Controllers;

use App\Report;
use App\User;
use Validator;
use App\Http\Requests;
use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use SMSProvider;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     function __construct() {
         $this->middleware('auth');
     }

     public function showReport(Request $request) {
         return view('report');

     }

     protected function postReport(Request $request)
     {

      $rules = array(
              'admNo' => 'required|max:255',
              'guardian_fname' => 'required|max:255',
              'guardian_lname' => 'required|max:255',
              'fname' => 'required|max:255',
              'lname' => 'required|max:255',
              'school' => 'required|max:255',
              'guardian_phone' => 'required|max:255',
              'user_id' => 'required|max:255',
              'complaint' => 'required|min:20'
          );

          $validator = Validator::make(Input::all(), $rules);

    // check if the validator failed -----------------------
    if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        return Redirect::to('report')
            ->withErrors($validator);

    } else {
        // validation successful ---------------------------

        // report has passed all tests!
        // let him enter the database

        $sms = "You have a new complaint.";
        // create the data for report
        $report = new Report;
        $report->fname     = Input::get('fname');
        $report->lname    = Input::get('lname');
        $report->user_id = Input::get('user_id');
        $report->guardian_fname  = Input::get('guardian_fname');
        $report->guardian_lname  = Input::get('guardian_lname');
        $report->guardian_phone = Input::get('guardian_phone');
        $report->admNo  = Input::get('admNo');
        $report->school    = Input::get('school');
        $report->complaint = Input::get('complaint');
        $report->status = Input::get('status');

        // save report
        $report->save();

        $text = "$report->fname has file an abuse report.";


         SMSProvider::sendMessage($report->guardian_phone, $text);
         $admins = User::where('role','=','admin')->get();

         foreach($admins as $admin) {
        SMSProvider::sendMessage($admin->phoneNo, $sms);
    }

        // redirect ----------------------------------------
        // redirect our user back to the form so they can do it all over again
        return Redirect::to('report');

     }
   }

     public function myReports($user_id) {
         $name = Report::where('user_id','=',$user_id)->get();
         return view('myreports')->with('reports', $name);

     }

     public function viewPending() {
           $name = Report::where(['status'=> 'pending'])->get();
           return view('viewreports')->with('reports', $name);

      }

     public function receive(Request $request) {
        $report_obj = new Report();
        $report_obj->id = Request::input('id');
        $report = Report::find($report_obj->id); // Eloquent Model
        $report->update(Input::only('status'));
        return redirect('/pending');
    }

      public function allReports() {
          $name = Report::get();
          return view('reports')->with('reports', $name);

      }

      public function viewClosing() {
            $name = Report::where(['status'=> 'received'])->get();
            return view('closing')->with('reports', $name);

       }

      public function close(Request $request) {
         $report_obj = new Report();
         $report_obj->id = Request::input('id');
         $report = Report::find($report_obj->id); // Eloquent Model
         $report->update(Input::only('status'));
         return redirect('/close');
     }

     public function viewClosed() {
           $name = Report::where(['status'=> 'closed'])->get();
           return view('reports')->with('reports', $name);

      }

      public function viewUsers() {
            $name = User::where(['role'=> 'normal'])->get();
            return view('users')->with('users', $name);

       }

      public function makeAdmin(Request $request) {
         $user_obj = new User();
         $user_obj->id = Request::input('id');
         $user = User::find($user_obj->id); // Eloquent Model
         $user->update(Input::only('role'));
         return redirect('/admins');
     }

     public function viewAdmins() {
           $name = User::where(['role'=> 'admin'])->get();
           return view('admins')->with('users', $name);

      }






}
