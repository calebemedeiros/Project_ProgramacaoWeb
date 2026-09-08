# Consulta de Signos

Projeto desenvolvido na disciplina de **Programação Web**, do curso de Enganharia de Software. A aplicação permite informar uma data de nascimento e consultar o signo zodiacal correspondente, utilizando os dados armazenados em um arquivo XML.

## Objetivos

- Criar uma página com formulário para inserção da data de nascimento;
- Consultar o signo zodiacal correspondente à data informada;
- Ler as informações dos signos a partir de um arquivo XML;
- Exibir o nome, o período, o ícone e a descrição do signo encontrado;
- Aplicar estilização responsiva com Bootstrap e CSS próprio;
- Validar a aplicação por meio de diferentes datas, inclusive datas do limite dos períodos.

## Tecnologias utilizadas

- PHP;
- HTML5;
- CSS3;
- Bootstrap 5.2;
- XML;
- XAMPP (Apache).

## Funcionamento

1. `index.php` apresenta o formulário de consulta e recebe a data de nascimento no formato aceito pelo campo de data.
2. O formulário envia os dados por `POST` para `show_zodiac_sign.php`.
3. `show_zodiac_sign.php` valida a data, carrega `signos.xml` com `simplexml_load_file()` e compara o dia e o mês com os períodos dos doze signos.
4. O resultado exibe o signo encontrado, seu período, ícone e descrição. Em caso de data inválida ou falha na leitura do XML, uma mensagem de erro é apresentada.
5. O período de Capricórnio, que atravessa a virada do ano, é tratado separadamente na comparação das datas.

## Estrutura do projeto

```text
.
├── assets/
│   ├── css/
│   │   └── style.css
│   ├── imgs/
│   └── js/
├── layouts/
│   └── header.php
├── index.php
├── show_zodiac_sign.php
├── signos.xml
└── README.md
```

### Arquivos principais

- `index.php`: página inicial com o formulário de consulta.
- `show_zodiac_sign.php`: processamento da data, leitura do XML e apresentação do resultado.
- `layouts/header.php`: estrutura inicial do HTML, metadados, Bootstrap e folha de estilos.
- `signos.xml`: períodos, nomes, ícones e descrições dos signos.
- `assets/css/style.css`: estilos complementares da aplicação.

## Como executar

O projeto precisa ser executado por um servidor PHP. O Live Server ou a abertura direta do arquivo não processam PHP.

### Usando o XAMPP

1. Instale o [XAMPP](https://www.apachefriends.org/download.html), caso ainda não esteja instalado.
2. Copie ou clone esta pasta para o diretório `htdocs` do XAMPP. No Windows, o caminho normalmente é:

   ```text
   C:\xampp\htdocs\Project
   ```

3. Abra o painel do XAMPP e inicie o módulo **Apache**.
4. Acesse a aplicação no navegador:

   ```text
   http://localhost/Project/
   ```

Se a pasta tiver outro nome dentro de `htdocs`, substitua `Project` pelo nome correto na URL.

## Testes sugeridos

- Consultar datas no início, no fim e no meio de cada período;
- Testar uma data de Capricórnio antes e depois da virada do ano;
- Verificar o envio sem preencher o campo de data;
- Confirmar que o resultado oferece o link para uma nova consulta.

## Autor

Projeto acadêmico desenvolvido por **Calebe Medeiros** para o portfólio de Engenharia de Software.
