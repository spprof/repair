<?php
class SiteController extends YFrontController
{

    public function actionIndex()
    {
        $this->render('welcome');
    }

    public function actionSpecialists()
    {
        $this->render('specialists');
    }

}