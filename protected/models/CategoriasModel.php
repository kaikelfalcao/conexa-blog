<?php

class CategoriasModel extends CFormModel
{
    public function getCategorias()
    {
        $curl = curl_init("my-json-server.typicode.com/kaikelfalcao/conexa-blog/categorias");

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

    public function getCategoriasForm()
    {
        $curl = curl_init("my-json-server.typicode.com/kaikelfalcao/conexa-blog/categorias");

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

        $i = 0;
        $data = array_map(function($categoria) use (&$i) {
            return array('id' => $i++, 'nome' => $categoria);
        }, $data);

        return $data;
    }
}