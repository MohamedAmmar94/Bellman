<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
		public function eduDataTable($model,$baseTable,$name=null){
		
		
		$total = $model->count();
		
		$draw = (isset($_GET['draw']) && !empty($_GET['draw'])) ? $_GET['draw'] : 1;
		$start = (isset($_GET['start']) && !empty($_GET['start'])) ? $_GET['start'] : 0;
		$length = (isset($_GET['length']) && !empty($_GET['length'])) ? $_GET['length'] : 10;
		$search = (isset($_GET['search']) && !empty($_GET['search']['value'])) ? $_GET['search']['value'] : '';
		
		
		if(isset($_GET['columns']) && !empty($_GET['columns'])){
			
			$cols = $_GET['columns'];
			$isWhere = false;
			
			//global search
			if(!empty($search)){
				//where group
				$global_search_replace = array('paid');	
				$global_search_replace_with = array('1');	
				$search = str_replace($global_search_replace,$global_search_replace_with,$search);
				
				$model->where(function($query) use ($cols,$baseTable,$search,$name){
					foreach($cols as $c){
						if($c['searchable'] && $c['name'] !='action') 
							 {
								
								 if (strpos($c['name'], '.') !== false) {
									 $f = explode('.',$c['name']);
									$f_table = $f[0];$f_name= $f[1];$f_word= $search;
									$query->orWhereHas($f_table, function($query) use ($f_table,$f_name,$f_word) {
										$query->where($f_table.'.'.$f_name, 'like', $f_word.'%');
										

									});
								
								}else{
									if (strpos($c['name'], '__') !== false) {
											
											$query->orWhereRaw($name[str_replace('__','',$c['name'])].' like "%'.$search.'%"' );
										}else{
											
											$fname=$baseTable.'.'.$c['name'];
											$query->orWhere($fname, 'like', $search.'%');
										}
									
								}

							}
					
					}
				});
				//end where group
				
			}else{
					foreach($cols as $c){
					//check if column searchable
					if($c['searchable'] && !empty($c['search']['value'])){
						//check if relationship exists to use hasWhere
						if (strpos($c['name'], '.') !== false) {
							$f = explode('.',$c['name']);
							$f_table = $f[0];$f_name= $f[1];$f_word= $c['search']['value'];
							$model->whereHas($f_table, function($query) use ($f_table,$f_name,$f_word) {
								$query->where($f_table.'.'.$f_name, 'like', $f_word.'%');
								

							});
							
						//check for need to CONCAT fileds	
						
						}else{
							if (strpos($c['name'], '__') !== false) {
									
									$model->whereRaw($name[str_replace('__','',$c['name'])].' like "%'.$c['search']['value'].'%"' );
								}else{
									//dd($c['search']['value']);
									$fname=$baseTable.'.'.$c['name'];
									$model->where($fname, 'like', $c['search']['value'].'%');
								}
							
						}
					}
						
				}
				 
				 
				 
				 
			}
			
			
			
		}
		
		$orderby = (isset($_GET['order'][0]['column']) && !empty($_GET['order'][0]['column'] )) ? $_GET['order'][0]['column'] : 0;
		
		$data = array(
			"draw"=> $draw,
			"recordsTotal"=> $total,
			"recordsFiltered"=> $model->get()->count(),
			"data"=>array() 
		);
		
							
						if (strpos($_GET['columns'][$_GET['order'][0]['column']]['name'], '.') !== false) {
							$f = explode('.',$_GET['columns'][$_GET['order'][0]['column']]['name']);
							$f_table = $f[0];$f_name= $f[1];$f_word= $_GET['order'][0]['dir'];
							$model->whereHas($f_table, function($query) use ($f_table,$f_name,$f_word) {
								
								$query->orderBy($f_table.'.'.$f_name,$f_word);

							});
								if(Schema::hasColumn($baseTable, $f_table.'_id')) 
									{
										$rows = $model->offset($start)->limit($length)->orderBy($baseTable.'.'.$f_table.'_id',$_GET['order'][0]['dir'])->get();	
									}else{
											$rows = $model->offset($start)->limit($length)->get();	
									}										
							
						
						}else{
							if (strpos($_GET['columns'][$_GET['order'][0]['column']]['name'], '__') !== false) {
								
									
									$rows =$model->offset($start)->limit($length)->orderBy(str_replace('__','',$_GET['columns'][$_GET['order'][0]['column']]['name']),$_GET['order'][0]['dir'])->get();	
								}else{
									
									$fname=$baseTable.'.'.$_GET['columns'][$_GET['order'][0]['column']]['name'];
									
									$rows =$model->offset($start)->limit($length)->orderBy($fname,$_GET['order'][0]['dir'])->get();		
								}
							
						}
						
					
		return array('data'=>$data,'rows'=>$rows);
		
	}

}
