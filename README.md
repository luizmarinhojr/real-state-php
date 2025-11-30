# 🏠 Real Estate PHP

Um sistema simples e robusto para gerenciamento de clientes do setor imobiliário, construído com PHP puro, seguindo princípios de arquitetura moderna e componentização.

![Banner da Home](public/assets/home-banner.webp)

## ✨ Funcionalidades

- **Autenticação de Usuário**: Sistema completo de login e cadastro.
- **Gerenciamento de Clientes (CRUD)**: Crie, visualize, atualize e remova clientes de forma eficiente.
- **Gerenciamento de Endereços**: Cadastro de endereços integrado.
- **Consulta de CEP**: Preenchimento automático de endereço utilizando a API [ViaCEP](https://viacep.com.br/).
- **Interface Amigável**: Design limpo e responsivo para uma ótima experiência de usuário.

---

## 🛠️ Tecnologias Utilizadas

- **Backend**:
  - **PHP 8+** (sem frameworks)
  - **Arquitetura**: MVC com separação de responsabilidades (Use Cases, Repositories, DTOs).
  - **Composer**: Para gerenciamento de dependências.

- **Frontend**:
  - HTML5
  - CSS3 (com variáveis para fácil customização)
  - JavaScript (vanilla) para interatividade e chamadas de API.

- **Banco de Dados**:
  - **MySQL**

- **Infraestrutura**:
  - **Docker** e **Docker Compose**: Para um ambiente de desenvolvimento containerizado e consistente.
  - **Nginx**: Como servidor web.

---

## 🚀 Como Começar

Para executar este projeto localmente, você precisará ter o **Git**, **Docker** e **Docker Compose** instalados.

1.  **Clone o repositório:**
    ```bash
    git clone https://github.com/seu-usuario/real-state-php.git
    cd real-state-php
    ```

2.  **Suba os containers Docker:**
    Navegue até a pasta `infra` e execute o comando para construir e iniciar os serviços (PHP, Nginx, MySQL).
    ```bash
    cd infra
    docker-compose up -d --build
    ```
    O banco de dados será inicializado automaticamente pelo script `infra/init-scripts/init.sql`.

3.  **Acesse a aplicação:**
    Abra seu navegador e acesse [http://localhost:8080](http://localhost:8080).

Pronto! A aplicação estará no ar e pronta para ser utilizada.

---

## 📂 Estrutura do Projeto

O projeto é organizado de forma a separar as responsabilidades, facilitando a manutenção e escalabilidade.

```
/
├── App/                # Core da aplicação
│   ├── Controller/     # Controladores que recebem as requisições
│   ├── Dto/            # Data Transfer Objects para validação e transferência de dados
│   ├── Model/          # Modelos de dados (entidades)
│   ├── Repository/     # Camada de acesso ao banco de dados
│   ├── Usecase/        # Lógica de negócio da aplicação
│   └── view/           # Arquivos de apresentação (HTML/PHP)
├── Config/             # Configurações (ex: conexão com o banco)
├── infra/              # Arquivos de infraestrutura (Docker, Nginx)
├── public/             # Pasta pública com assets (CSS, JS, imagens) e o index.php
└── vendor/             # Dependências do Composer
```

---

## 📄 Licença

Este projeto é distribuído sob a licença MIT. Veja o arquivo `LICENSE` para mais detalhes..
