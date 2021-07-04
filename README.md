<h2 align="center">LaraVueMarvel</h2>

<p align="center">
    <a href="#">
        <img alt="License" src="https://img.shields.io/github/license/Weavous/LaraVueMarvel">
    </a>
    <a href="#">
        <img alt="Languages" src="https://img.shields.io/github/languages/count/Weavous/LaraVueMarvel">
    </a>
    <a href="#">
        <img alt="Last Commit" src="https://img.shields.io/github/last-commit/Weavous/LaraVueMarvel">
    </a>
</p>

<p align="center">Development of an application to find Marvel heroes</p>

<h4 align="center">Practice Test - KingHost</h4>

<h4 align="center">About</h4>

```typescript
    return {
        "Deadline": "2021/07/06 12:00AM",

        "Method": "GIT Repository Link"
    };
```

<h4 align="center">Instructions</h4>

Buscar na API da Marvel (https://developer.marvel.com/docs) os seus 3 heróis favoritos e a partir deles listar 5 histórias nas quais eles apareçam.

<h6>Atenção para os seguintes pontos:</h6>

- A aplicação deve gerar uma página web simples para exibição no navegador;

- Você pode usar qualquer linguagem de programação para resolver o desafio. Procure apresentar um código bem escrito tanto no frontend quanto no backend;

- Formato de entrega: um repositório git (no http://www.github.com ou no https://gitlab.com);

- Implementação de testes unitários;

- O projeto deve possuir um `README` (documentação simples) com instruções de instalação e utilização, bem como quaisquer outras que você achar necessário;

<h6>Os critérios de avaliação são os seguintes:</h6>

- Entendimento do problema;

- Solução desenvolvida;

- Organização do código-fonte;

- Uso da API;

- Apresentação dos resultados;

- Documentação;

- Simplicidade;

<h4 align="center">Tasks</h4>

```typescript
    return {
        <span>❌ Test Cases</span>

        <span>❌ JWT Auth</span>

        <span>✔️ Separation of Front-end and Backend</span>
    };
```

<h4 align="center">Installation</h4>

<h6 align="center"><a href="https://iconscout.com">✔️</a> Requirements</h6>

<p align="center">
    <img width="10%" src="https://cdn.iconscout.com/icon/free/png-256/php-3629567-3032350.png" alt="PHP Logo">
    <img width="10%" src="https://cdn.iconscout.com/icon/free/png-256/node-js-1-1174935.png" alt="Node Logo">
    <img width="10%" src="https://cdn.iconscout.com/icon/free/png-256/mysql-3628940-3030165.png" alt="MySQL Logo">
    <img width="10%" src="https://cdn.iconscout.com/icon/free/png-256/vue-282497.png" alt="Vue Logo">
    <img width="10%" src="https://cdn.iconscout.com/icon/free/png-256/git-16-1175195.png" alt="Git Logo">
</p>

```typescript
    return [
        {
            dependency: "PHP",
            url: "https://www.php.net"
            version: 7.4.21,
            img: "https://cdn.iconscout.com/icon/free/png-256/php-3629567-3032350.png"
        },
        {
            dependency: "Node",
            url: "https://nodejs.org"
            version: 16.4.1,
            img: "https://cdn.iconscout.com/icon/free/png-256/node-js-1-1174935.png"
        },
        {
            dependency: "MySQL",
            url: "https://www.mysql.com"
            version: 8.0.25,
            img: "https://cdn.iconscout.com/icon/free/png-256/mysql-3628940-3030165.png"
        },
        {
            dependency: "Vue",
            url: "https://vuejs.org",
            version: 2,
            img: "https://cdn.iconscout.com/icon/free/png-256/vue-282497.png"
        },
        {
            dependency: "Git",
            url: "https://git-scm.com",
            version:  2.32.0,
            img: "https://cdn.iconscout.com/icon/free/png-256/git-16-1175195.png"
        }
    ];
```

<h6 align="center">Backend</h6>

```bash
    composer create-project laravel/laravel backend
```

```bash
    php artisan make:controller MarvelHttpRequestController
```

```bash
    php artisan make:test App\Http\Controllers\MarvelHttpRequestControllerTest
```

<h6 align="center">Frontend</h6>

```bash
    npm	install	-g vue-cli
```

```bash
    vue init webpack-simple frontend
```

<h4 align="center">Run Application</h4>

> Inside backend diretory, run Laravel application

```bash
    php artisan serve
```