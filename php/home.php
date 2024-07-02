<?php
$titulo = "Home";
include "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<main>
    <section class="container">
        <div class="blocoFig text-center">
            <figure>
                <a href="#"><img src="../asserts/IntroduçãoPHP.jpeg" alt="Introdução ao PHP"></a>
            </figure>
            <h2 class="text-center"><a href="#" class="text-dark">Introdução ao PHP</a></h2>
        </div>
        <div class="blocoFig text-center">
            <figure>
                <a href="#"><img src="../asserts/FrameworksPHP.png" alt="Frameworks PHP"></a>
            </figure>
            <h2 class="text-center"><a href="#" class="text-dark">Frameworks PHP</a></h2>
        </div>
        <div class="blocoFig text-center">
            <figure>
                <a href="#"><img src="../asserts/ComunidadePHP.jpeg" alt="Comunidade PHP"></a>
            </figure>
            <h2 class="text-center"><a href="#" class="text-dark">Comunidade PHP</a></h2>
        </div>
    </section>
    <section class="container margemSecao2">
        <h3>Explore o Mundo do PHP</h3>
    </section>
    <section class="container">
        <article class="text-justify">
            <p>Caros desenvolvedores, aprender PHP abre um vasto leque de oportunidades no desenvolvimento web. PHP é
                uma linguagem de programação server-side poderosa que é usada em mais de 75% dos sites na internet,
                incluindo plataformas como WordPress, Facebook e Wikipedia.</p>
            <p>Com PHP, você pode criar páginas dinâmicas e interativas facilmente. A linguagem possui uma ampla
                comunidade de desenvolvedores, que contribuem com uma vasta quantidade de recursos, frameworks e
                bibliotecas para facilitar o desenvolvimento e promover as melhores práticas. Além disso, a
                flexibilidade e a capacidade de integração do PHP com diversos bancos de dados e tecnologias tornam-na
                uma escolha ideal para muitos projetos.</p>
        </article>
        <article class="text-justify">
            <p>Explorar os frameworks PHP, como Laravel, Symfony, e CodeIgniter, pode aumentar significativamente sua
                produtividade. Estes frameworks fornecem estruturas sólidas e bem definidas para desenvolvimento, além
                de muitas ferramentas e funcionalidades que ajudam a manter o código organizado e eficiente.</p>
            <p>Além disso, a comunidade PHP é extremamente ativa e acolhedora. Participar de fóruns, grupos de discussão
                e eventos de PHP, como conferências e meetups, pode ser muito benéfico para o seu crescimento
                profissional. A constante troca de conhecimento e a colaboração entre desenvolvedores ajudam a
                impulsionar a inovação e a evolução da linguagem.</p>
        </article>
    </section>
</main>
<script src="../js/jquery-3.3.1.slim.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>

<?php include 'footer.php'; ?>