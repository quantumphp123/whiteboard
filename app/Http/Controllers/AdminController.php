<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use File;
use App\Models\User;
use App\Models\Enquiry;
use App\Models\Position;
use App\Models\Element;
use App\Models\Draft;
use App\Models\Line;
use App\Models\Grade;
use App\Models\Size;
use App\Models\Payment;
use App\Models\BackLine;

class AdminController extends Controller
{

    public function admin_dashboard() {
        $users_count = count(User::all()->toArray()) - 1;
        $enquiry_count = count(Enquiry::where('status', 'enquiry')->get()->toArray());
        $order_count = count(Enquiry::where('status', 'checkout_approved')->get()->toArray());
        $elements_count = count(Element::all()->toArray());
        $contact_us_count = count(\DB::table('contact_us')->get()->toArray());
        $board_prices = count(\DB::table('grades')->get()->toArray());
        $marker_prices = count(\DB::table('marker_prices')->get()->toArray());

        $count = [
            'users_count' => $users_count,
            'enquiry_count' => $enquiry_count,
            'order_count' => $order_count,
            'elements_count' => $elements_count,
            'contact_us_count' => $contact_us_count,
            'prices_count' => $board_prices + $marker_prices,
        ];

        return view('admin.dashboard', ['count' => $count]);
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
                            ->where('enquiries.status', 'enquiry')
                            ->select('enquiries.id', 'enquiries.name', 'enquiries.email', 'enquiries.contact_number', 'enquiries.draft_id', 'drafts.grade_id')
                            ->orderBy('enquiries.id', 'desc')
                            ->get()
                            ->toArray();
        // $pre_defined_enquiries = Enquiry::where('draft_id', null)
        //                                 ->orderBy('enquiries.id', 'desc')
        //                                 ->get()
        //                                 ->toArray();
                                        
        // $enquiries = array_merge($custom_enquiries, $pre_defined_enquiries);
        // $enquiries_id = array_column($enquiries, 'id');
        // array_multisort($enquiries_id, SORT_DESC, $enquiries);

        return view('admin.enquiries', ['enquiries' => $enquiries]);
    }

    public function show_orders() {
        $orders = Enquiry::join('grades', 'grades.id', '=', 'enquiries.grade_id')
                        ->where('enquiries.status', 'checkout_approved')
                        ->select('enquiries.id', 'enquiries.name', 'enquiries.email', 'enquiries.contact_number', 'grades.grade')
                        ->orderBy('enquiries.id', 'desc')
                        ->get()
                        ->toArray();
        return view('admin.orders', ['orders' => $orders]);
    }

    public function show_payments() {
        $payments = Payment::orderBy('id', 'desc')
                        ->get()
                        ->toArray();
        return view('admin.payments', ['payments' => $payments]);
    }

    public function show_contact_us() {
        $contact_us = \DB::table('contact_us')->get();
        return view('admin.contact_us', ['contact_us' => $contact_us]);
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
    
        $draft = Draft::join('back_lines', 'back_lines.id', '=', 'drafts.back_line_id')
                        ->where('drafts.id', $draft_id)
                        ->select('drafts.id', 'drafts.dimension_id', 'drafts.line_id', 'drafts.back_line_id', 'back_lines.name as back_line_name', 'back_lines.img_name')
                        ->get()
                        ->toArray();
        $draft = $draft[0];
        if ($draft['line_id'] != null) {
            $line = Line::where('id', $draft['line_id'])->select('id', 'name')->get()->toArray();
            $line = $line[0];
        }
        else {
            $line = null;
        }
        
        $dimension = Size::where('id', $draft['dimension_id'])
                            ->select('width', 'length')
                            ->get()
                            ->toArray();

        $dimension = [
            'id' => $draft['dimension_id'],
            'width' => $dimension[0]['width'],
            'length' => $dimension[0]['length'],
        ];

        if ($draft['back_line_id'] != null) {
            $back_line = BackLine::where('id', $draft['back_line_id'])->get()->toArray();
            $back_line = $back_line[0];
        } else {
            $back_line = null;
        }
        

        if ($grade_id == 1) {
            // Redirecting to Draft for Kinder Garden
            return view('admin.draftkinderGarden', ['positions' => $positions, 'elements' => $elements, 'draft_id' => $draft_id, 'draft' => $draft, 'line' => $line, 'back_line' => $back_line, 'dimension' => $dimension]);
        } else {
            // Redirecting to Draft for Other Three Category
            return view('admin.draft', ['positions' => $positions, 'elements' => $elements, 'draft_id' => $draft_id, 'draft' => $draft, 'line' => $line, 'back_line' => $back_line, 'dimension' => $dimension]);
        }
    }

