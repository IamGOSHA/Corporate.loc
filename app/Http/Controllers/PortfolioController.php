<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Corp\Repositories\PortfoliosRepository;
use Corp\Portfolio;
use Config;
use DB;
class PortfolioController extends SiteController
{
    //
		public function __construct(PortfoliosRepository $p_rep){
		    parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

		    $this->bar = 'right';
	        $this->p_rep = $p_rep;
		    $this->template = env('THEME').'.portfolio';

		}
    public function index($alias=FALSE){
    	
		$this->title = 'My site';
	    $this->meta_desc = 'Описание';
	    $this->keywords = 'Ключевые слова';

	    $this->contentRightBar=FALSE;
	    $portfolios = $this->getPortfolios();
	    $content = view(env('THEME').'.portfolio_content')->with('portfolios',$portfolios)->render();
	    $this->vars = array_add($this->vars,'content',$content);

    	return $this->renderOutput();
    	
    }
    public function show($alias=FALSE){

		$this->title = 'My site';
	    $this->meta_desc = 'Описание';
	    $this->keywords = 'Ключевые слова';

	    $this->contentRightBar=FALSE;
	    $portfolios = $this->getPortfolios($alias);
	    $content = view(env('THEME').'.portfolio_content')->with('portfolios',$portfolios)->render();
	    $this->vars = array_add($this->vars,'content',$content);

    	return $this->renderOutput();

    }
        protected function getPortfolios($alias=FALSE){
       	$where = FALSE;
        if($alias){
        $alias = Portfolio::where('alias',$alias)->first()->alias;
        $where = ['alias',$alias];
        }
        $portfolios = $this->p_rep->get(['title','text','alias','img','filter_alias'],FALSE,TRUE,$where);
        return $portfolios;
    }
}
