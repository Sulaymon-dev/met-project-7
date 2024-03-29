<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Plan;
use App\Sinf;
use App\Subject;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PlansController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Plan::class, 'plan');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Plan::select();
//        $role = auth()->user()->role;
//        if ($role == 'teacher')
//            $query->whereUserId(auth()->id())->with(['subject', 'sinf', 'book', 'themes']);
//        else
            $query->with(['subject', 'sinf', 'book', 'themes', 'user']);
        $plans = $query->latest()->paginate(25);
        return view('admin.plans.index', compact('plans'));
    }

    public function list(Request $request)
    {
        $search = $request->validate(['search' => 'nullable|string'])['search'] ?? '';
        $query = Plan::select();
        if (strpos($search, '|')) {
            $searchArray = explode('|', $search);
            $subject = trim($searchArray[0]);
            $sinf = trim($searchArray[1]);
            $query->with('subject', 'sinf');
            $query->whereHas(
                'subject', function ($q) use ($subject) {
                $q->where('name', 'like', "%$subject%");
            })->whereHas('sinf', function ($q) use ($sinf) {
                $q->where('class', 'like', "%$sinf%");
            });

        } else {
            $search = trim($search);
            $query->with('subject', 'sinf')->whereHas(
                'subject', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            })->orWhereHas('sinf', function ($q) use ($search) {
                $q->where('class', 'like', "%$search%");
            });
        }
        if ($request->input('withThemes') == 'true'){
            $query->with('themes:id,plan_id,name,theme_num');
        }
        return $plans = $query->paginate(25);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sinfs = Sinf::all();
        $subjects = Subject::all();
        return view('admin.plans.create', compact('sinfs', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'subject_id' => 'required|numeric',
            'sinf_id' => 'required|numeric',
            'book_id' => 'nullable|numeric',
            'status' => 'nullable|boolean',
            'is_show' => 'required|boolean',
        ]);
        if (auth()->user()->role == 'teacher') $data['status'] = '0';

        $plan = Plan::create([
            'subject_id' => $data['subject_id'],
            'sinf_id' => $data['sinf_id'],
            'book_id' => $data['book_id'],
            'status' => $data['status'],
            'is_show' => $data['is_show'],
            'user_id' => auth()->id(),
        ]);

        if ($plan) {
            alert()->success('Нақша бо муваффақият илова шуд', 'Илова шуд');
            return redirect(route('plans.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Plan $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Plan $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        $sinfs = Sinf::all();
        $subjects = Subject::all();
        $role = auth()->user()->role;
        $plan->load('book');

        return view('admin.plans.edit', compact('sinfs', 'subjects', 'plan', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Plan $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        $isUpdatedSuccessfully = false;
        if (auth()->user()->role == 'moderator') {
            if ($plan->update([
                    'status' => $request->validate([
                        'status' => 'required|boolean'
                    ])['status']
                ]
            )) $isUpdatedSuccessfully = true;

        } else {
            $data = $request->validate([
                'subject_id' => 'required|numeric',
                'sinf_id' => 'required|numeric',
                'book_id' => 'nullable|numeric',
                'status' => 'nullable|boolean',
                'is_show' => 'required|boolean',
            ]);
            if (auth()->user()->role == 'teacher') $data['status'] = $plan->status;
            if ($plan->update($data)) $isUpdatedSuccessfully = true;

            if ($isUpdatedSuccessfully) {
                alert()->success('План бо муваффақият ислоҳ шуд', 'Ислоҳ шуд');
                return redirect(route('plans.index'));
            }
            alert()->success('Хатогӣ рӯй додааст', 'Хатогӣ');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Plan $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        try {
            $plan->delete();
            return response()->json([
                'status' => 'ok',
                'message' => 'plan deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'error : ' . $e->getMessage()
            ], 401);
        }
    }

    public function makePdf()
    {
        $query = Plan::with(['subject', 'sinf', 'book', 'themes', 'user'])->get();

        $data = [
            'title' => 'Рӯйхати Нақшаҳои дарсӣ',
            'plans' => $query
        ];

        $customPaper = array(0,0,1380.00,1044.80);

        $pdf = PDF::loadView('admin.plans.pdf', $data)->setPaper($customPaper, 'landscape');
        return $pdf->download('Нақшаҳои дарсӣ.pdf');
    }
}
