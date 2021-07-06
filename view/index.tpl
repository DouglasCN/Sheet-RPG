<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RPG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{$ROTA_STYLES}/login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Risque&display=swap" rel="stylesheet">
</head>

<body>
    {php}
    if(Rotas::get_Pagina() == 0){
    }else{
    {/php}
    <div class="panel">
        <form method="POST">
            <label for="player">Player</label>
            <input type="text" name="player" class="input-player">
            <label for="access">Acesso</label>
            <input type="password" name="access" class="input-access">
            <div class="input-center">
                <input type="submit" value="Entrar" class="input-submit">
            </div>
        </form>
    </div>
    {php}
    }
    {/php}
</body>

</html>