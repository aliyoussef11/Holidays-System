<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Holiday;
use Carbon\Carbon;
use App\Requests;
use Auth;
use MaddHatter\LaravelFullCalendar\Facades\Calendar;
use DB;
use App\EditHoliday;
use Crypt;
use App\Condition;

class AcademicController extends Controller
{
    public function index()
    {
        $holidays = Holiday::where('name', '=', Auth::User()->name)->get();
        $holiday = [];

        $current_year = Carbon::now()->format('Y');
        
        $holidays_This_Year = Holiday::where('name', '=', Auth::User()->name)->whereYear('date', '=', $current_year)->get();
        $count_Holidays = $holidays_This_Year->count();

        //Get Yearly Condition For academic user
        $yearly_condition = Condition::Where('role', '=', 'Academic')->pluck('yearly');
        $Remaining_holidays_per_year = $yearly_condition[0] - $count_Holidays;

        //Get January Condition For academic user
        $january_condition = Condition::Where('role', '=', 'Academic')->pluck('january');

        $Holidays_Of_January = DB::table('holidays')->where('name', '=', Auth::User()->name)
        ->whereMonth('date', '=', 1)->get();
        $count_January_Holidays = $Holidays_Of_January->count();
        $Remaining_holidays_in_January = $january_condition[0] - $count_January_Holidays; 

        //Get February Condition For academic user
        $february_condition = Condition::Where('role', '=', 'Academic')->pluck('february');

        $Holidays_Of_february = DB::table('holidays')->where('name', '=', Auth::User()->name)
        ->whereMonth('date', '=', 2)->get();
        $count_february_Holidays = $Holidays_Of_february->count();
        $Remaining_holidays_in_February = $february_condition[0] - $count_february_Holidays; 

        //Get March Condition For academic user
        $march_condition = Condition::Where('role', '=', 'Academic')->pluck('march');

        $Holidays_Of_march = DB::table('holidays')->where('name', '=', Auth::User()->name)
        ->whereMonth('date', '=', 3)->get();
        $count_march_Holidays = $Holidays_Of_march->count();
        $Remaining_holidays_in_March = $march_condition[0] - $count_march_Holidays;

        //Get April Condition For academic user
        $april_condition = Condition::Where('role', '=', 'Academic')->pluck('april');

        $Holidays_Of_april = DB::table('holidays')->where('name', '=', Auth::User()->name)
        ->whereMonth('date', '=', 4)->get();
        $count_april_Holidays = $Holidays_Of_april->count();
        $Remaining_holidays_in_April = $april_condition[0] - $count_april_Holidays;

        //Get May Condition For academic user
        $may_condition = Condition::Where('role', '=', 'Academic')->pluck('may');

        $Holidays_Of_may = DB::table('holidays')->where('name', '=', Auth::User()->name)
        ->whereMonth('date', '=', 5)->get();
        $count_may_Holidays = $Holidays_Of_may->count();
        $Remaining_holidays_in_May = $may_condition[0] - $count_may_Holidays;

        //Get June Condition For academic user
        $june_condition = Condition::Where('role', '=', 'Academic')->pluck('june');

        $Holidays_Of_june = DB::table('holidays')->where('name', '=', Auth::User()->name)
        ->whereMonth('date', '=', 6)->get();
        $count_june_Holidays = $Holidays_Of_june->count();
        $Remaining_holidays_in_June = $june_condition[0] - $count_june_Holidays;

        //Get July Condition For academic user
        $july_condition = Condition::Where('role', '=', 'Academic')->pluck('july');

        $Holidays_Of_july = DB::table('holidays')->where('name', '=', Auth::User()->name)
        ->whereMonth('date', '=', 7)->get();
        $count_july_Holidays = $Holidays_Of_july->count();
        $Remaining_holidays_in_July = $july_condition[0] - $count_july_Holidays;

        //Get August Condition For academic user
        $august_condition = Condition::Where('role', '=', 'Academic')->pluck('august');

        $Holidays_Of_august = DB::table('holidays')->where('name', '=', Auth::User()->name)
        ->whereMonth('date', '=', 8)->get();
        $count_august_Holidays = $Holidays_Of_august->count();
        $Remaining_holidays_in_August = $august_condition[0] - $count_august_Holidays;

        //Get September Condition For academic user
        $september_condition = Condition::Where('role', '=', 'Academic')->pluck('september');

        $Holidays_Of_september = DB::table('holidays')->where('name', '=', Auth::User()->name)
        ->whereMonth('date', '=', 9)->get();
        $count_september_Holidays = $Holidays_Of_september->count();
        $Remaining_holidays_in_September = $september_condition[0] - $count_september_Holidays;

        //Get October Condition For academic user
        $october_condition = Condition::Where('role', '=', 'Academic')->pluck('october');

        $Holidays_Of_october = DB::table('holidays')->where('name', '=', Auth::User()->name)
        ->whereMonth('date', '=', 10)->get();
        $count_october_Holidays = $Holidays_Of_october->count();
        $Remaining_holidays_in_October = $october_condition[0] - $count_october_Holidays;

        //Get November Condition For academic user
        $november_condition = Condition::Where('role', '=', 'Academic')->pluck('november');

        $Holidays_Of_november = DB::table('holidays')->where('name', '=', Auth::User()->name)
        ->whereMonth('date', '=', 11)->get();
        $count_november_Holidays = $Holidays_Of_november->count();
        $Remaining_holidays_in_November = $november_condition[0] - $count_november_Holidays;

        //Get December Condition For academic user
        $december_condition = Condition::Where('role', '=', 'Academic')->pluck('december');

        $Holidays_Of_december = DB::table('holidays')->where('name', '=', Auth::User()->name)
        ->whereMonth('date', '=', 12)->get();
        $count_december_Holidays = $Holidays_Of_december->count();
        $Remaining_holidays_in_December = $december_condition[0] - $count_december_Holidays;


        foreach($holidays as $row){
            $enddate = $row->date." 24:00:00";
            $holiday[] = \Calendar::event(
                $row->title,
                true,
                new \DateTime($row->date),
                new \DateTime($row->date)
                );
        }

        $calendar = \Calendar::addEvents($holiday);
        return view('academic.index', compact('events', 'calendar'), ['Remaining_holidays_per_year'=>$Remaining_holidays_per_year
        , 'Remaining_holidays_in_January'=>$Remaining_holidays_in_January, 'Remaining_holidays_in_February'=>$Remaining_holidays_in_February,
        'Remaining_holidays_in_March'=>$Remaining_holidays_in_March, 'Remaining_holidays_in_April'=>$Remaining_holidays_in_April,
        'Remaining_holidays_in_May'=>$Remaining_holidays_in_May, 'Remaining_holidays_in_June'=>$Remaining_holidays_in_June,
        'Remaining_holidays_in_July'=>$Remaining_holidays_in_July, 'Remaining_holidays_in_August'=>$Remaining_holidays_in_August
        ,'Remaining_holidays_in_September'=>$Remaining_holidays_in_September,'Remaining_holidays_in_October'=>$Remaining_holidays_in_October,
        'Remaining_holidays_in_November'=>$Remaining_holidays_in_November, 'Remaining_holidays_in_December'=>$Remaining_holidays_in_December]);
    }

