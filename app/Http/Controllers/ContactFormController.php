<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ContactForm;
use Illuminate\Support\Facades\DB;
use App\Services\CheckFormData;
use App\Http\Requests\StoreContactForm;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        //dd($request);
        
        //$contacts = ContactForm::all();

        //$contacts = DB::table('contact_forms')
        //->select('id', 'your_name', 'title', 'created_at')
        //->orderBy('id', 'asc')
        //->paginate(20);

        //dd($contacts);

        $query = DB::table('contact_forms');

        //もしキーワードがあったら
        if($search !== null){
            //全角スペースを半角に
            $search_split = mb_convert_kana($search, 's');

            //空白で区切る
            $search_split2 = preg_split('/[\s]+/', $search_split, -1,PREG_SPLIT_NO_EMPTY);

            //単語でループを回す
            foreach($search_split2 as $value)
            {
            $query->where('your_name', 'like', '%'.$value.'%');
            }
        };

        $query->select('id', 'your_name', 'title', 'created_at');
        $query->orderBy('id', 'asc');
        $contacts = $query->paginate(20);
        
        return view('contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactForm $request)
    {
        $contact = new ContactForm;
        //
        
        $contact->your_name = $request->input('your_name');
        $contact->title = $request->input('title');
        $contact->email = $request->input('email');
        $contact->age = $request->input('age');
        $contact->gender = $request->input('gender');
        $contact->contact = $request->input('contact');

        $contact->save();

        return redirect('contact/index');
        //dd($title);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $contact = ContactForm::find($id);

        $age = CheckFormData::checkAge($contact);
        $gender = CheckFormData::checkGender($contact);

        return view('contact.show', 
        compact('contact', 'age', 'gender'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $contact = ContactForm::find($id);

        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $contact = ContactForm::find($id);
        //
        
        $contact->your_name = $request->input('your_name');
        $contact->title = $request->input('title');
        $contact->email = $request->input('email');
        $contact->age = $request->input('age');
        $contact->gender = $request->input('gender');
        $contact->contact = $request->input('contact');

        $contact->save();

        return redirect('contact/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $contact = ContactForm::find($id);
        $contact->delete();

        return redirect('contact/index');
    }
}
