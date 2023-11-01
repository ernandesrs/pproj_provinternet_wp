# Requisitos
PHP 8 ou superior e Node instalados.

# Instalação
Obtenha o código fonte a sua maneira.

Copie, cole e renomeie o arquivo <b>example.config.php</b> para <b>config.php</b>, e defina os valores das constantes.
    A url base do projeto e o nome são essenciais.

Acesse a pasta do código fonte via terminal.

## Dependências
Execute o comando abaixo para instalar as dependências PHP.
    > composer install

Execute o comando abaixo para instalar as dependências NPM.
Veja o arquivo <b>package.json</b> para ver as dependências.
    > npm install

## Compilar assets
Execute o comando abaixo para compilar os assets(css, js, etc).

Compilar versão final para produção, execute:
    > npm run build

Compilação em tempo real para proceso de desenvolvimento, execute:
    > npm run dev
