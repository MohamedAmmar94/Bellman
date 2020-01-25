<?php

namespace App\Http\Controllers;
use App\Company;
use Validator;
use Auth;
use Illuminate\Http\Request;


class CompanyController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
	 public $t=[
			  'name' 			 					=> 'Company name ',
			 ];
	public function index(){
		return view("admin.pages.company.index") ;
	}
	public function companydatatable(){
		 $state=1;
		$baseTable = (new Company())->getTable();
		

		$companies = Company::select($baseTable.'.*');

		$datatable = $this->eduDataTable($companies,$baseTable);	
	
		if(!empty($datatable['rows'])){
			foreach($datatable['rows'] as $row){
				
			
				
								//  dd($row);
				$datatable['data']['data'][]=[
								 'id'						=>$row->id,
								 'name'						=>$row->name,
								 'email'					=>$row->email,
								 'website'					=>$row->website,
								
								 
								 'action'					=>'<div>
															  <div class="d-block w-100 text-center">
																 <div class="btn-group">
																	<button type="button" aria-haspopup="true" aria-expanded="true" data-toggle="dropdown" class="btn-icon btn-icon-only btn btn-link dropdown-toggle btn btn-link"><i class="educate-icon educate-menu"></i></button>
																	<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu" x-placement="top-start">
																	   
																	   <button type="button" tabindex="0" class="dropdown-item change-status-button"
																	   data-toggle="modal" data-target=".editcompany" onclick="companyfunction(\''. $row->id.'\')" 
																		
																		>EDIT</button>
																	   <button  class="dropdown-item delete-company" 
																						id="p'.$row->id.'"
																			onclick="delitem(\'p'.$row->id.'\')"
																			data-id="'.$row->id.'"
																			data-name="'.$row->name.'"
																			data-type="company"	
																						>Delete</button>

																	</div>
																 </div>
															  </div>
															</div>',
								
								];
			}
		}			
		
		 return response($datatable['data'], 200)
                  ->header('Content-Type', 'application/json');
	 

	}

	
	
	public function form(Request $request){
		//dd($request);
		if(!empty($request)&&$request->company_id=="new"){
			//dd("new");
			//dd($request);
		$validator=Validator::make($request->all(), [
				  'name' 			 						=> 'required|max:100 ',
				  
				 
					  ],[],$this->t);
					 
					  if($validator->fails()){
						  //dd($validator);
						return redirect("admin/home")
						->withErrors($validator)
						->withInput();

						}
				$company=new Company();	
			
				$company->name			=$request->name;
				$company->email			=$request->email;
				$company->website			=$request->website;
				
				$destinationPath = '';
				$allowed =  array('gif','png' ,'jpg','pdf','jpeg');
				if($request->hasFile('logo')){
					
						$md5Name = md5_file($request->file('logo')->getRealPath());
						$guessExtension = $request->file('logo')->guessExtension();
						if(!in_array($guessExtension,$allowed) ) {
							$msg="form updated successful but  your file failed to upload , only JPG, JPEG, PNG , GIF & PDF files are allowed ";
							$success=0;
						}else{
							$company->logo=$request->file('logo')->storeAs($destinationPath, $md5Name.'.'.$guessExtension,'public');
								
						}
					
					
				}
				$company->save();
				$msg="Company Added successful";
		}elseif(!empty($request)){
			//dd("edit");
			$validator=Validator::make($request->all(), [
				  
				 'name' 			 						=> 'required|max:100 ',
					  ],[],$this->t);
					 
					  if($validator->fails()){
						return redirect("/admin/home")
						->withErrors($validator)
						->withInput();

						}
			$company=Company::where("id",$request->company_id)->first();	
				$company->name			=$request->name;
				$company->email			=$request->email;
				$company->website			=$request->website;
				
				$destinationPath = '';
				$allowed =  array('gif','png' ,'jpg','pdf','jpeg');
				if($request->hasFile('logo')){
						$md5Name = md5_file($request->file('logo')->getRealPath());
						$guessExtension = $request->file('logo')->guessExtension();
						if(!in_array($guessExtension,$allowed) ) {
							$msg="form updated successful but  your file failed to upload , only JPG, JPEG, PNG , GIF & PDF files are allowed ";
							$success=0;
						}else{
							$company->logo=$request->file('logo')->storeAs($destinationPath, $md5Name.'.'.$guessExtension,'public');
								
						}
					
					
				}
				$company->save();
				$msg="Company Updated successful";
		}
				return redirect("/admin/home")->with('msg', $msg);

	}
	public function getrow($id){
			$company="";
			if($id != "new"){
				$company=Company::where("id",$id)->first();
			}
			$view = view("admin.pages.company.item",compact("company"))->render();
			return response()->json(['html'=>$view]);
	}
	public function remove(Request $request){
		$company=Company::where("id",$request->id)->first();
		//dd($request->id);
		$msg="faild";
		if(!empty($company)){
			$company->delete();
			$msg="success";
		}
		return $msg;
		
	}
	
}
