<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $dataProvider=new CActiveDataProvider('Status',
            array(
                'criteria'=>array(
                    'order'=>'date DESC',
                ),
                'pagination'=>array(
                    'pageSize'=>5,
                ),
            )
        );
        $dataProvider->getSort();
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
        $model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
                $name='VladimirFeskov.com Robot';
				$subject='Someone submitted something on the site';
				$headers="From: $name <robot@vladimirfeskov.com>\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);

				Yii::app()->user->setFlash('contact','Thanks, I\'ll reply to you when I get a chance.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

    /**
     * Displays the positions page
     */
    public function actionWorkhistory()
    {
        if(isset($_GET['update']) && !Yii::app()->user->isGuest)
        {
            $linkedin = new LinkedIn(array(
                'appKey'       =>  Yii::app()->params['linkedinAppKey'],
                'appSecret'    => Yii::app()->params['linkedinAppSecret']
            ));
            $linkedin->setTokenAccess(array(
                'oauth_token' => Yii::app()->params['linkedinOauthToken'],
                'oauth_token_secret' => Yii::app()->params['linkedinOauthTokenSecret']
            ));
            $linkedin->setResponseFormat(LINKEDIN::_RESPONSE_JSON);
            $positions = $linkedin->profile('~:(positions)');
            $positions = json_decode($positions['linkedin'])->positions->values;

            $model = new Position();
            $model->deleteAll('1=1');
            $successfullyInserted = 0;
            foreach($positions as $position)
            {
                $model->attributes=array(
                    'title'=>$position->title,
                    'summary'=>$position->summary,
                    'startdate'=>$position->startDate->year.'-'.(($position->startDate->month < 10) ? '0'.$position->startDate->month : $position->startDate->month),
                    'enddate'=>($position->endDate) ? ($position->endDate->year.'-'.(($position->endDate->month < 10) ? '0'.$position->endDate->month : $position->endDate->month)) : '',
                    'companyname'=>$position->company->name,
                    'companysize'=>$position->company->size,
                    'companyindustry'=>$position->company->industry,
                );
                $model->setPrimaryKey(null);
                $model->setIsNewRecord(true);
                if($model->insert())$successfullyInserted++;
            }
            Yii::app()->user->setFlash('positions',"$successfullyInserted out of ".count($positions)." positions added to the db.");
            $this->redirect($this->createUrl('/site/workhistory'));
        }
        $dataProvider = new CActiveDataProvider('Position');
        $this->render('workhistory',array('dataProvider'=>$dataProvider));
    }

    /**
     * Updates positions table with data from LinkedIn
     */
    public function actionUpdatePositions()
    {

    }

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
            {
                $this->redirect(Yii::app()->user->returnUrl);
            }
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
        Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}