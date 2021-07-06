<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mestre</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{$ROTA_STYLES}/global.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Risque&display=swap" rel="stylesheet">


</head>

<body>
    <nav>
        <div class="navigation" id="navigation">
            <div class="pages">
                <a href="">Home</a>
                <a href="{$ROTA_CAMPANHAS}">Campanha</a>
                <a href="{$ROTA_PERSONAGENS}">Personagens</a>
                <a href="">Monstros</a>
                <a href="">Progredir campanha</a>
            </div>
            <div class="exit">
                <a href="">Sair</a>
            </div>
        </div>
        <div class="navigation-check">
            <input type="checkbox" id="checkbox">
            <label for="checkbox">
                <img src="{$ROTA_IMAGES}/Vector.svg" alt="">
            </label>
        </div>
    </nav>
    <main>
        {php}
        if(Rotas::get_Pagina() == 0){
        } else{
        {/php}

        Mestre
        {php}
        }
        {/php}
    </main>
</body>

<script>
    document.getElementById("checkbox").addEventListener("click", myFunction);


    function myFunction() {
        if (document.getElementById('checkbox').checked) {
            document.getElementById("navigation").style.left = '0';
        } else {
            document.getElementById("navigation").style.left = '-100%';
        }
    }
</script>

</html>