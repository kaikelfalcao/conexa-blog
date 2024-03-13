# Blog - Desafio 
O desafio consiste em construir um Blog 
atendendo os seguintes requisitos:
- Qualquer pessoa pode ver e publicar postagens
- Qualquer pessoa pode ver e publicar comentarios
- Ter as seguintes categorias: Integrações, Serviços, Financeiro, Agenda, Parceiros e Outros
- Exibir a lista de Postagens
- Ao clicar em um Post, exibir em página separada
- As postagens deverão ter um pequeno resumo, data da postagem, autor e título
- Usar a ferramenta [my-json-server](https://my-json-server.typicode.com/)
- Fazer validação tanto no Front como no Back

## Capacidades
- Filtrar Postagens por nome do Autor ou Categoria
- CRUD Postagem
- Fazer comentarios

## Índices
- [Pré-requisitos](#Pré-requisitos)
- [Passos](#Passos)
- [Tecnologias](#Tecnologias)
- [Autor](#Autor)

# Como Rodar o Projeto
### Pré-requisitos
- Docker

## Passos

Clone o repositório na pasta de sua preferencia

`git clone https://github.com/kaikelfalcao/conexa-blog`

Entre no diretorio

`cd conexa-blog`

E para rodar o projeto basta executar o comando:

`docker-compose up --build`

Agora basta acessar no seu browser de preferência

[localhost:8080](http://localhost:8080/)

### Tecnologias
- `Yii 1.1.22` para aplicacação
- `my-json-server` para API Rest
- `TailwindCSS e AlpineJS` para estilização
- `Nginx` como Load Balancer e Web Server


### Autor

[Kaike Falcão](https://github.com/kaikelfalcao)

[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/kaikefalcao/)
[![twitter](https://img.shields.io/badge/twitter-1DA1F2?style=for-the-badge&logo=twitter&logoColor=white)](https://twitter.com/kaikelime)