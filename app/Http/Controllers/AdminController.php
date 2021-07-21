<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use DB;
use App\User;
use App\Holiday;
use App\AcademicHolidayCondition;
use App\NonAcademicHolidayCondition;
use App\Notification;
use App\Condition;

class AdminController extends Controller
{
    public function index()
    {
        $all_requests = DB::table('requests')->get();
        $count = $all_requests->count();

        $all_edit_requests = DB::table('edit-holidays-requests')->get();
        $count2 = $all_edit_requests->count();

        $requests_number = $count + $count2;
        
        return view('admin.index' , ['requests_number'=>$requests_number]);
    }

    public function Contact_Us(){
        $all_requests = DB::table('requests')->get();
        $count = $all_requests->count();

        $all_edit_requests = DB::table('edit-holidays-requests')->get();
        $count2 = $all_edit_requests->count();

        $requests_number = $count + $count2;
        
        return view('admin.Contact-Us' , ['requests_number'=>$requests_number]);
    }

    public function display_requests()
    {   
        $all_requests = DB::table('requests')->get();
        $count = $all_requests->count();

        $all_edit_requests = DB::table('edit-holidays-requests')->get();
        $count2 = $all_edit_requests->count();

        $requests_number = $count + $count2;

        return view('admin.requests', ['requests_number'=>$requests_number]);
    }

    public function accept_request($name, $role, $title, $date){
        $deletion = DB::table('requests')->where('name', '=', $name)->
        where('role', '=', $role)->where('title', '=', $title)->
        where('date', '=', $date)->delete();

        //Filling Notification Table
        $notification = new Notification();

        $notification->name = $name;
        $notification->role = $role;
        $notification->title = $title;
        $notification->date = $date;
        $notification->response = 'Accepted';
        $notification->save();

        //Filling Holiday Table
        $holiday = new Holiday();

        $holiday->name = $name;
        $holiday->role = $role;
        $holiday->title = $title;
        $holiday->date = $date;
        $holiday->save();

        //Sending email to doctor 
        $data = DB::table('users')->where('name', '=', $name)->get();
        foreach($data as $take_email){
        $email = $take_email->email;
        }

        $details = [
            'title' => 'Mail from Holidays System Responsible',
            'body' => 'Your Holiday on '.$date." is accepted because you are ".$title ,
            'name' => $name,
            'role' => $role,
            'title' => $title,
            'date' => $date
        ];

        Mail::to($email)->send(new SendMail($details));

        return redirect()->back()->with('accepted', 'Holiday Accepted, Email Sent');
    }

    public function decline_request($name, $role, $title, $date){
        $deletion = DB::table('requests')->where('name', '=', $name)->
        where('role', '=', $role)->where('title', '=', $title)->
        where('date', '=', $date)->delete();

        //Filling Notification Table
        $notification = new Notification();

        $notification->name = $name;
        $notification->role = $role;
        $notification->title = $title;
        $notification->date = $date;
        $notification->response = 'Rejected';
        $notification->save();

        //Sending email to doctor 
        $data = DB::table('users')->where('name', '=', $name)->get();
        foreach($data as $take_email){
        $email = $take_email->email;
        }

        $details = [
            'title' => 'Mail from Holidays System Responsible',
            'body' => 'Your Holiday on '.$date." is rejected because it is not a convincing reason"
        ];

        Mail::to($email)->send(new SendMail($details));

        return redirect()->back()->with('accepted', 'Holiday Rejected, Email Sent');
    }

    public function accept_edit_request($name, $role, $title, $previousDate, $newDate){
        $deletion = DB::table('edit-holidays-requests')->where('name', '=', $name)->
        where('role', '=', $role)->where('title', '=', $title)->
        where('previousDate', '=', $previousDate)->where('newDate', '=', $newDate)->delete();

        $notification = new Notification();
        $notification->name = $name;
        $notification->role = $role;
        $notification->title= $title;
        $notification->date = $newDate;
        $notification->response = 'Edited';
        $notification->save();

        $edit_holiday_table = DB::table('holidays')->where('name', '=', $name)->where('role', '=', $role)
        ->where('date', '=', $previousDate)
        ->update([
            "name" => $name,
            "role" => $role,
            "title" => $title,
            "date" => $newDate,
        ]);

        //Sending email to doctor 
        $data = DB::table('users')->where('name', '=', $name)->get();
        foreach($data as $take_email){
        $email = $take_email->email;
        }

        $details = [
            'title' => 'Mail from Holidays System Responsible',
            'body' => 'Your Holiday on '.$previousDate." has been Changed to ".$newDate." because you are ".$title 
        ];

        Mail::to($email)->send(new SendMail($details));

        return redirect()->back()->with('accepted', 'Edited Successfully, Email Sent');
    }

