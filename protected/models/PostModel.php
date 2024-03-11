<?php

class PostModel extends CFormModel
{
    public $titulo;
    public $resumo;
    public $categoria;
    public $autor;
    public $corpo;

    public function rules()
    {
        return array(
            array('titulo, resumo, categoria, autor, corpo', 'required', 'message' => 'Este campo é obrigatório.'),
            array('titulo', 'length', 'max'=>128),
            array('autor', 'length', 'max'=>128),
            array('categoria', 'numerical', 'integerOnly'=>true),

        );
    }

    public function attributeLabels()
    {
        return array(
            'titulo' => 'Título',
            'resumo' => 'Resumo',
            'categoria' => 'Categoria',
            'autor' => 'Autor',
            'corpo' => 'Corpo',
        );
    }

    public function getPosts()
    {
        $curl = curl_init("my-json-server.typicode.com/kaikelfalcao/conexa-blog/posts");

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            throw new Exception('Erro na requisição: ' . $error);
        }

        $data = json_decode($response, true);

        usort($data, function($a, $b) {
            return strtotime($b['dataDePostagem']) - strtotime($a['dataDePostagem']);
        });
        return $data;
    }

    public function getPostById($id)
    {
        $curl = curl_init("my-json-server.typicode.com/kaikelfalcao/conexa-blog/posts/$id");

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            throw new Exception('Erro na requisição: ' . $error);
        }

        $data = json_decode($response, true);

        return $data;
    }

    public function save($model)
    {
        $attributes = $model->attributes;

        $json = json_encode($attributes);

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