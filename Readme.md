# 📙 Documentação - Passcontrol

**Versão:** 1.0
**Data:** 15/07/2025
**Autenticação:** Sessão PHP via `$_SESSION`

---

## 🔧 Configuração do .env

Antes de rodar o sistema, crie um arquivo `.env` na raiz do projeto com as seguintes variáveis (baseado no `.example.env`):


> ⚠️ **Importante:** Nunca compartilhe seu `.env` real em repositórios públicos. Use o `.example.env` como referência.

---

## 🧱 Arquitetura do Sistema

- **Frontend**: [HTML, CSS]
- **Backend**: [PHP, JS]
- **Banco de Dados**: [MySQL]
- **API de SMS**: Integração com serviços de envio de mensagens para notificação de usuários.
- **Envio emails**: [Composer, PHPMAILER]

---

## ⚙️ Tecnologias

- PHP 8.1
- MySQL
- HTML/CSS
- JavaScript
- PHP Mailer
- Composer
- API de envio de SMS

---

# 🚀 Instalação Rápida do PassControl

# 1. Clone o repositório
git clone https://github.com/FabricaDeSoftwareHubAcademy/passcontrol.git
cd passcontrol

# 2. Copie o arquivo de variáveis de ambiente
cd .example.env 

# 3. Instale as dependências do PHP com Composer
composer install

# 4. Crie o banco de dados no MySQL (substitua pelo nome desejado)
# Acesse o MySQL:
mysql -u root -p

# No prompt do MySQL, execute:
CREATE DATABASE passcontrol CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;

# 5. Importe o arquivo SQL com a estrutura e dados iniciais
mysql -u root -p passcontrol < database/passcontrol.sql

# 6. Inicie o servidor local (Apache + MySQL via XAMPP, Laragon ou similar)

# 7. Acesse o sistema via navegador:
http://localhost/passcontrol

# ✅ Pronto!
# Faça login com um usuário existente ou crie um novo via banco ou pagina do admin.

---

## 🔐 Autenticação (Login)

### `POST /app/actions/usuario_logar.php`

Autentica um usuário com CPF e senha.

**Parâmetros:**

```json
{
  "cpf": "123.456.789-00",
  "senha": "senha123"
}
```

**Respostas:**

* Usuário não cadastrado:

```json
{
  "status": "nao_cadastrado",
  "code": 404,
  "msg": "Usuário não encontrado. Verifique o CPF informado."
}
```

* Usuário inativo:

```json
{
  "status": "usuario_inativo",
  "code": 403,
  "msg": "Usuário inativo. Entre em contato com o administrador."
}
```

* Primeiro login:

```json
{
  "status": "primeiro_login",
  "code": 201,
  "id_usuario": 5,
  "msg": "Por favor, defina sua senha para continuar."
}
```

* Login bem-sucedido:

```json
{
  "status": "ok",
  "code": 200,
  "id_usuario": 5,
  "msg": "Login realizado com sucesso.",
  "redirect": "./app/view/atendimento.php"
}
```

---

## 👤 Usuário

### `POST /app/actions/usuario_create.php`

Cria novo usuário.

**Parâmetros:**

```json
{
  "nome_usuario": "Maria",
  "email_usuario": "maria@email.com",
  "cpf_usuario": "12345678901",
  "id_perfil_usuario": 2
}
```

### `POST /app/actions/usuario_editar.php`

Atualiza dados do usuário.

### `GET /app/actions/usuario_listar.php`

Lista todos os usuários.

### `POST /app/actions/usuario_ativar.php`

Ativa um usuário inativo.

### `POST /app/actions/usuario_inativar.php`

Inativa um usuário ativo.

---

## 🔄 Recuperação de Senha

### `POST /app/actions/usuario_recuperar.php`

Envia um código de recuperação para o e-mail do usuário com base no CPF informado.

**Parâmetros:**

```json
{
  "cpf_user": "12345678901"
}
```

**Respostas possíveis:**

* CPF não enviado:

```json
{
  "status": 400,
  "message": "CPF não enviado."
}
```

* Usuário não encontrado:

```json
{
  "status": 404,
  "message": "Usuário não encontrado."
}
```

* Sucesso no envio:

```json
{
  "status": 200,
  "message": "E-mail enviado com sucesso!"
}
```

* Falha no envio:

```json
{
  "status": 400,
  "message": "O e-mail não pôde ser enviado. Erro: <detalhes>"
}
```

---

### `POST /app/actions/usuario_redefinir_senha.php`

Redefine a senha do usuário após validação do código de recuperação.

**Parâmetros:**

```json
{
  "codigo": "12345",
  "nova_senha": "Senha@123",
  "confirmar_senha": "Senha@123"
}
```

**Regras da senha:**

* Mínimo de 8 caracteres
* Pelo menos uma letra maiúscula
* Pelo menos um número
* Pelo menos um caractere especial

**Respostas possíveis:**

* Código inválido ou expirado:

```json
{
  "status": 401,
  "message": "Código inválido ou expirado."
}
```

* Senhas não conferem ou inválidas:

```json
{
  "status": 400,
  "message": "Senha inválida ou não corresponde à confirmação."
}
```

* Redefinição bem-sucedida:

```json
{
  "status": 200,
  "message": "Senha redefinida com sucesso."
}
```

---

## 📜 Perfil do Usuário

### `GET /app/actions/perfil_listar.php`

Lista perfis de usuário.

### `POST /app/actions/perfil_create.php`

Cria novo perfil.

---

## 🛠 Serviços

### `GET /app/actions/servico_listar.php`

Lista serviços ativos.

### `POST /app/actions/servico_create.php`

Cria novo serviço.

### `POST /app/actions/servico_editar.php`

Edita serviço.

### `POST /app/actions/servico_ativar.php`

Ativa um serviço.

### `POST /app/actions/servico_inativar.php`

Inativa um serviço.

---

## 📋 Fila de Senhas

### `POST /app/actions/fila_create.php`

Cria nova fila de senha.

### `GET /app/actions/fila_listar.php`

Lista filas de senha existentes.

---

## 🏢 Ponto de Atendimento

### `GET /app/actions/ponto_listar.php`

Lista pontos de atendimento.

### `POST /app/actions/ponto_create.php`

Cria novo ponto de atendimento.

### `POST /app/actions/ponto_editar.php`

Edita ponto de atendimento.

---

## 📲 SMS

### `POST /app/actions/send_sms.php`

Envia SMS para um telefone informado.

**Parâmetros:**

```json
{
  "telefone_sms": "11999999999",
  "mensagem": "Sua senha foi chamada",
  "id_ponto_atendimento": 3,
  "id_servico": 5
}
```

---

## 📟 Códigos de Status

| Código | Descrição                |
| ------ | ------------------------ |
| 200    | OK                       |
| 201    | Criado com sucesso       |
| 400    | Requisição inválida      |
| 401    | Não autorizado           |
| 403    | Proibido (sem permissão) |
| 404    | Não encontrado           |
| 500    | Erro interno do servidor |

---

## 📌 Observações

* A autenticação utiliza sessão PHP com `$_SESSION`.
* Os endpoints estão localizados em `/app/actions/`.
* A maioria dos endpoints exige que o usuário esteja logado.
* É recomendável que as chamadas posteriores verifiquem se `$_SESSION['id_usuario']` está definido.

---

## ✍️ Contribuição

Caso novos endpoints sejam adicionados ou alterados, recomenda-se atualizar esta documentação. Sugestões de melhoria e padronização são bem-vindas.
