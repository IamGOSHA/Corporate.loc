<?php 
namespace Corp\Repositories;

use Config;


abstract class Repository{

	protected $model=FALSE;
	public function get($select='*',$take = FALSE,$pagination = FALSE){
		$builder = $this->model->select($select);
		if($take==TRUE){
		$builder->take($take);
			}
		if($pagination){
			return $this->imageShow($builder->paginate(Config::get('setting.paginate')));
		}
		return $this->imageShow($builder->get());
		

	} 
	public function imageShow($result){
			if($result->isEmpty() && $result->json()){

				return FALSE;
			}

			$result->transform(function($item,$key){
				if(is_string($item->img) && is_object(json_decode($item->img)) && (json_last_error()==JSON_ERROR_NONE) ){
				$item->img=json_decode($item->img);
				}
				return $item;
			});
			return $result;
	}
}	
 ?>