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
            return view('user.auth.signup', ['error' => $error]);
        }
        else {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = password_hash($request->password, PASSWORD_DEFAULT);
            $user->save();
        }
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
            return view('user.auth.login', ['error' => $error]);
        }
    }

    public function logout() {
        session()->flush();
        return redirect()->route('user-login');
    }

    public function show_grade_board(Request $request) {
        $grade = $request->grade;
        $dimension = Size::where('id', $request->dimensionId)
                        ->select('id', 'width', 'length')
                        ->get()
                        ->toArray();
        $dimension = $dimension[0];

        $elements = [];
        session()->put('elements', $elements);

        if ($grade == '1') {
            return redirect()->route('kinder-garden', ['width' => $dimension['width'], 'length' => $dimension['length'], $dimension['id']]);
        }
        else if ($grade == '2') {
            return redirect()->route('first-second', ['width' => $dimension['width'], 'length' => $dimension['length'], $dimension['id']]);
        }
        else if ($grade == '3') {
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
        return view('user.pages.preDefinedBoards.fifthAndSixthGrade');
    }
    public function defined_third_fourth() {
        return view('user.pages.preDefinedBoards.thirdAndFourthGrade');
    }
    public function defined_first_second() {
        return view('user.pages.preDefinedBoards.firstAndSecondGrade');
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

            return view('user.pages.dashboard', ['grade_id' => $id, 'grade' => $grade]);
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

        $enquiry = new Enquiry;
        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->contact_number = $request->contactNumber;
        $enquiry->address = $request->address;
        $enquiry->remarks = $request->remarks;
        $enquiry->quantity = '5';
        $enquiry->markers = '15';
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
        foreach ($elements as $key => $value) {
            $data = [
                'position' => $key,
                'element_id' => $value,
                'draft_id' => $draft_id,
            ];
            $position::insert($data);
        }

        $elements = [];
        session()->put('elements', $elements);

        return redirect()->route('show-draft', ['draft_id' => $draft_id, 'grade_id' => $request->grade_id]);
    }

    public function show_draft($draft_id, $grade_id) {
        $positions = Position::join('elements', 'elements.id', '=', 'positions.element_id')
                                ->select('position', 'element_id', 'name')
                                ->where('draft_id', $draft_id)
                                ->get()
                                ->toArray();         
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
        

        return view('user.pages.draft', ['positions' => $positions, 'elements' => $elements, 'draft_id' => $draft_id, 'lines' => $lines, 'line_id' => $line_id, 'dimension' => $dimension, 'back_lines' => $back_lines, 'back_line_id' => $back_line_id]);
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

        if ($line_id != 0) {
            Draft::where('id', $draft_id)->update(['line_id' => $line_id, 'back_line_id' => $back_line_id]);
        }
        else {
            Draft::where('id', $draft_id)->update(['line_id' => null, 'back_line_id' => $back_line_id]);
        }

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
}