# Simple API 🏋️‍♂️

Esse é um projeto de API simples para listar movimentos e recordes pessoais na execução dos mesmos.

---

## Requisitos ⚠️

Para executar este projeto localmente, você precisará ter os seguintes requisitos instalados na sua máquina:

-   Docker
-   Docker Compose
-   Composer

---

## Como Executar 🤓

Siga os passos abaixo para configurar e executar o projeto localmente:

### 1. Instalar Dependências 💽

No diretório raiz do projeto, execute o seguinte comando para instalar as dependências com o Composer:

```bash
composer install
```

### 2. Subir o Projeto com Laravel Sail 🛥️

Após a instalação das dependências, inicie o ambiente Docker com Laravel Sail usando o comando abaixo:

```bash
./vendor/bin/sail up -d
```

### 3. Criando Tabelas no Banco de Dados ⚒️

Depois que os containers estiverem em pé, execute as migrações para criar as tabelas no banco de dados:

```bash
./vendor/bin/sail php artisan migrate
```

### 4. Inserir Registros no Banco de Dados 📂

O seeder irá incluir os registros no banco de dados, execute o seguinte comando para que o Laravel faça o trabalho duro:

```bash
./vendor/bin/sail php artisan db:seed --class=ApiSeeder
```

### 5. Testes Unitários 🧙

Para verificar se os retornos da API estão corretos, execute os testes unitários definidos no projeto:

```bash
./vendor/bin/sail php artisan test
```

### Rotas da API

### 1. Listar Movimentos 📜

Endpoint para listar os movimentos mapeados no banco de dados.

-   URL: `/movements`
-   Método: GET
-   Descrição: Retorna uma lista de todos os movimentos disponíveis no banco de dados.

### 2. Listar Recordes Pessoais por ID de Movimento 🤸

Endpoint para listar os recordes pessoais dos usuários pelo ID do movimento.

-   URL: `/api/v1/personal-record/{movement_id}`
-   Método: GET
-   Parâmetro de URL: `{movement_id}` - ID do movimento para o qual você deseja listar os recordes pessoais.
-   Descrição: Retorna uma lista dos recordes pessoais dos usuários para um movimento específico identificado pelo `movement_id`.

### Notas Adicionais 🤟

Este arquivo `README.md` é o guia definitivo para que você possa executar utilizar o Simple API como bem entender.
