<?php

class PostController extends Controller
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

    public function actionIndex()
    {
        $posts = (new PostModel())->getPosts();
        $categorias = (new CategoriasModel())->getCategorias();

        if($params = $_GET){
            if(isset($params['categoria'])){
                $categoria = $params['categoria'];

                $posts = array_filter($posts, function ($item) use ($categoria){
                    return $item['categoria'] == $categoria;
                });
            }
            if(isset($params['autor'])){
                $autor = $params['autor'];

                $posts = array_filter($posts, function ($item) use ($autor){
                    return $item['autor'] == $autor;
                });
            }
        }

        $this->render('index', ["posts" => $posts, "categorias" => $categorias]);
    }

    public function actionShow()
    {
        $params = $_GET;

        if (isset($params['id'])){
            $model = new PostModel();
            $post = $model->getPostById($params['id']);
        }

        if (empty($post)){
            $this->redirect('/post');
        }

        $this->render('show', ["post" => $post]);

    }

    public function actionCreate()
    {
        $categorias = (new CategoriasModel())->getCategorias();

        $model = new PostModel();

        $this->render('create', ["categorias" => $categorias, 'model' => $model]);


    }

    public function actionStore()
    {
        $model = new PostModel();
        if(isset($_POST['PostModel']))
        {
            $model->attributes = $_POST['PostModel'];
            if($model->validate())
            {
                // Processamento do formulário aqui
            }
            else{
                $this->render('create', ['model' => $model]);
            }
        }
        var_dump($_POST['PostModel']);
        die();
    }

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

}