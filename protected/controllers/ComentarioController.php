<?php

class ComentarioController extends Controller
{
    public function actions()
    {
        return array(
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    public function actionStore()
    {
        $model = new ComentarioModel();

        if(isset($_POST['ComentarioModel']))
        {
            $model->attributes = $_POST["ComentarioModel"];
            if($model->validate())
            {
                var_dump($model);
                die();
            }
            else{
                Yii::app()->user->setFlash('error', $model->getErrors());
                $this->redirect(array('post/show', 'id' => $model->idPost));
            }
        }
    }

}