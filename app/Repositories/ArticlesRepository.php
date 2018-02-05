<?php 
namespace Corp\Repositories;

use Corp\Article;


 class ArticlesRepository extends Repository{

 		public function __construct(Article $article){ 
 			$this->model = $article;


 		}
 		public function getArticle($alias,$attr=array()){
 			$article = parent::getArticle($alias,$attr);
 			if(isset($article->img)){
 				$article->img = json_decode($article->img);
 				}
 				if(isset($article) &&  !empty($attr)){
 						$article->load('comments');
 						$article->comments->load('user');
 						
 				}
 				return $article;
 			
 		}
}	
 ?>