<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Element;
use App\Models\Position;
use App\Models\Draft;
use App\Models\Grade;
use App\Models\Enquiry;
use App\Models\Line;
use App\Models\BackLine;
use App\Models\Size;
use App\Models\PasswordReset;
use Carbon\Carbon;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.pages.dashboard');
    }

    public function view_signup()
    {
        return view('user.auth.signup');
    }

    public function view_login()
    {
        return view('user.auth.login');
    }

    public function forgot_password()
    {
        return view('user.auth.forgotPassword');
    }

    public function reset_password_link(Request $request) {
        $request->validate([
            'email' => 'required | email | exists:users,email'
        ]);

        $token = \Str::random(64);

        \DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        $action_link = route('view-reset-password', ['token' => $token, 'email' => $request->email]);
        $body = 'We Received a Request to Reset the Password for <strong>Whiteboard</strong> account associated with '.$request->email. '. You can Reset Your Password by Clicking the Link Below: ';

        \Mail::send('user.auth.email-forgot', ['action_link' => $action_link, 'body' => $body], function($message) use($request) {
            $message->from('noreply@example.com', 'Whiteboard');
            $message->to($request->email, 'Whiteboard')
                    ->subject('Reset Password');
        });

        $success = 'We have Mailed you the Reset Link. Please Check Your Email';
        session()->flash('success', $success);
        return redirect()->back();
    }

    public function view_reset_password(Request $request) {
        return view('user.auth.resetPassword', ['email' => $request->email, 'token' => $request->token]);
    }

    public function reset_password(Request $request) {
        $request->validate([
            'email' => 'required | email | exists:users,email',
            'password' => 'required | confirmed',
            'password_confirmation' => 'required',
        ]);

        $check_token = \DB::table('password_resets')->where([
            'email' => $request->email,
            'token' =>  $request->token
        ])->first();

        if (!$check_token) {
            $error = 'Invalid Token';
            session()->flash('error', $error);
            return redirect()->back();
        }
        else {
            User::where('email', $request->email)
                ->update([
                    'password' => password_hash($request->password, PASSWORD_DEFAULT),
                ]);

            \DB::table('password_resets')->where([
                'email' => $request->email
            ])->delete();

            $success = 'Your Password has been Changed, You Can Login with Your New Password.';
            session()->flash('success', $success);

            return redirect()->route('user-login');
        }
    }
    
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required | confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = User::select('email')->where('email', $request->email)->get()->toArray();
        
        if (count($user) == 1) {
            $error = "Email Already Registered";
            session()->flash('error', $error);
            return view('user.auth.signup');
        }
        else {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = password_hash($request->password, PASSWORD_DEFAULT);
            $user->save();
        }
        $success = "Signup Successfull. Please Login with Your Credentials";
        session()->flash('success', $success);
        return redirect()->route('user-login');
    }

    public function login(Request $request)
    {
        $user = User::select('email', 'password', 'name', 'id')->where('email', $request->email)->get()->toArray();

        if (count($user) == 1 && password_verify($request->password, $user[0]['password'])) {
            $user = $user[0];
            session()->put('id', $user['id']);
            session()->put('name', $user['name']);
            session()->put('email', $user['email']);
            return redirect()->route('user-dashboard');
        }
        else {
            $error = "Invalid Credentials";
            session()->flash('error', $error);
            return redirect('/');
        }
    }

    public function logout() {
        session()->flush();
        return redirect()->route('user-login');
    }

    public function show_grade_board($grade) {
        $dimension = Size::where('id', 1)
                        ->select('id', 'width', 'length')
                        ->get()
                        ->toArray();
        $dimension = $dimension[0];

        $elements = [];
        session()->put('elements', $elements);
        
        if ($grade == 'Pre-K & KinderGarden') {
            
            return redirect()->route('kinder-garden', ['width' => $dimension['width'], 'length' => $dimension['length'], $dimension['id']]);
        }
        else if ($grade == '1st & 2nd Graders') {
            return redirect()->route('first-second', ['width' => $dimension['width'], 'length' => $dimension['length'], $dimension['id']]);
        }
        else if ($grade == '3rd & 4th Graders') {
            return redirect()->route('third-fourth', ['width' => $dimension['width'], 'length' => $dimension['length'], $dimension['id']]);
        }
        else {
            return redirect()->route('fifth-sixth', ['width' => $dimension['width'], 'length' => $dimension['length'], $dimension['id']]);
        }
    }

    public function fift_sixth($width, $length, $id)
    {
        $ele = Element::select('id', 'name')
                    ->where('grade_id', '=', '4')
                    ->get()->toArray();
        $lines = Line::all()->toArray();
        $back_lines = BackLine::all()->toArray();

        $dimension = [
            'width' => $width,
            'length' => $length,
            'id' => $id, 
        ];

        return view('user.pages.fifthAndSixthGrade', ['elements' => $ele, 'lines' => $lines, 'back_lines' => $back_lines, 'dimension' => $dimension]);
    }

    public function third_fourth($width, $length, $id)
    {
        $ele = Element::select('id', 'name')
                    ->where('grade_id', '=', '3')
                    ->get()->toArray();
        $lines = Line::all()->toArray();
        $back_lines = BackLine::all()->toArray();

        $dimension = [
            'width' => $width,
            'length' => $length,
            'id' => $id, 
        ];

        return view('user.pages.thirdAndFourthGrade', ['elements' => $ele, 'lines' => $lines, 'back_lines' => $back_lines, 'dimension' => $dimension]);
    }

    public function first_second($width, $length, $id)
    {
        $ele = Element::select('id', 'name')
                        ->where('grade_id', '=', '2')
                        ->get()->toArray();
        $lines = Line::all()->toArray();
        $back_lines = BackLine::all()->toArray();

        $dimension = [
            'width' => $width,
            'length' => $length,
            'id' => $id, 
        ];

        return view('user.pages.firstAndSecondGrade', ['elements' => $ele, 'lines' => $lines, 'back_lines' => $back_lines, 'dimension' => $dimension]);
    }

    public function kinder_garten($width, $length, $id)
    {
        $ele = Element::select('id', 'name')
                        ->where('grade_id', '=', '1')
                        ->get()->toArray();
        $lines = Line::all()->toArray();
        $back_lines = BackLine::all()->toArray();

        $dimension = [
            'width' => $width,
            'length' => $length,
            'id' => $id, 
        ];

        return view('user.pages.kinderGarten', ['elements' => $ele, 'lines' => $lines, 'back_lines' => $back_lines, 'dimension' => $dimension]);
    }

    public function defined_fift_sixth() {
        return view('user.pages.preDefinedBoards.fifth&sixthgraders');
    }
    public function defined_third_fourth() {
        return view('user.pages.preDefinedBoards.third&fourthgraders');
    }
    public function defined_first_second() {
        return view('user.pages.preDefinedBoards.first&secondgraders');
    }
    public function defined_kinder_garten() {
        return view('user.pages.preDefinedBoards.kinderGarden');
    }

    public function select_grade()
    {
        return view('user.pages.selectGrade');
    }

    public function send_enquiry($id, $dimension_id, $type) {
        if ($type == 'predefined') {
            $grade = Grade::where('id', $id)
                            ->select('grade')
                            ->get()
                            ->toArray();
                            
            $grade = $grade[0]['grade'];

            return view('user.pages.dashboard', ['grade_id' => $id, 'enquiry_grade' => $grade]);
        }
        else {
            return view('user.pages.dashboard', ['draft_id' => $id, 'dimension_id' => $dimension_id]);
        }
    }

    public function save_enquiry(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'contactNumber' => 'required | digits:10',
            'address' => 'required',
            'remarks' => 'required',
            'schoolName' => 'required',
        ]);

        $markers = ['black_marker', 'green_marker', 'red_marker', 'blue_marker'];
        foreach ($markers as $marker) {
            if ($request->$marker == null) {
                $request->$marker = 0;
            }
        }

        $enquiry = new Enquiry;
        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->contact_number = $request->contactNumber;
        $enquiry->address = $request->address;
        $enquiry->remarks = $request->remarks;
        $enquiry->board_quantity = $request->boardQuantity;
        $enquiry->black_marker = $request->black_marker;
        $enquiry->blue_marker = $request->blue_marker;
        $enquiry->green_marker = $request->green_marker;
        $enquiry->red_marker = $request->red_marker;
        if (isset($request->gradeId)) {
            $enquiry->grade_id = $request->gradeId;
        } else {
            $enquiry->draft_id = $request->draftId;
        }
        $enquiry->school_name = $request->schoolName;
        $enquiry->dimension_id = $request->dimensionId;
        $enquiry->save();

        return redirect()->route('thankyou');
    }

    public function thankYou()
    {
        return view('user.pages.thankYou');
    }

    public function save_element(Request $request) {
        $position = $request->position;
        $element = $request->element;

        $elements = session()->get('elements');
        foreach($elements as $key => $value) {
            if ($element == $value) {
                unset($elements[$key]);
            }
        }
        $elements[$position] = $element;
        session()->put('elements', $elements);


        $response = session()->get('elements');
        return response()->json($response);
    }

    public function save_draft(Request $request) {
        $user_id = session()->get('id');
        $line_id = intval(preg_replace("/[^0-9]/", '', $request->lineId));
        $back_line_id = intval(preg_replace("/[^0-9]/", '', $request->backLineId));
        if ($back_line_id == 0) {
            $back_line_id = null;
        }
        $draft = new Draft;
        $draft->user_id = $user_id;
        $draft->grade_id = $request->grade_id;
        if ($line_id != 0) {
            $draft->line_id = $line_id;
        }
        $draft->dimension_id = $request->dimensionId;
        $draft->back_line_id = $back_line_id;
        $draft->save();

        $draft = Draft::select('id')
                        ->where('user_id', $user_id)
                        ->latest()
                        ->first()
                        ->toArray();
        $draft_id = $draft['id'];

        $position = new Position;
        $elements = session()->get('elements');
        // echo "<pre>";
        // echo print_r($elements);
        // die;
        foreach ($elements as $key => $value) {
            $data = [
                'position' => $key,
                'element_id' => $value,
                'draft_id' => $draft_id,
            ];
            $position::insert($data);
        }

        $elements = [];
        session()->forget('elements');
        session()->put('elements', $elements);

        return redirect()->route('show-draft', ['draft_id' => $draft_id, 'grade_id' => $request->grade_id]);
    }

    public function show_draft($draft_id, $grade_id) {
        $positions = Position::join('elements', 'elements.id', '=', 'positions.element_id')
                                ->select('position', 'element_id', 'name')
                                ->where('draft_id', $draft_id)
                                ->get()
                                ->toArray();

        // $i = 1;
        //                         foreach ($positions as $position) {

        //                             if ($position['position'][0] == 'd' && 'div_'.$i == $position['position']) {
        //                                 echo "<pre>";
        //         echo print_r($position); 
        //                             }
        //     $i++;
        //                         }
        //                         die;

        $lines = Line::all()->toArray();
        $back_lines = BackLine::all()->toArray();
        $draft = Draft::where('id', $draft_id) 
                        ->select('line_id', 'back_line_id', 'dimension_id')
                        ->get()
                        ->toArray();
        $line_id = $draft[0]['line_id'];
        $back_line_id = $draft[0]['back_line_id'];
        $elements = [];
        foreach ($positions as $position) {
            $elements[$position['position']] = $position['element_id'];
        }
        session()->put('elements', $elements);

        $elements = Element::where('grade_id', '=', $grade_id)
                            ->get()
                            ->toArray();
        $dimension = Size::where('id', $draft[0]['dimension_id'])
                            ->select('width', 'length')
                            ->get()
                            ->toArray();
        $dimension = [
            'id' => $draft[0]['dimension_id'],
            'width' => $dimension[0]['width'],
            'length' => $dimension[0]['length'],
        ];
        
        if ($grade_id == 1) {
            // Redirecting to Draft for Kinder Garden
            return view('user.pages.draftkinderGarden', ['positions' => $positions, 'elements' => $elements, 'draft_id' => $draft_id, 'lines' => $lines, 'line_id' => $line_id, 'dimension' => $dimension, 'back_lines' => $back_lines, 'back_line_id' => $back_line_id]);
        } else {
            // Redirecting to Draft for Other Three Category
            return view('user.pages.draft', ['positions' => $positions, 'elements' => $elements, 'draft_id' => $draft_id, 'lines' => $lines, 'line_id' => $line_id, 'dimension' => $dimension, 'back_lines' => $back_lines, 'back_line_id' => $back_line_id]);   
        }
    }

    public function remove_draft($draft_id) {
        Draft::where('id', $draft_id)
            ->delete();
        Position::where('draft_id', $draft_id)->
                delete();

        return redirect()->back();
    }

    public function update_draft(Request $request) {
        $draft_id = $request->draftId;
        $line_id = intval(preg_replace("/[^0-9]/", '', $request->lineId));
        $back_line_id = intval(preg_replace("/[^0-9]/", '', $request->backLineId));

        Position::where('draft_id', $draft_id)
                ->delete();
        
        $elements = session()->get('elements');
        foreach ($elements as $position => $element) {
            $data = [
                'position' => $position,
                'element_id' => $element,
                'draft_id' => $draft_id
            ];
            Position::insert($data);
        }

        if ($line_id == 0) {
            $line_id = null;
        }
        if ($back_line_id == 0) {
            $back_line_id = null;
        }

        Draft::where('id', $draft_id)->update(['line_id' => $line_id, 'back_line_id' => $back_line_id]);  
        $response = "SUCCESS";
        return response()->json($line_id);
    }

    public function my_drafts(Request $request) {
        $user_id = session()->get('id');

        $drafts = Draft::join('grades', 'grades.id', '=', 'drafts.grade_id')
                    ->select('grades.grade', 'drafts.created_at', 'drafts.updated_at', 'drafts.id', 'drafts.grade_id')
                    ->where('user_id', $user_id)
                    ->get()
                    ->toArray();

        return response()->json($drafts);
    }

    public function custom_parameters() {
        $grades = Grade::select('id', 'grade')
                        ->get()
                        ->toArray();
        $dimensions = Size::all()
                        ->toArray();

        $response = [
            'grades' => $grades,
            'dimensions' => $dimensions,
        ];

        return response()->json($response);
    }

    public function contact_us(Request $request) {
        \DB::table('contact_us')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'created_at' => now(),
        ]);
        session()->flash('success', 'Thankyou for Contacting Us. We will Reply Soon');
        return redirect()->route('user-dashboard');
    }

    public function checkout(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'contactNumber' => 'required | digits:10',
            'address' => 'required',
            'remarks' => 'required',
            'schoolName' => 'required',
            'boardQuantity' => 'required | min:0',
        ]);

        $markers = ['black_marker', 'green_marker', 'red_marker', 'blue_marker'];
        foreach ($markers as $marker) {
            if ($request->$marker == null) {
                $request->$marker = 0;
            }
        }

        $enquiry_id = Enquiry::insertGetId([
            'name' => $request->name,
            'school_name' => $request->schoolName,
            'email' => $request->email,
            'contact_number' => $request->contactNumber,
            'address' => $request->address,
            'remarks' => $request->remarks,
            'board_quantity' => $request->boardQuantity,
            'black_marker' => $request->black_marker,
            'red_marker' => $request->red_marker,
            'blue_marker' => $request->blue_marker,
            'green_marker' => $request->green_marker,
            'grade_id' => $request->gradeId,
            'status' => 'checkout_pending',
            'created_at' => now(),
        ]);

        session()->put('enquiry_id', $enquiry_id);

        $board_price = \DB::table('grades')->where('id', $request->gradeId)->first();
        $markers = \DB::table('marker_prices')->get();

        $marker_bill = [];
        $total = 0;
        foreach ($markers as $marker) {
            $marker_name = $marker->marker;
            if ($request->$marker_name != 0) {
                array_push($marker_bill, [
                    'item' => ucfirst(str_replace('_', ' ', $marker_name)),
                    'quantity' => $request->$marker_name,
                    'price' => $marker->price * $request->$marker_name,
                ]
            );
            $total += $marker->price * $request->$marker_name;
            }
        }

        $bill = array(
            'board' => array(
                'item' => $board_price->grade.' Board',
                'quantity' => $request->boardQuantity,
                'price' => $request->boardQuantity * $board_price->price,
            ),
            'markers' => $marker_bill,
            'total' => $total + $request->boardQuantity * $board_price->price,
        );

        // session()->flash();
        session()->flash('success', 'Complete the Checkout with Pay with PayPal');
        return view('user.pages.dashboard', ['payment' => true, 'bill' => $bill]);
    }

    public function show_custom_board() {
        $controller_custom_board = true;
        return view('user.pages.dashboard', ['controller_custom_board' => $controller_custom_board]);
    }

    public function show_50_reasons() {
        $controller_50_reasons = true;
        return view('user.pages.dashboard', ['controller_50_reasons' => $controller_50_reasons]);
    }
    public function show_my_drafts() {
        $controller_my_drafts = true;
        return view('user.pages.dashboard', ['controller_my_drafts' => $controller_my_drafts]);
    }
    public function show_e_book() {
        $controller_e_book = true;
        return view('user.pages.dashboard', ['controller_e_book' => $controller_e_book]);
    }
    public function show_payment() {
        $controller_payment = true;
        return view('user.pages.dashboard', ['controller_payment' => $controller_payment]);
    }
    public function show_about_us() {
        $controller_about_us = true;
        return view('user.pages.dashboard', ['controller_about_us' => $controller_about_us]);
    }
    public function show_contact_us() {
        $controller_contact_us = true;
        return view('user.pages.dashboard', ['controller_contact_us' => $controller_contact_us]);
    }
}