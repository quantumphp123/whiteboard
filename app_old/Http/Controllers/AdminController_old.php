<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Enquiry;
use App\Models\Position;
use App\Models\Element;

class AdminController extends Controller
{

    public function admin_dashboard() {
        $users_count = count(User::all()->toArray()) - 1;
        $enquiry_count = count(Enquiry::all()->toArray());

        return view('admin.dashboard', ['users_count' => $users_count, 'enquiry_count' => $enquiry_count]);
    }

    public function show_login() {
        return view('admin.login');
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            session([
                'admin' => true
            ]);
            return  redirect()->route('admin-dashboard');
        }
        else {
            $error = '* Invalid Credentials. Please Try Again';
            session()->flash('error', $error);

            return redirect()->back();
        }
    }

    public function logout() {
        session()->flush();
        return redirect()->route('admin-show-login');
    }

    public function show_enquiries() {
        $enquiries = Enquiry::join('drafts', 'drafts.id', '=', 'enquiries.draft_id')
                            ->select('enquiries.id', 'enquiries.name', 'enquiries.email', 'enquiries.contact_number', 'enquiries.draft_id', 'drafts.grade_id')
                            ->orderBy('enquiries.id', 'desc')
                            ->get()
                            ->toArray();

        return view('admin.enquiries', ['enquiries' => $enquiries]);
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
        
        return view('admin.draft', ['positions' => $positions, 'elements' => $elements, 'draft_id' => $draft_id]);
    }

    public function client_details($id) {
        $client = Enquiry::where('id', $id)
                        ->get()
                        ->makeHidden(['created_at', 'updated_at'])
                        ->toArray();
        $client = $client[0];

        return view('admin.clientDetails', ['client' => $client]);
    }
}
