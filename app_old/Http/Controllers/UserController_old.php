<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Element;
use App\Models\Position;
use App\Models\Draft;
use App\Models\Grade;
use App\Models\Enquiry;

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

        $elements = [];
        session()->put('elements', $elements);

        if ($grade == '1') {
            return redirect()->route('kinder-garden');
        }
        else if ($grade == '2') {
            return redirect()->route('first-second');
        }
        else if ($grade == '3') {
            return redirect()->route('third-fourth');
        }
        else {
            return redirect()->route('fifth-sixth');
        }
    }

    public function fift_sixth()
    {
        $ele = Element::select('id', 'name')
                    ->where('grade_id', '=', '4')
                    ->get()->toArray();

        return view('user.pages.fifthAndSixthGrade', ['elements' => $ele]);
    }

    public function third_fourth()
    {
        $ele = Element::select('id', 'name')
                    ->where('grade_id', '=', '3')
                    ->get()->toArray();

        return view('user.pages.thirdAndFourthGrade', ['elements' => $ele]);
    }

    public function first_second()
    {
        $ele = Element::select('id', 'name')
                        ->where('grade_id', '=', '2')
                        ->get()->toArray();

        return view('user.pages.firstAndSecondGrade', ['elements' => $ele]);
    }

    public function kinder_garten()
    {
        $ele = Element::select('id', 'name')
                        ->where('grade_id', '=', '1')
                        ->get()->toArray();

        return view('user.pages.kinderGarten', ['elements' => $ele]);
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

    public function send_enquiry($draft_id) {
        return view('user.pages.dashboard', ['draft_id' => $draft_id]);
    }

    public function save_enquiry(Request $request) {
        $enquiry = new Enquiry;
        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->contact_number = $request->contactNumber;
        $enquiry->address = $request->address;
        $enquiry->remarks = $request->remarks;
        $enquiry->quantity = '5';
        $enquiry->markers = '15';
        $enquiry->draft_id = $request->draftId;
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

    public function save_draft($grade_id) {
        $user_id = session()->get('id');

        $draft = new Draft;
        $draft->user_id = $user_id;
        $draft->grade_id = $grade_id;
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

        return redirect()->route('show-draft', ['draft_id' => $draft_id, 'grade_id' => $grade_id]);
    }

    public function show_draft($draft_id, $grade_id) {
        $positions = Position::join('elements', 'elements.id', '=', 'positions.element_id')
                                ->select('position', 'element_id', 'name')
                                ->where('draft_id', $draft_id)
                                ->get()
                                ->toArray();           

        $elements = [];
        foreach ($positions as $position) {
            $elements[$position['position']] = $position['element_id'];
        }
        session()->put('elements', $elements);

        $elements = Element::where('grade_id', '=', $grade_id)
                            ->get()
                            ->toArray();
        
        return view('user.pages.draft', ['positions' => $positions, 'elements' => $elements, 'draft_id' => $draft_id]);
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

        $response = "SUCCESS";
        return response()->json($response);
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
        $response = $grades;

        return response()->json($response);
    }
}