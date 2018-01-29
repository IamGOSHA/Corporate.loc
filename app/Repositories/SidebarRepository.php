<?php 
namespace Corp\Repositories;

use Corp\Sidebar;


 class SidebarRepository extends Repository{

 		public function __construct(Sidebar $sidebar){ 
 			$this->model = $sidebar;

 		}
}	
 ?>