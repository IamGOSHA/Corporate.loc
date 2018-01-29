<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Corp\Repositories\MenusRepository;
use Menu;
class SiteController extends Controller
{
    //
    protected $p_rep;
    protected $s_rep;
    protected $a_rep;
    protected $m_rep;
    protected $c_rep;
    protected $temlate;
    protected $meta_desc;
    protected $keywords;
    protected $title;
    protected $vars=array();
    protected $bar = FALSE;
    protected $contentLeftBar = FALSE;
    protected $contentRightBar = FALSE;
    public function __construct(MenusRepository $m_rep){
        $this->m_rep=$m_rep;
    }
    public function renderOutput(){

        $menu = $this->getMenu();
        $footer = view(env('THEME').'.footer')->render();
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'title',$this->title);
        $this->vars = array_add($this->vars,'meta_desc',$this->meta_desc);
        $this->vars = array_add($this->vars,'keywords',$this->keywords);
        $navigation = view(env('THEME').'.navigation')->with('menu',$menu)->render();
        if($this->contentRightBar){
            $rightBar =view(env('THEME').'.rightBar')->with('contentRightBar',$this->contentRightBar)->render();
            $this->vars = array_add($this->vars,'rightBar',$rightBar);
        }

        $this->vars = array_add($this->vars,'navigation',$navigation);
    	return view($this->template)->with($this->vars);
        
    }
    protected function getMenu(){
        $menu = $this->m_rep->get();
        $m_bilder = Menu::make('Main_menu',function($main_menu) use($menu){
            foreach($menu as $item){
                if($item->parent_id == 0){
                    $main_menu->add($item->title,$item->path)->id($item->id);
                }
                else{
                    if($main_menu->find($item->parent_id)){
                        $main_menu->find($item->parent_id)->add($item->title,$item->path)->id($item->id);
                    }
                }
            }
        });
        return  $m_bilder;

    }
}