    public function decline_edit_request($name, $role, $title, $previousDate, $newDate){
        $deletion = DB::table('edit-holidays-requests')->where('name', '=', $name)->
        where('role', '=', $role)->where('title', '=', $title)->
        where('previousDate', '=', $previousDate)->where('newDate', '=', $newDate)->delete();

        $notification = new Notification();
        $notification->name = $name;
        $notification->role = $role;
        $notification->title= $title;
        $notification->date = $newDate;
        $notification->response = 'Not Edited';
        $notification->save();


        //Sending email to doctor 
        $data = DB::table('users')->where('name', '=', $name)->get();
        foreach($data as $take_email){
        $email = $take_email->email;
        }

        $details = [
            'title' => 'Mail from Holidays System Responsible',
            'body' => 'Your Holiday on '.$previousDate." has not been Edited because it is not a convincing reason!" 
        ];

        Mail::to($email)->send(new SendMail($details));

        return redirect()->back()->with('accepted', 'Holiday Not Edited, Email Sent');
    }

    public function deleteuser($email)
    {
        $this_user = User::where('email', '=', $email)->get();

        foreach($this_user as $user){
            $role = $user->role;
            $name = $user->name;
        }

        $delete_holidays = DB::table('holidays')->where('name', '=', $name)->where('role','=', $role)->delete();
        $delete_requests = DB::table('requests')->where('name', '=', $name)->where('role','=', $role)->delete();
        $delete_notifications = DB::table('notifications')->where('name', '=', $name)->where('role','=', $role)->delete();
        $delete_edit_requests = DB::table('edit-holidays-requests')->where('name', '=', $name)->where('role','=', $role)->delete();

        if($role == 'admin'){
            return redirect()->back()->with('NotDeleted', 'No Permission to delete this user!');
        }
        else{

        $deletion = DB::table('users')->where('email', '=', $email)->delete();
        if($deletion === true){
        return redirect()->back()->with('NotDeleted', 'Something Went Wrong');
        }
        else {
        return redirect()->back()->with('Deleted', 'Deleted Successfully');
        }
        return redirect()->back();
    }
}

    public function EditUserModal($email)
    {
        $this_user = User::where('email', '=', $email)->get();

        foreach($this_user as $user){
            $name = $user->name;
            $role = $user->role;
        }

        if($role == 'admin'){
            return redirect()->back()->with('NotDeleted', 'It is Better If you dont edit this User!');
        }
        else{
        return view('admin.edit-user', ['name'=>$name, 'email'=>$email, 'role'=>$role]);
        }
    }    

    public function edituser(Request $request,  $email)
    {
        $get_old_name = DB::table('users')->where('email', '=', $email)->get();
        foreach($get_old_name as $name){
            $old_name = $name->name;
        }

        $edit_request_table = DB::table('requests')->where('name', '=', $old_name)
        ->update([
            "name" => $request->name,
            "role" => $request->role,
        ]);

        $edit_holiday_table = DB::table('holidays')->where('name', '=', $old_name)
        ->update([
            "name" => $request->name,
            "role" => $request->role,
        ]);

        $edit_user_table = DB::table('users')->where('email', '=', $email)
        ->update([
            "name" => $request->name,
            "role" => $request->role,
        ]);

        if($edit_user_table == true){
            return redirect()->guest('/admin')->with('Edited', 'Edited Successfully');
        }
        else{
            return redirect()->guest('/admin')->with('NotEdited', 'Something Went Wrong');
        }
    }

    public function Manage_Academic_Holidays(Request $request){
        $sum_all_holidays = $request->input('SelectHolidaysInJanuary') + $request->input('SelectHolidaysInFebruary')
        + $request->input('SelectHolidaysInMarch') + $request->input('SelectHolidaysInApril') + $request->input('SelectHolidaysInMay')
        + $request->input('SelectHolidaysInjune') + $request->input('SelectHolidaysInJuly') + $request->input('SelectHolidaysInAugust') 
        + $request->input('SelectHolidaysInSeptember') + $request->input('SelectHolidaysInOctober') + $request->input('SelectHolidaysInNovember')
        + $request->input('SelectHolidaysInDecember');

        if($sum_all_holidays == $request->input('SelectHolidaysPerYear') )
        {
            $Condition = new Condition();

            $Condition->name = $request->input('Name');
            $Condition->role = $request->input('Role');
            $Condition->yearly = $request->input('SelectHolidaysPerYear');
            $Condition->january = $request->input('SelectHolidaysInJanuary');
            $Condition->february = $request->input('SelectHolidaysInFebruary');
            $Condition->march = $request->input('SelectHolidaysInMarch');
            $Condition->april = $request->input('SelectHolidaysInApril');
            $Condition->may = $request->input('SelectHolidaysInMay');
            $Condition->june = $request->input('SelectHolidaysInjune');
            $Condition->july = $request->input('SelectHolidaysInJuly');
            $Condition->august = $request->input('SelectHolidaysInAugust');
            $Condition->september = $request->input('SelectHolidaysInSeptember');
            $Condition->october = $request->input('SelectHolidaysInOctober');
            $Condition->november = $request->input('SelectHolidaysInNovember');
            $Condition->december = $request->input('SelectHolidaysInDecember');

            $Condition->save();

            return redirect()->guest('/admin')->with('Edited', 'Conditions Managed Successfully');
        }
        else{
            return redirect()->guest('admin/Manage-Academic-Holidays')->with('Not Managed', 'Please Make Sure that Holidays Per Year are equal To all holidays per months!');
        }
    }

