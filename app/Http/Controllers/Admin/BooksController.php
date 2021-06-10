<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Http\Controllers\Controller;
use App\Sinf;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Book::class, 'book');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $query = Book::select();
//        $role = auth()->user()->role;
//        if ($role == 'teacher') {
//            $query->whereUserId(auth()->id());
//        }
        $books = $query->latest()->paginate(25);
        return view('admin.books.index', compact('books'));
    }

    public function list(Request $request)
    {
        $search = $request->validate(['search' => 'nullable|string'])['search'] ?? '';
        return $books = Book::where('name', 'like', '%' . $search . '%')->paginate(25);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.books.create');
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
            'name' => 'required|string',
            'status' => 'nullable|boolean',
            'is_show' => 'required|boolean',
            'image' => 'required|file|mimes:jpeg,jpg,png,gif|max:2048',
            'pdf' => 'nullable|file|mimes:pdf|max:524288'
        ]);

        if (auth()->user()->role == 'teacher') $data['status'] = '0';
        $book = Book::create([
            'name' => $data['name'],
            'status' => $data['status'],
            'is_show' => $data['is_show'],
            'user_id' => auth()->id(),
            'img_src' => str_replace('public/uploads/img/', '', Storage::putFile('public/uploads/img', $request->file('image'))),
            'pdf_src' => $request->has('pdf') ? str_replace('public/uploads/pdf/', '', Storage::putFile('public/uploads/pdf', $request->file('pdf'))) : ''
        ]);

        if ($book) {
            alert()->success('Китоб бо муваффақият илова шуд', 'Илова шуд');
            return redirect(route('books.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $role = auth()->user()->role;
        return view('admin.books.edit', compact('book', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $isUpdatedSuccessfully = false;
        if (auth()->user()->role == 'moderator') {
            if ($book->update([
                    'status' => $request->validate([
                        'status' => 'required|boolean'
                    ])['status']
                ]
            )) $isUpdatedSuccessfully = true;

        } else {
            $data = $request->validate([
                'name' => 'required|string',
                'status' => 'nullable|boolean',
                'is_show' => 'nullable|boolean',
                'image' => 'nullable|file|mimes:jpeg,jpg,png,gif|max:2048',
                'pdf' => 'nullable|file|mimes:pdf|max:524288',
                'saveOldImage' => 'nullable|boolean',
                'saveOldPdf' => 'nullable|boolean'
            ]);

            if (auth()->user()->role == 'teacher') $data['status'] = $book->status;

            $pdf = $request->file('pdf');
            $img = $request->file('image');

            if (isset($data['saveOldImage']) && $data['saveOldImage'] == '1') {
                $data['img_src'] = $book->img_src;
            } elseif (!isset($img)) {
                $data['img_src'] = null;
            } else {
                $data['img_src'] = str_replace('public/uploads/img/', '', Storage::putFile('public/uploads/img', $img));
                Storage::delete('/public/uploads/img/' . $book->img_src);
            }

            if (isset($data['saveOldPdf']) && $data['saveOldPdf'] == '1') {
                $data['pdf_src'] = $book->pdf_src;
            } elseif (!isset($pdf)) {
                $data['pdf_src'] = null;
            } else {
                $data['pdf_src'] = str_replace('public/uploads/pdf/', '', Storage::putFile('public/uploads/pdf', $pdf));
                Storage::delete('/public/uploads/pdf/' . $book->pdf_src);
            }
            if ($book->update($data)) $isUpdatedSuccessfully = true;
        }

        if ($isUpdatedSuccessfully) {
            alert()->success('Китоб бо муваффақият ислоҳ шуд', 'Ислоҳ шуд');
            return redirect(route('books.index'));
        }
        alert()->success('Хатогӣ рӯй додааст', 'Хатогӣ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        try {
            Storage::delete('/public/uploads/img/' . $book->img_src);
            Storage::delete('/public/uploads/pdf/' . $book->pdf_src);
            $book->delete();
            return response()->json([
                'status' => 'ok',
                'message' => 'book deleted successfully'
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
        $books = Book::all();

        $data = [
            'title' => 'Рӯйхати Китобҳо',
            'books' => $books
        ];
        $customPaper = array(0,0,1380.00,1044.80);

        $pdf = PDF::loadView('admin.books.pdf', $data)->setPaper($customPaper, 'landscape');
        return $pdf->download('Рӯйхати Китобҳо.pdf');
    }
}
