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

}