    public function Update_Academic_Holidays(){
        $academic_conditions = DB::table('holidays-conditions')->Where('role', '=', 'Academic')->get();

        foreach($academic_conditions as $one){
            $yearly = $one->yearly;
            $january = $one->january;
            $february = $one->february;
            $march = $one->march;
            $april = $one->april;
            $may = $one->may;
            $june = $one->june;
            $july = $one->july;
            $august = $one->august;
            $september = $one->september;
            $october = $one->october;
            $november = $one->november;
            $december = $one->december;
        }

        return view('admin.update-managed-academic-conditions', ['yearly'=>$yearly, 'january'=>$january, 
        'february'=>$february, 'march'=>$march, 'april'=>$april, 'may'=>$may, 'june'=>$june, 'july'=>$july,
        'august'=>$august, 'september'=>$september, 'october'=>$september, 'october'=>$october, 'november'=>$november,
        'december'=>$december]);
        
    }

    public function Update_Managed_Holidays_Conditions(Request $request){
        $sum_all_holidays = $request->input('SelectHolidaysInJanuary') + $request->input('SelectHolidaysInFebruary')
        + $request->input('SelectHolidaysInMarch') + $request->input('SelectHolidaysInApril') + $request->input('SelectHolidaysInMay')
        + $request->input('SelectHolidaysInjune') + $request->input('SelectHolidaysInJuly') + $request->input('SelectHolidaysInAugust') 
        + $request->input('SelectHolidaysInSeptember') + $request->input('SelectHolidaysInOctober') + $request->input('SelectHolidaysInNovember')
        + $request->input('SelectHolidaysInDecember');

        if($sum_all_holidays == $request->input('SelectHolidaysPerYear') )
        {
            $update_academic_conditions_table = DB::table('holidays-conditions')->Where('role', '=', 'Academic')
            ->update([
                "name" => $request->Name,
                "role" => $request->Role,
                "yearly" => $request->SelectHolidaysPerYear,
                "january" => $request->SelectHolidaysInJanuary,
                "february" => $request->SelectHolidaysInFebruary,
                "march" => $request->SelectHolidaysInMarch,
                "april" => $request->SelectHolidaysInApril,
                "may" => $request->SelectHolidaysInMay,
                "june" => $request->SelectHolidaysInjune,
                "july" => $request->SelectHolidaysInJuly,
                "august" => $request->SelectHolidaysInAugust,
                "september" => $request->SelectHolidaysInSeptember,
                "october" => $request->SelectHolidaysInOctober,
                "november" => $request->SelectHolidaysInNovember,
                "december" => $request->SelectHolidaysInDecember,
            ]); 

            if($update_academic_conditions_table == true){
                return redirect()->guest('/admin')->with('Edited', 'Conditions Updated Successfully');
            }
            else{
                return redirect()->guest('/admin')->with('Not Edited', 'Something Went Wrong !');
            }
        }
        else{
            return redirect()->guest('/admin/update-academic-holidays')->with('Not Updated', 'Please Make Sure that Holidays Per Year are equal To all holidays per months!'); 
        }
    }

