<?php
/**
 * Контроллер отвечающий за front - часть
 */
class YFrontController extends YMainController
{
    /**
     * Меню сайта, меняется в админке
     * @TODO скорее всего можно эту переменную убрать, необходима проверка
     */
    public $menu        = array();
    /**
     * Хлебные крошки сайта, меняется в админке
     */
    public $breadcrumbs = array();
    /**
     * Описание сайта, меняется в админке
     */
    public $description;
    /**
     * Ключевые слова сайта, меняется в админке
     */
    public $keywords;

    /**
     * Вызывается при инициализации YFrontController
     * Присваивает значения, необходимым переменным
     */
    
    protected $_model = null;
    
    public function init()
    {
        parent::init();
        $this->pageTitle   = $this->yupe->siteName;
        $this->description = $this->yupe->siteDescription;
        $this->keywords    = $this->yupe->siteKeyWords;
        if ($this->yupe->theme)
            Yii::app()->theme = $this->yupe->theme;
        else
            Yii::app()->theme = 'default';
    }
    
    public function loadSelfModel($id, $model=null) {
    	$model = $this->loadModel((int)$id, $model);
    	$user_id = Yii::app()->user->id ;
    	$owner_id = $model->owner_id;
    	$is_super_user = Yii::app()->user->isSuperUser();
    	if ($model === null || (! $is_super_user && ($user_id !== $owner_id || !$owner_id)) )
    		throw new CHttpException(404, Yii::t('TournamentSys.404', 'Запрошенная страница не найдена!'));
    	return $model;
    }
    
    public function loadModel($id, $model=null)
    {
    	$model = ($model) ? $model : $this->_model;
    	$model = $model->findByPk($id);
    	if ($model === null)
    		throw new CHttpException(404, Yii::t('tournament_stat', 'Запрошенная страница не найдена.'));
    	return $model;
    }
}