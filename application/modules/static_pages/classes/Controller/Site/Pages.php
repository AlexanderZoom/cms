<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Site_Pages extends Controller_Site {
	
	public function action_index(){
		$params = $this->request->param();
		$slug = Arr::get($params, 'slug');
		$modelWithRights = $this->getQueryRights(Site_Access_Declare_StaticPages::ACCESS_VIEWIT, 'index');
		////
		if ($this->request->uri() == '/'){
			$modelWithRights->where('main', '=', 1)->and_where('published_at', '<=', date('Y-m-d H:i:s', time()));
		}
		elseif(!$slug) throw new Site_HTTP_Exception_404('slug is empty');
		else ;
		
		if ($slug){
			$modelWithRights->where('slug', '=', $slug)->and_where('published_at', '<=', date('Y-m-d H:i:s', time()));
		}
		
		
		$modelWithRights = $modelWithRights->find();
		
		if (!$modelWithRights->loaded()){
			$model = Orm::factory('Site_Page')
					->where('slug', '=', $slug)
					->and_where('published_at', '<=', date('Y-m-d H:i:s', time()));
			$model = $model->find();
			
			$rPrarms = array('controller' => 'denied',
					'action' => 'index',
					'extension' => $this->request->param('extension'),
					'directory'  =>'site',
			);
			
			if ($model->loaded()){
				$url = Route::url('site', $rPrarms);
				$this->redirect($url);
			}
			else throw new Site_HTTP_Exception_404('page not found');
		}
		
		$this->template->title[] = $modelWithRights->title;
		$this->template->content = View::factory('site/pages');
		$this->template->content->data = $modelWithRights;
	}
}