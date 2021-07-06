<link rel="stylesheet" type="text/css" href="{$ROTA_STYLES}/campanha.css">
<div class="container">
    <h1>XXXX</h1>

    <div class="main">
        <div class="main-players">
            <h3>Players</h3>
            <h5>Atributos básicos</h5>
            <form onsubmit="return false;" id="form-content-player-AB">
                <input type="text" id='player-AB' name="nameAttribute">
                <input type="hidden" name="typeAttribute" value='player-AB' id="typeAttribute">
                <button><img src="{$ROTA_IMAGES}/add.svg" alt=""></button>
            </form>
            <div id="content-player-AB">
                <p>teste</p>
            </div>
            <h5>Atributos de inteligencia</h5>
            <form onsubmit="return false;" id="form-content-player-AI">
                <input type="text" id="player-AI" name="nameAttribute">
                <input type="hidden" name="typeAttribute" value='player-AI'>
                <button><img src="{$ROTA_IMAGES}/add.svg" alt=""></button>
            </form>
            <div id="content-player-AI">
                <p>teste</p>
            </div>
        </div>

        <div class="main-monsters">
            <h3>Monstros</h3>
            <h5>Atributos básicos</h5>
            <form onsubmit="return false;" id="form-content-monsters-AB">
                <input type="text" id="monsters-AB" name="nameAttribute">
                <input type="hidden" name="typeAttribute" value='monster-AB'>
                <button><img src="{$ROTA_IMAGES}/add.svg" alt=""></button>
            </form>
            <div id="content-monsters-AB">
                <p>teste</p>
            </div>
            <h5>Atributos de inteligencia</h5>
            <form onsubmit="return false;" id="form-content-monsters-AI">
                <input type="text" id="monsters-AI" name="nameAttribute">
                <input type="hidden" name="typeAttribute" value='monster-AI'>
                <button><img src="{$ROTA_IMAGES}/add.svg" alt=""></button>
            </form>
            <div id="content-monsters-AI">
                <p>teste</p>
            </div>
        </div>
    </div>
</div>
<script src="{$ROTA_SCRIPTS}/campaign.js"></script>
<input type="hidden" id="ROTA_IMAGES" value="{$ROTA_IMAGES}">
<input type="hidden" id="FR" value="{$FR}">