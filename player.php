<!DOCTYPE html>

<html>
    <head>
        <title> REA player </title>

        <link rel="stylesheet" type="text/css" href="css/estilos.css">    

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pacifico|Roboto+Slab:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Monofett" rel="stylesheet">

        <link rel="stylesheet" href="Curso/css/normalizer">
        <link rel="stylesheet" href="Curso/css/estilos.css">
        <meta charset="utf-8">
    </head>
    <body>
        <nav>
               <a href="#">REA Player</a>
            <ul>
            <li> <a href="#sobre">SOBRE</a> </li>
            <li> <a href="#apoio">APOIO</a></li>
            <li> <a href="#contato">CONTATOS</a></li>
            </ul>
        </nav>

        <header>
<?php

$conexao = mysqli_connect("localhost", "usuario", "123", "crawler");


//SE O ID DO VIDEO FOI ESCOLHIDO, SELECIONAR O VIDEO NO BANCO DE DADOS

if($_GET["id"]!=""){

    $id=$_GET["id"];
    $video_escolhido = mysqli_query($conexao, "SELECT * FROM videos WHERE id=$id");

    $video = mysqli_fetch_array($video_escolhido);

    $link_video = $video["link_video"];
    $titulo     = $video["titulo"];

    echo "<video src='$link_video' controls width=100% height='100%' autoplay></video><br>";
    echo "<div id= 'player'><h2>$titulo</h2> </div>";
}

?>
</header>

<?php

//MOSTRAR TODOS OS VIDEOS

$videos = mysqli_query($conexao, "SELECT * FROM videos");


echo "";
while($video = mysqli_fetch_array($videos)){

    $id     = $video["id"];
    $titulo = $video["titulo"];
    $titulo = utf8_decode((substr($titulo, 0, 30)) . "...");
    
    echo "<div id='miniatura'><ul><li> <p> <a href='player.php?id=$id'><img src='miniatura.png'><br>
    $titulo </a> </p> </li></ul></div>";

}

echo "";
?>

        <section id="sobre">
            <h2>SOBRE</h2>
            <p>Página com vídeos educacionais extraídos do repositório ROCA.</p>
            <p>Monografia de Licenciatura em Informática.</p>
            <p>UTFPR - Francisco Beltrão.</p>
            <a href="#contato" class="botao">Fale com o autor!</a>
        </section>

        <section id="apoio">
            <h2 class="red">Apoio</h2>

                <img src="imageRea.jpg" alt="rea">

                <img src="imageRoca.jpg" alt="roca">

        </section>

        <section id="contato">
            <h2>CONTATO</h2>
              <div>
                <img src="mail.png" alt="email"> </br>
                <a href="felipeg@alunos.utfpr.edu.br">felipeg@alunos.utfpr.edu.br</a>
            </div>
        </section>

        <footer>
            <p>Desenvolvido por Felipe Theodoro Guimarães</p> <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"><img alt="Licença Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc/4.0/88x31.png" /></a><br />Este trabalho está licenciado com uma Licença <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">Creative Commons - Atribuição-NãoComercial 4.0 Internacional</a>.
        </footer>
    </body>
</html>
