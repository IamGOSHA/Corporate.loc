<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;

use Corp\Repositories\PortfoliosRepository;
use Corp\Repositories\SidebarRepository;
use Corp\Repositories\ArticlesRepository;
use Corp\Repositories\CommentsRepository;
use Corp\Category;
use Corp\Article;
use Config;
use DB;

class ArticlesController extends SiteController
{
	public function __construct(PortfoliosRepository $p_rep,ArticlesRepository $a_rep,CommentsRepository $c_rep){
	    parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

	    $this->bar = 'right';
	    $this->a_rep = $a_rep;
        $this->p_rep = $p_rep;
        $this->c_rep = $c_rep;
	    $this->template = env('THEME').'.articles';

	}
    //
    function index($cat_alias=FALSE){

    	$this->title = 'My site';
        $this->meta_desc = 'Описание';
        $this->keywords = 'Ключевые слова';

        $comments = $this->getComments();
        $portfolios = $this->getPortfolios();
        $this->contentRightBar=view(env('THEME').'.articlesBar')->with(['comments'=>$comments,'portfolios'=>$portfolios])->render();
        $articles = $this->getArticles($cat_alias);
        $content = view(env('THEME').'.articles_content')->with('articles',$articles)->render();
        $this->vars = array_add($this->vars,'content',$content);
        
    	return $this->renderOutput();
    }
    function show($alias=FALSE){

        $article = $this->a_rep->getArticle($alias,['comments'=>TRUE]);
        $this->title = $article->title;
        $this->keywords = $article->keywords;
        $this->meta_desc = $article->seo_descr;
        //dd($article->comments->groupBy('parent_id'));
        $content = view(env('THEME').'.fullArticle')->with('article',$article)->render();
        $portfolios = $this->getPortfolios();
        $comments = $this->getComments();
        $this->contentRightBar=view(env('THEME').'.articlesBar')->with(['comments'=>$comments,'portfolios'=>$portfolios])->render();
        $this->vars = array_add($this->vars,'content',$content);
        return $this->renderOutput();
    }

     protected function getArticles($cat_alias=FALSE){
             $where = FALSE;
            if($cat_alias){
            
            $id = Category::select('id')->where('alias',$cat_alias)->value('id');
            $where=['category_id',$id];
        }
        $articles = $this->a_rep->get(['id','title','desc','alias','img','created_at','user_id','category_id','keywords','seo_descr'],FALSE,TRUE,$where);
        if($articles){
        $articles->load('user','category','comments');
        }
        return $articles;
    }
    protected function getComments(){
         $comments =$this->c_rep->get(['id','text','name','site','articles_id','users_id'],config('settings.comments_bar'));
         return $comments;
    }
    protected function getPortfolios($alias=false){
        $portfolios = $this->p_rep->get(['title','text','alias','img','filter_alias'],config('settings.portfolios_bar'));
        return $portfolios;
    }

}