    public function store(Request $request)
    {
        $all_requests = DB::table('requests')->where('name', '=', Auth::User()->name)->get();
        $requests_number_for_current_user = $all_requests->count();

        if($requests_number_for_current_user > 0){
            return redirect()->guest('/academic')->with('failed', 'There is a pending request, cannot send another one, Please Wait!');
        }
        else{     
        $current_date = Carbon::now()->format('Y-m-d');

        if($request->input('date') <= $current_date){
            return redirect()->guest('/academic')->with('failed', 'Your date is less than our date!');
        }
        else{
            $dates_of_holidays = Holiday::where('name', '=', Auth::User()->name)->get(); 

            $dates = [];
            for($i =0; $i<count($dates_of_holidays); $i++){
                $one_Date = $dates_of_holidays[$i]->date;
                array_push($dates, $one_Date);
            }

            if(in_array($request->input('date'), $dates)){
                return redirect('/academic')->with('failed', 'You are already booked this day as a holiday, Please Choose another one!'); 
            }
            else{
                $current_year = Carbon::now()->format('Y');

                //Get Yearly Condition For academic user
                $yearly_condition = Condition::Where('role', '=', 'Academic')->pluck('yearly');

                //Get the count of all holidays for current user in this year
                $dates_of_holidays = DB::table('holidays')->where('name', '=', Auth::User()->name)
                ->whereYear('date', '=', $current_year)->get();
                $number_of_date_same_year_for_same_user = $dates_of_holidays->count();

                if($number_of_date_same_year_for_same_user > $yearly_condition[0]){
                    return redirect('/academic')->with('failed', 'You reached The maximum number of holidays in this year!'); 
                }
                else{
                    //Get Entered Month by the user
                    $date = Carbon::createFromFormat('Y-m-d', $request->input('date'));
                    $month_entered = $date->format('m');
                    $monthName_entered = $date->format('F');

                    //Get Number of holidays taken in the entered month 
                    $dates_of_holidays_in_entered_month = DB::table('holidays')->where('name', '=', Auth::User()->name)
                    ->whereMonth('date', '=', $month_entered)->get();
                    
                    //Get count
                    $count_holidays_perThisMonth = $dates_of_holidays_in_entered_month->count();

                    //Get condition in this month 
                    $condition_for_this_month = Condition::Where('role', '=', 'Academic')->pluck($monthName_entered);

                    if($count_holidays_perThisMonth >= $condition_for_this_month[0]){
                        return redirect('/academic')->with('failed', 'You reached The maximum number of holidays in this Month Entered!');
                    }
                    else{
                        $events = new Requests();

                        $events->name = Auth::User()->name;
                        $events->role = Auth::User()->role;
                        $events->title = $request->input('title');
                        $events->details = $request->input('details');
                        $events->date = $request->input('date');
                        $events->save();

                        return redirect('/academic')->with('success', 'Request Has been Sent!');
                    }
                    
                }               
            }
        }
        }
    }

