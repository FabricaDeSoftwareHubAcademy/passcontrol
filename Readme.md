# 📙 Documentação - Passcontrol

**Versão:** 1.0
**Data:** 15/07/2025
**Autenticação:** Sessão PHP via `$_SESSION`

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

Inativa um usuário.

---

## 🧾 Perfil do Usuário

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

## 🧾 Códigos de Status

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

## 📎 Observações

* A autenticação utiliza sessão PHP com `$_SESSION`.
* Os endpoints estão localizados em `/app/actions/`.
* A maioria dos endpoints exige que o usuário esteja logado.
* É recomendável que as chamadas posteriores verifiquem se `$_SESSION['id_usuario']` está definido.

---

## ✍️ Contribuição

Caso novos endpoints sejam adicionados ou alterados, recomenda-se atualizar esta documentação. Sugestões de melhoria e padronização são bem-vindas.