    public function Manage_Non_Academic_Holidays(Request $request){
        $sum_all_holidays = $request->input('SelectHolidaysInJanuary') + $request->input('SelectHolidaysInFebruary')
        + $request->input('SelectHolidaysInMarch') + $request->input('SelectHolidaysInApril') + $request->input('SelectHolidaysInMay')
        + $request->input('SelectHolidaysInjune') + $request->input('SelectHolidaysInJuly') + $request->input('SelectHolidaysInAugust') 
        + $request->input('SelectHolidaysInSeptember') + $request->input('SelectHolidaysInOctober') + $request->input('SelectHolidaysInNovember')
        + $request->input('SelectHolidaysInDecember');

        if($sum_all_holidays == $request->input('SelectHolidaysPerYear') )
        {
            $Condition = new Condition();

            $Condition->name = $request->input('Name');
            $Condition->role = $request->input('Role');
            $Condition->yearly = $request->input('SelectHolidaysPerYear');
            $Condition->january = $request->input('SelectHolidaysInJanuary');
            $Condition->february = $request->input('SelectHolidaysInFebruary');
            $Condition->march = $request->input('SelectHolidaysInMarch');
            $Condition->april = $request->input('SelectHolidaysInApril');
            $Condition->may = $request->input('SelectHolidaysInMay');
            $Condition->june = $request->input('SelectHolidaysInjune');
            $Condition->july = $request->input('SelectHolidaysInJuly');
            $Condition->august = $request->input('SelectHolidaysInAugust');
            $Condition->september = $request->input('SelectHolidaysInSeptember');
            $Condition->october = $request->input('SelectHolidaysInOctober');
            $Condition->november = $request->input('SelectHolidaysInNovember');
            $Condition->december = $request->input('SelectHolidaysInDecember');

            $Condition->save();

            return redirect()->guest('/admin')->with('Edited', 'Conditions Managed Successfully');
        }
        else{
            return redirect()->guest('/admin/Manage-Non-Academic-Holidays')->with('Not Managed', 'Please Make Sure that Holidays Per Year are equal To all holidays per months!');
        }
    }

    public function Update_Non_Academic_Holidays(){
        $non_academic_conditions = DB::table('holidays-conditions')->Where('role', '=', 'Non-Academic')->get();

        foreach($non_academic_conditions as $one){
            $yearly = $one->yearly;
            $january = $one->january;
            $february = $one->february;
            $march = $one->march;
            $april = $one->april;
            $may = $one->may;
            $june = $one->june;
            $july = $one->july;
            $august = $one->august;
            $september = $one->september;
            $october = $one->october;
            $november = $one->november;
            $december = $one->december;
        }

        return view('admin.update-managed-non-academic-conditions', ['yearly'=>$yearly, 'january'=>$january, 
        'february'=>$february, 'march'=>$march, 'april'=>$april, 'may'=>$may, 'june'=>$june, 'july'=>$july,
        'august'=>$august, 'september'=>$september, 'october'=>$september, 'october'=>$october, 'november'=>$november,
        'december'=>$december]);
    }

    public function Update_Managed_Holidays_Conditions_Non_Academic(Request $request){
        $sum_all_holidays = $request->input('SelectHolidaysInJanuary') + $request->input('SelectHolidaysInFebruary')
        + $request->input('SelectHolidaysInMarch') + $request->input('SelectHolidaysInApril') + $request->input('SelectHolidaysInMay')
        + $request->input('SelectHolidaysInjune') + $request->input('SelectHolidaysInJuly') + $request->input('SelectHolidaysInAugust') 
        + $request->input('SelectHolidaysInSeptember') + $request->input('SelectHolidaysInOctober') + $request->input('SelectHolidaysInNovember')
        + $request->input('SelectHolidaysInDecember');

        if($sum_all_holidays == $request->input('SelectHolidaysPerYear') )
        {
            $update_non_academic_conditions_table = DB::table('holidays-conditions')->Where('role', '=', 'Non-Academic')
            ->update([
                "name" => $request->Name,
                "role" => $request->Role,
                "yearly" => $request->SelectHolidaysPerYear,
                "january" => $request->SelectHolidaysInJanuary,
                "february" => $request->SelectHolidaysInFebruary,
                "march" => $request->SelectHolidaysInMarch,
                "april" => $request->SelectHolidaysInApril,
                "may" => $request->SelectHolidaysInMay,
                "june" => $request->SelectHolidaysInjune,
                "july" => $request->SelectHolidaysInJuly,
                "august" => $request->SelectHolidaysInAugust,
                "september" => $request->SelectHolidaysInSeptember,
                "october" => $request->SelectHolidaysInOctober,
                "november" => $request->SelectHolidaysInNovember,
                "december" => $request->SelectHolidaysInDecember,
            ]); 

            if($update_non_academic_conditions_table == true){
                return redirect()->guest('/admin')->with('Edited', 'Conditions Updated Successfully');
            }
            else{
                return redirect()->guest('/admin')->with('Not Edited', 'Something Went Wrong !');
            }
        }
        else{
            return redirect()->guest('/admin/update-non-academic-holidays')->with('Not Updated', 'Please Make Sure that Holidays Per Year are equal To all holidays per months!'); 
        }
    }
}
