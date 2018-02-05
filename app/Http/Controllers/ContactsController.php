<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Mail;
class ContactsController extends SiteController
{
    //
    		public function __construct(){
		    parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

		    $this->bar = 'right';
		    $this->template = env('THEME').'.contacts';

		}
		 public function index(Request $request){

	
	if($request->isMethod('post')){

	$message=[
	'required'=>'Заполните поле',
	'email'=>'Заполните email',
	];
	$this->validate($request,[
		'name'=>'required',
		'email'=>'required|email',
		'message'=>'required',
		],$message);
		$data=$request->all();
		
		
		$result=Mail::send(env('THEME').'.email',['data'=>$data],function($message) use ($data){
			$mail_admin=env('MAIL_ADMIN');
			$message->from($data['email'],$data['name']);
			$message->to($mail_admin)->subject('Question');

		}); 
			return redirect()->route('contacts')->with('status','Email is send');
		
		}

		$this->title = 'My site';
	    $this->meta_desc = 'Описание';
	    $this->keywords = 'Ключевые слова';

	    $this->contentLeftBar = view(env('THEME').'.contactBar')->render();
	    $contacts = False;
	    $content = view(env('THEME').'.contact_content')->with('contacts',$contacts)->render();
	    $this->vars = array_add($this->vars,'content',$content);
	    $this->vars = array_add($this->vars,'leftBar',$this->contentLeftBar);

    	return $this->renderOutput();
    	
    }
}