    public function display_edit_page(){
        $current_date = Carbon::now()->format('Y-m-d');

        $holidays = Holiday::where('name', '=', Auth::User()->name)->
        where('date', '>', $current_date)->get();

        return view('academic.edit-page', ['holidays'=> $holidays]);
    }

    public function show_edit_page_form($name, $role, $title, $date){
        $name = Crypt::decrypt($name);
        $role = Crypt::decrypt($role);
        $title = Crypt::decrypt($title);
        $date = Crypt::decrypt($date);
        return view('academic.show-edit-page-form', ['name'=>$name, 'role'=>$role ,'title'=> $title, 'date'=>$date]);
    }

    public function Edit_Holiday(Request $request, $name, $role, $title, $date){
        $current_date = Carbon::now()->format('Y-m-d');

        if($request->input('date') <= $current_date){
            return redirect('/edit-a-holiday-academic')->with('not-edited', 'Your date is less than Our Date!');
        }
        else{
            $dates_of_holidays = Holiday::where('name', '=', Auth::User()->name)->get(); 

            $dates = [];
            for($i =0; $i<count($dates_of_holidays); $i++){
                $one_Date = $dates_of_holidays[$i]->date;
                array_push($dates, $one_Date);
            }

            if(in_array($request->input('date'), $dates)){
                return redirect('/edit-a-holiday-academic')->with('not-edited', 'You are already booked this day as a holiday, Please Choose another one!'); 
            }
            else{
                    //Get Entered Month by the user
                    $date_entered = Carbon::createFromFormat('Y-m-d', $request->input('date'));
                    $month_entered = $date_entered->format('m');
                    $monthName_entered = $date_entered->format('F');

                    //Get Month name of pevious date
                    $previous_date = Carbon::createFromFormat('Y-m-d', $date);
                    $Previous_month_date = $previous_date->format('F');

                    if($Previous_month_date == $monthName_entered){
                        //Get Number of holidays taken in the entered month 
                         $dates_of_holidays_in_entered_month = DB::table('holidays')->where('name', '=', Auth::User()->name)
                        ->whereMonth('date', '=', $month_entered)->get();

                        //Get count
                        $count_holidays_perThisMonth = $dates_of_holidays_in_entered_month->count();
                        $count_holidays_perThisMonth --;

                        //Get condition in this month 
                        $condition_for_this_month =  Condition::Where('role', '=', 'Academic')->pluck($monthName_entered);

                        if($count_holidays_perThisMonth >= $condition_for_this_month[0]){
                            return redirect('/edit-a-holiday-academic')->with('not-edited', 'You reached The maximum number of holidays in this Month Entered!');
                        }
                        else{
                            $edit = new EditHoliday();

                            $edit->name = Auth::User()->name;
                            $edit->role = Auth::User()->role;
                            $edit->title = $request->input('title');
                            $edit->details = $request->input('details');
                            $edit->previousDate = $date;
                            $edit->newDate = $request->input('date');
                            $edit->save();

                            return redirect('/academic')->with('success', 'Please wait for response!');
                        }
                    }
                    else{
                        //Get Number of holidays taken in the entered month 
                    $dates_of_holidays_in_entered_month = DB::table('holidays')->where('name', '=', Auth::User()->name)
                    ->whereMonth('date', '=', $month_entered)->get();
                    //Get count
                    $count_holidays_perThisMonth = $dates_of_holidays_in_entered_month->count();

                    //Get condition in this month 
                    $condition_for_this_month =  Condition::Where('role', '=', 'Academic')->pluck($monthName_entered);

                    if($count_holidays_perThisMonth >= $condition_for_this_month[0]){
                        return redirect('/edit-a-holiday-academic')->with('not-edited', 'You reached The maximum number of holidays in this Month Entered!');
                    }
                    else{
                        $edit = new EditHoliday();

                        $edit->name = Auth::User()->name;
                        $edit->role = Auth::User()->role;
                        $edit->title = $request->input('title');
                        $edit->details = $request->input('details');
                        $edit->previousDate = $date;
                        $edit->newDate = $request->input('date');
                        $edit->save();

                        return redirect('/academic')->with('success', 'Please wait for response!');
                    }
                }               
            }
    }
}

