<link rel="stylesheet" type="text/css" href="{$ROTA_STYLES}/monstros.css">
<div class="container">
    <h1>Monstros</h1>

    <div class="button-newMonster">
        <label for="modal">Novo monstro</label>
    </div>
    <div class="table-Monster">
        <table>
            <thead>
                <tr>
                    <td width="45%">Nome</td>
                    <td width="45%">Campanha</td>
                    <td width="10%">Opções</td>
                </tr>
            </thead>
            <tbody id='data'>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="options">
                            <a href="">
                                <img src="{$ROTA_IMAGES}/edit.svg" alt="">
                            </a>
                            <button>
                                <img src="{$ROTA_IMAGES}/trash.svg" alt="">
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal new Monster -->
<input type="checkbox" id="modal" />
<div class="modal">
    <div class="modal-content">
        <div class="modal-container">
            <div class="header">
                <h2>Criando novo monstro...</h2>
            </div>
            <div class="main">
                <form id="newMonster">
                    <label for="monster">Nome</label>
                    <input type="text" id='monster' name='monster'>
                    <label for="campaign">Campanha</label>
                    <select name="campaign" id="campaign">
                        {foreach from=$CAMPANHAS item=C}
                        <option value="{$C.id_Campanha}">{$C.titulo}</option>
                        {/foreach}
                    </select>
                </form>
            </div>
            <div class="footer">
                <label for="modal" class="button-quit">Desistir</label>
                <button class="button-save" onclick="newMonster()">Salvar</button>
            </div>
        </div>
    </div>
    <label class="modal-close" for="modal"></label>
</div>
<script src="{$ROTA_SCRIPTS}/monsters.js"></script>
<input type="hidden" id="ROTA_IMAGES" value="{$ROTA_IMAGES}"> 
<input type="hidden" id="ROTA_MONSTRO" value="{$ROTA_MONSTRO}">