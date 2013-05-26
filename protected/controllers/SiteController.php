<?php
class SiteController extends YFrontController
{

    public function actionIndex()
    {
        $this->render('welcome');
    }
    
    public function actionAbout()
    {
    	$this->render('about');
    }

    public function actionSpecialists()
    {
        $this->render('specialists');
    }

    public function actionRegister()
    {
        $this->render('register');
    }

	public function actionProfile()
    {
        $this->render('profile');
    }    
    public function actionTenders()
    {
        $this->render('tenders');
    }  
    public function actionFaq()
    {
        $this->render('faq');
    }    
}