    public function display_delete_page(){
        $current_date = Carbon::now()->format('Y-m-d');

        $holidays = Holiday::where('name', '=', Auth::User()->name)->
        where('date', '>', $current_date)->get();

        return view('academic.delete-page', ['holidays'=> $holidays]);
    }

    public function Delete_Holiday($name, $role, $title, $date){
        $current_date = Carbon::now()->format('Y-m-d');
        
        $deletion = DB::table('holidays')->where('name', '=', $name)->
        where('role', '=', $role)->where('title', '=', $title)->
        where('date', '=', $date)->delete();
        if($deletion == true){
            return redirect()->guest('/academic')->with('success', 'Deleted Successfully!');
        }
        else{
            return redirect()->guest('/academic')->with('failed', 'Something went wrong!');
        }
    }

    public function Hide_Notification($name, $role, $title, $date, $response){
        $deletion = DB::table('notifications')->where('name', '=', $name)->
        where('role', '=', $role)->where('title', '=', $title)->
        where('date', '=', $date)->where('response', '=', $response)->delete();
    
        if($deletion == true){
            return redirect()->guest('/academic');
        }
        else{
            return redirect()->guest('/academic')->with('failed', 'Something went wrong!');
        }
    }

    public function Display_Statistics(){
        $holidays = Holiday::where('name', '=', Auth::User()->name)->get();

        $current_year = Carbon::now()->format('Y');
        
        $holidays_This_Year = Holiday::where('name', '=', Auth::User()->name)->whereYear('date', '=', $current_year)->get();
        $count_Holidays = $holidays_This_Year->count();

        //Get Yearly Condition For academic user
        $yearly_condition = Condition::Where('role', '=', 'Academic')->pluck('yearly');
        $Remaining_holidays_per_year = $yearly_condition[0] - $count_Holidays;

        return view('academic.Statistics', ['Remaining'=> $Remaining_holidays_per_year, 'Taken_Holidays' =>
        $count_Holidays]);
    }
}
