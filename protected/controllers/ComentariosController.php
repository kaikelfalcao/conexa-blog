<?php

class ComentariosController extends Controller
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
        $params = $_POST;

        if($params['corpo'] == ''){
            Yii::app()->user->setFlash('error', 'Para postar um comentario o corpo é necessario');
            $id = $params['idPost'];
            $this->redirect("/post/show?id=$id#comentarios");
        }
    }

}