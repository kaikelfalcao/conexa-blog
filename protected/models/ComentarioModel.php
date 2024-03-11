<?php

class ComentarioModel extends CFormModel
{
    public $nome;
    public $corpo;

    public $idPost;

    public function rules()
    {
        return array(
            array('nome', 'length', 'max'=>26, 'message' => 'Nome não pode ultrapassar 126 caracteres.'),
            array('corpo', 'required', 'message' => 'Corpo do comentário é obrigatório.'),
            array('idPost', 'numerical', 'integerOnly'=>true),
        );
    }

    public function attributeLabels()
    {
        return array(
            'nome' => 'Nome (opcional):',
            'corpo' => 'Comentário',
        );
    }

    public function save($model)
    {
        $attributes = $model->attributes;

        $json = json_encode($attributes);

        $model->idPost = intval($model->idPost);

        $curl = curl_init("my-json-server.typicode.com/kaikelfalcao/conexa-blog/posts");

        curl_setopt($curl, CURLOPT_NOBODY, true);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");

        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type:application/json'
        ));
        curl_setopt($curl, CURLOPT_POST, true);

        curl_setopt($curl, CURLOPT_POSTFIELDS, $json);

        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        return $httpcode;
    }

}