<link rel="stylesheet" type="text/css" href="{$ROTA_STYLES}/personagens.css">
<div class="container">
    <h1>Personagens</h1>

    <div class="button-newPlayer">
        <label for="modal">Novo Personagem</label>
    </div>
    <div class="table-Player">
        <table>
            <thead>
                <tr>
                    <td width="30%">Jogador</td>
                    <td width="30%">Nome</td>
                    <td width="30%">Campanha</td>
                    <td width="10%" style='text-align: center'>Opções</td>
                </tr>
            </thead>
            <tbody id='data'>
                <tr>
                    <td></td>
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
<!-- Modal new player -->
<input type="checkbox" id="modal" />
<div class="modal">
    <div class="modal-content">
        <div class="modal-container">
            <div class="header">
                <h2>Criando Personagem</h2>
            </div>
            <div class="main">
                <form id="newPlayer">
                    <label for="player">Jogador</label>
                    <input type="text" id='player' name='player'>
                    <label for="name">Nome</label>
                    <input type="text" id='name' name='name'>
                    <label for="campaign">Campanha</label>
                    <select name="campaign" id="campaign">
                        {foreach from=$CAMPANHAS item=C}
                        <option value="{$C.id_Campanha}">{$C.titulo}</option>
                        {/foreach}
                    </select>
                    <div class="ativo">
                        <input type="checkbox" name="ativo" id="ativo">
                        <label for="ativo">Ativo</label>
                    </div>
                </form>
            </div>
            <div class="footer">
                <label for="modal" class="button-quit">Desistir</label>
                <button class="button-save" onclick="newPlayer()">Salvar</button>
            </div>
        </div>
    </div>
    <label class="modal-close" for="modal"></label>
</div>
<script src="{$ROTA_SCRIPTS}/players.js"></script>
<input type="hidden" id="ROTA_IMAGES" value="{$ROTA_IMAGES}"> 