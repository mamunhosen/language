<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\PhonebookModel;
use Response;
use Session;
class PhonebookController extends Controller
{
    public function index()
    {
    	return view('phonebook.index');
    }
    public function getContacts()
    {
    	return Response::json(PhonebookModel::orderBy('name','asc')->get());
    }
    public function saveContact(Request $request)
    {
       PhonebookModel::create([
               'name' => $request->name,
               'email' => $request->email,
       		   'msisdn' =>$request->msisdn
       		]);
       return Response::json(array('success' => true));
    }
    public function deleteContact($id)
    {
    	$contact=PhonebookModel::findOrFail($id);
    	$contact->delete();
    	return Response::json(array('success' => true));

    }
    public function singleContact($id){
    
       return Response::json(PhonebookModel::findOrFail($id));
    }
    public function updateContact(Request $request, $id)
    {
      $contact=PhonebookModel::findOrFail($id);
      $contact->name=$request->name;
      $contact->email=$request->email;
      $contact->msisdn=$request->msisdn;
      $contact->save();
      return Response::json(array('success' => true));
    }
    public function languageChanger(Request $request){
      if ($request->ajax()) {
         Session::put('locale',$request->locale);
      }
      return Response::json(array('success' => true));
    }
}
