<?php

namespace Corp\Http\Controllers;
use Illuminate\Http\Request;
use Corp\Repositories\SlidersRepository;
use Corp\Repositories\PortfoliosRepository;
use Corp\Repositories\SidebarRepository;
use Corp\Repositories\ArticlesRepository;
use Corp\Repositories\MenusRepository;
use Corp\Menu;
use Config;
class IndexController extends SiteController
{

    public function __construct(SlidersRepository $s_rep,PortfoliosRepository $p_rep,ArticlesRepository $a_rep){
        parent::__construct(new MenusRepository(new Menu));
        $this->s_rep = $s_rep;
        $this->p_rep = $p_rep;
        $this->bar = 'right';
        $this->a_rep = $a_rep;
        $this->template = env('THEME').'.index';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->title = 'My site';
        $this->meta_desc = 'Описание';
        $this->keywords = 'Ключевые слова';
        $articles = $this->getArticles();
        $this->contentRightBar = view(env('THEME').'.indexbar')->with('articles',$articles)->render();
        
        $portfolios = $this->getPortfolio();
        $content =view(env('THEME').'.content')->with('portfolios',$portfolios)->render();
        $this->vars = array_add($this->vars,'content',$content);

        $slidersItems = $this->getSliders();
        $sliders = view(env('THEME').'.slider')->with('sliders',$slidersItems)->render();

        $this->vars = array_add($this->vars,'sliders',$sliders);
        return $this->renderOutput();
    }
    public function getSliders(){
        $getSlider = $this->s_rep->get();

        return $getSlider;
    }
    protected function getPortfolio(){
        $portfolio = $this->p_rep->get('*',Config::get('settings.take'));
        return $portfolio;
    }
        protected function getArticles(){
        $articles = $this->a_rep->get(['title','created_at','img','alias'],Config::get('settings.articles_count'));
        return $articles;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
