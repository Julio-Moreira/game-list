# Lista de jogos

  Uma simples lista de jogos com detalhes de jogos produtoras e generos e sistema de login
O projeto desenvolvido consiste em um sistema web para gerenciamento de uma lista de jogos eletrônicos. O objetivo principal é permitir que os usuários 
consultem informações detalhadas sobre diversos jogos, como nome, gênero, produtora, imagem e nota do IMDb. Essas informações são armazenadas em um banco 
de dados e apresentadas por meio de uma interface simples, clara e funcional.

  Utilizamos formulários HTTP para enviar dados, como cadastros e edições de jogos e usuários, ao servidor. Assim, cada ação do usuário, como adicionar um 
novo jogo ou editar uma produtora, é processada por rotas nas páginas PHP responsáveis por tratar as informações e atualizar o banco de dados. Além disso, 
o sistema está integrado com a API do IMDb, que permite exibir a nota pública de avaliação dos jogos diretamente da base de dados internacional de filmes e 
jogos.

  Para gerir o sistema existem dois tipos de usuários: Usuários administradores, que têm permissão total para realizar operações de cadastro, leitura, 
atualização e exclusão (CRUD) de jogos, gêneros, produtoras e até mesmo de outros usuários; e usuários comuns, que têm acesso apenas para visualizar os 
jogos disponíveis no sistema, sem possibilidade de alteração nos dados.


<img src='fotos/home.png' alt='home' width='300px'/>
<em>home do site</em>


<em>o site é feito com base no curso "<a href='https://www.estudonauta.com/curso/php-com-banco-de-dados-modulo-00-primeiros-passos/'> PHP com MySQL </a>" do <a href='https://www.estudonauta.com'> estudonauta </a>, porém fiz diversas alterações! </em>
