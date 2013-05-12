<?php
class FrontAccessControl extends CAccessControlFilter
{
    public function preFilter($filterChain)
    {
        if (Yii::app()->user->isAuthenticated())
            return true;
        Yii::app()->user->setFlash(
        	YFlashMessages::NOTICE_MESSAGE,
        	Yii::t('TournamentSys.FrontAccessControl', '<b>Внимание!</b> Для выполнения данного действия необходимо войти или зарегистрироваться!')
        );
        $this->accessDenied(Yii::app()->user, Yii::t('yii', 'You are not authorized to perform this action.'));
    }
}