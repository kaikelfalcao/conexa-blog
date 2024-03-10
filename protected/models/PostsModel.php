<?php

class PostsModel extends CFormModel
{
    public $posts;


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
}