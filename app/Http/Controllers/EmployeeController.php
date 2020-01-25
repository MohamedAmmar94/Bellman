<?php

namespace App\Http\Controllers;
use App\Company;
use App\Employee;
use Validator;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class EmployeeController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
	public $t=[
			  'name' 			 					=> 'Company name ',
			 ];
	public function index(){
		return view("admin.pages.employee.index") ;
	}
	public function employeedatatable(){
		 $state=1;
		$baseTable = (new Employee())->getTable();
		$name = 'CONCAT(employees.first_name, " ",employees.last_name) ';

		$employees = Employee::with(["companies"])->select($baseTable.'.*',DB::raw($name.'as name'));

		$datatable = $this->eduDataTable($employees,$baseTable,COMPACT("name"));	
	
		if(!empty($datatable['rows'])){
			foreach($datatable['rows'] as $row){
				
			
				
								 // dd($row->companies);
				$datatable['data']['data'][]=[
								 'id'						=>$row->id,
								 'name'						=>$row->name,
								 'email'					=>$row->email,
								 'phone'					=>$row->phone,
								 'company'					=>($row->companies) ? $row->companies->name : "",
								
								 
								 'action'					=>'<div>
															  <div class="d-block w-100 text-center">
																 <div class="btn-group">
																	<button type="button" aria-haspopup="true" aria-expanded="true" data-toggle="dropdown" class="btn-icon btn-icon-only btn btn-link dropdown-toggle btn btn-link"><i class="educate-icon educate-menu"></i></button>
																	<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu" x-placement="top-start">
																	   
																	   <button type="button" tabindex="0" class="dropdown-item change-status-button"
																	   data-toggle="modal" data-target=".editemployee" onclick="employeefunction(\''. $row->id.'\')" 
																		
																		>EDIT</button>
																	   <button  class="dropdown-item delete-employee" 
																						id="p'.$row->id.'"
																			onclick="delitem(\'p'.$row->id.'\')"
																			data-id="'.$row->id.'"
																			data-name="'.$row->first_name." ".$row->last_name.'"
																			data-type="employee"	
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
		if(!empty($request)&&$request->employee_id=="new"){
			//dd("new");
			//dd($request);
		$validator=Validator::make($request->all(), [
				  'first_name' 			 						=> 'required|max:100 ',
				  'last_name' 			 						=> 'required|max:100 ',
				  
				 
					  ],[],$this->t);
					 
					  if($validator->fails()){
						  //dd($validator);
						return redirect("admin/employee")
						->withErrors($validator)
						->withInput();

						}
				$employee=new Employee();	
			
				$employee->first_name			=$request->first_name;
				$employee->last_name			=$request->last_name;
				$employee->email			=$request->email;
				$employee->phone			=$request->phone;
				if($request->company !=0){
					$employee->company			=$request->company;
				}
				
				$employee->save();
				$msg="Employee Added successful";
		}elseif(!empty($request)){
			//dd("edit");
			$validator=Validator::make($request->all(), [
				  'first_name' 			 						=> 'required|max:100 ',
				  'last_name' 			 						=> 'required|max:100 ',
				    ],[],$this->t);
					 
					  if($validator->fails()){
						return redirect("/admin/employee")
						->withErrors($validator)
						->withInput();

						}
			$employee=Employee::where("id",$request->employee_id)->first();	
				$employee->first_name			=$request->first_name;
				$employee->last_name			=$request->last_name;
				$employee->email			=$request->email;
				$employee->phone			=$request->phone;
				if($request->company !=0){
					$employee->company			=$request->company;
				}else{
					$employee->company			=null;
				}
				$employee->save();
				$msg="Employee Updated successful";
		}
				return redirect("/admin/employee")->with('msg', $msg);

	}
	public function getrow($id){
			$employee="";
			$companies=Company::get();
			if($id != "new"){
				$employee=Employee::where("id",$id)->first();
			}
			$view = view("admin.pages.employee.item",compact("employee","companies"))->render();
			return response()->json(['html'=>$view]);
	}
	public function remove(Request $request){
		$employee=Employee::where("id",$request->id)->first();
		
		//dd($request->id);
		$msg="faild";
		if(!empty($employee)){
			$employee->delete();
			$msg="success";
		}
		return $msg;
		
	}
}
