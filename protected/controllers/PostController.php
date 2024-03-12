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
            return $this->render('404');
        }

        $modelComentario = (new ComentarioModel());

        $this->render('show', ["post" => $post, 'model' => $modelComentario]);

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
                if($model->save($model) == 201){
                    Yii::app()->user->setFlash('info', 'Post salvo com sucesso!');
                }else{
                    Yii::app()->user->setFlash('info', 'Post não foi salvo, tente novamente!');
                    $this->render('create', ['model' => $model]);
                }
                $this->redirect('/');
            }
            else{
                $this->render('create', ['model' => $model]);
            }
        }
        var_dump($_POST['PostModel']);
        die();
    }

    public function actionEdit()
    {
        $params = $_GET;

        if (isset($params['id'])){
            $model = new PostModel();
            $model->attributes = $model->getPostById($params['id']);
            $post = $model;
        }

        if (empty($post)){
            return $this->render('404');
        }

        $categorias = (new CategoriasModel())->getCategorias();


        return $this->render('edit', ["categorias" => $categorias, 'model' => $post, "id" => $params['id']]);

    }

    public function actionUpdate()
    {
        $model = new PostModel();
        if(isset($_POST['PostModel']))
        {
            $id = $_POST['PostModel']['id'];
            $model->attributes = $_POST['PostModel'];
            if($model->validate())
            {
                if($model->update($model, $id) == 200){
                    Yii::app()->user->setFlash('info', 'Post Atualizado com sucesso!');
                }else{
                    Yii::app()->user->setFlash('info', 'Post não foi atualizado, tente novamente!');
                    $this->render('create', ['model' => $model, 'id' => $id]);
                }
                $this->redirect("/post/show?id=$id");
            }
            else{
                $this->render('edit', ['model' => $model, 'id' => $id]);
            }
        }
        var_dump($_POST['PostModel']);
        die();
    }

    public function actionDelete()
    {
        $params = $_GET;
        $id = $params['id'];
        if ($id){
            $model = new PostModel();
            if($model->delete($id) == 200){
                Yii::app()->user->setFlash('info', 'Post deletado com sucesso!');
            }else{
                Yii::app()->user->setFlash('info', 'Post não foi deletado, tente novamente!');
            }
        }

        $this->redirect("/");
    }

    public function actionError()
    {
        $error=Yii::app()->errorHandler->error;


        if ($error['code'] == 404){
            $this->render('404');
        }

        var_dump($error);
        die();
    }

}