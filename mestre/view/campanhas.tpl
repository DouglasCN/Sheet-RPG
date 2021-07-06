<link rel="stylesheet" type="text/css" href="{$ROTA_STYLES}/campanhas.css">
<div class="container">
    <h1>Campanhas</h1>

    <div class="button-newCampaign">
        <label for="modal">Nova campanha</label>
    </div>
    <div class="table-Campaigns">
        <table>
            <thead>
                <tr>
                    <td width="45%">Título</td>
                    <td width="45%">Mestre</td>
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
<!-- Modal new campaign -->
<input type="checkbox" id="modal" />
<div class="modal">
    <div class="modal-content">
        <div class="modal-container">
            <div class="header">
                <h2>Criando uma nova campanha...</h2>
            </div>
            <div class="main">
                <form id="newCampaign">
                    <label for="title">Titílo</label>
                    <input type="text" id='title' name='title'>
                    <label for="master">Mestre</label>
                    <input type="text" id='master' name='master'>
                </form>
            </div>
            <div class="footer">
                <label for="modal" class="button-quit">Desistir</label>
                <button class="button-save" onclick="newCampaign()">Salvar</button>
            </div>
        </div>
    </div>
    <label class="modal-close" for="modal"></label>
</div>
<script src="{$ROTA_SCRIPTS}/campaigns.js"></script>
<input type="hidden" id="ROTA_IMAGES" value="{$ROTA_IMAGES}">
<input type="hidden" id="ROTA_CAMPANHA" value="{$ROTA_CAMPANHA}">