    public function show_pre_defined($grade_id) {
        if ($grade_id == '1') {
            return view('admin.preDefinedBoards.kinderGarden');
        }
        elseif ($grade_id == '2') {
            return view('admin.preDefinedBoards.firstAndSecondGrade');
        }
        elseif ($grade_id == '3') {
            return view('admin.preDefinedBoards.thirdAndFourthGrade');
        }
        else {
            return view('admin.preDefinedBoards.fifthAndSixthGrade');
        }
    }

    public function client_details($id) {
        $enquiry = Enquiry::where('id', $id)
                        ->get()
                        ->toArray();
        $enquiry = $enquiry[0];
        $dimension_id = $enquiry['dimension_id'];

        if ($dimension_id != null) {
            $size = Size::where('id', $dimension_id)
                        ->get()
                        ->toArray();
            $size = $size[0];
            $draft = Draft::join('grades', 'grades.id', '=', 'drafts.grade_id')
                            ->select('grades.grade')
                            ->where('drafts.id', $enquiry['draft_id'])
                            ->get()
                            ->toArray();
            $grade = $draft[0];
        }
        else {
            $size = null;
            $grade_id = $enquiry['grade_id'];
            $grade = Grade::where('id', $grade_id)
                            ->get()
                            ->toArray();
            $grade = $grade[0];
        }

        return view('admin.clientDetails', ['enquiry' =>$enquiry, 'size' => $size, 'grade' => $grade]);
    }

    public function show_elements() {
        $elements = Element::join('grades', 'grades.id', '=', 'elements.grade_id')
                            ->select('grades.id as grade_id', 'grades.grade', 'elements.id', 'elements.name', 'elements.created_at', 'elements.updated_at')
                            ->orderBy('elements.id', 'desc')
                            ->get()
                            ->toArray();

        $grades = Grade::all()->toArray();

        return view('admin.elements', ['elements' => $elements, 'grades' => $grades]);
    }

    public function remove_element($id) {
        $element = Element::where('id', $id)->select('name')->get()->toArray();
        $img_path = 'public/storage/'. $element[0]['name'];
        if (File::exists($img_path)) {
            File::delete($img_path);
            Element::where('id', $id)->delete();
            session()->flash('success', 'Element is Successfully deleted');
    
            return redirect()->route('show-elements');
        }
        else {
            echo $img_path;
        }
    }

    public function add_element(Request $request) {
        $request->validate([
            'elements' => 'required',
        ]);
        
        foreach ($request->elements as $element) {
            $rand = rand();
            $img_name = $rand. '.' .$element->getClientOriginalExtension();
            $data = [
                'name' => $img_name,
                'grade_id' => $request->gradeId,
                'created_at' => \Carbon\Carbon::now(),
            ];
            Element::insert($data);

            $path = base_path(). '/public/storage';
            $element->move($path, $img_name);
        }
        session()->flash('success', 'Element is Successfully Added');

        return redirect()->route('show-elements');
    }

    public function show_prices() {
        $board_prices = \DB::table('grades')->select('id', 'grade as name', 'price')->get();
        $marker_prices = \DB::table('marker_prices')->select('id', 'marker as name', 'price')->get();

        return view('admin.prices', ['board_prices' => $board_prices, 'marker_prices' => $marker_prices]);
    }

    public function edit_prices(Request $request) {
        \DB::table($request->table)->where('id', $request->id)->update([
            'price' => $request->price,
        ]);
        session()->flash('success', 'Price Updated');
        return redirect()->route('show-prices');
    }
}