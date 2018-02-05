<?php 
namespace Corp\Repositories;

use Config;


abstract class Repository{

	protected $model=FALSE;
	public function get($select='*',$take = FALSE,$pagination = FALSE,$where=FALSE){
		$builder = $this->model->select($select);
		if($take==TRUE){
		$builder->take($take);
			}
			if($where==TRUE){
				$builder->where($where[0],$where[1]);
			}
		if($pagination){
			return $this->imageShow($builder->simplePaginate(Config::get('settings.paginate')));
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
	 public function getArticle($alias,$attr=array()){
        $article = $this->model->where('alias',$alias)->first();
        return $article ;

}
}	
 ?>