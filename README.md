# Repositório de Atividades Web 2 em Laravel

Este repositório contém atividades práticas desenvolvidas em **Laravel**, seguindo a sequência de exercícios para aprendizado de CRUD, relacionamentos, migrations, seeders e controllers.

---

## 📂 Estrutura de Pastas / Atividades

- **ATV. 01 - Migrations**  
  Contém as migrations para criação das tabelas do banco de dados, incluindo `authors`, `categories`, `publishers`, `books` e tabelas auxiliares de relacionamento.

- **ATV. 02 - CRUD (Laravel)**  
  Implementação de CRUD básico utilizando Laravel para os modelos principais, com validação e formulários.

- **ATV. 03 - Model, Seeder and Factory**  
  Contém os modelos (`Author`, `Book`, `Category`, `Publisher`) com factories e seeders para popular dados de teste.

- **ATV. 04 - Inclusão de Relacionamento N para N Empréstimo**  
  Implementação de relacionamento **muitos-para-muitos** para controle de empréstimos entre usuários/livros.

- **ATV. 05 - Controllers, Views e Rotas dos CRUDs de Author, Category, Publisher e Book**  
  Contém a implementação completa dos controllers, views em Blade e rotas para todos os recursos, incluindo formulários com `select` e `input` de ID, validação e mensagens de erro.

- **ATV. 06 - Funcionalidade de Empréstimo**
  Desenvolvimento da funcionalidade de controle de empréstimos, possibilitando o registro das relações entre usuários e livros, com armazenamento das datas de empréstimo e devolução, além da exibição do histórico de empréstimos de cada usuário.

- **ATV. 07 - Upload de Imagem para Capa do Livro**
  Implementação da funcionalidade de envio de imagem para a capa do livro durante o cadastro ou edição. Inclui a adição do campo de upload no formulário, validação do arquivo (tipo e tamanho), armazenamento da imagem no diretório apropriado e registro do caminho no banco de dados. A atividade também abrange a exibição da capa nas telas de listagem e detalhes, além da utilização de uma imagem padrão caso nenhuma capa seja enviada.
---

## ⚙️ Instalação e Execução

1. Clone o repositório:

```bash
git clone https://github.com/VSoares27/ATIVIDADES-DE-WEB-2.git
cd ATIVIDADES-DE-WEB-2
