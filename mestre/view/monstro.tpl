<link rel="stylesheet" type="text/css" href="{$ROTA_STYLES}/monstro.css">
<div class="container">
    <h1 id="nameMonster"></h1>

    <form>
        <label for="description">Descrição</label>
        <textarea name="description" id="description" rows="4" class="description"></textarea>
    </form>

    <div class="attributes">
        <div class="attributeAB">
            <h2>Atributo(s) básico(s)</h2>
            <div class="content" id="attributeAB">
            </div>
        </div>

        <div class="attributeAI">
            <h2>Atributo(s) inteligência</h2>
            <div class="content" id="attributeAI">
            </div>
        </div>
    </div>

    <div class="attack">
        <h2>Ataque(s) <label for="modal"><img src="{$ROTA_IMAGES}/add.svg" alt=""></label></h2>
        <div class="content" id="attack">
        </div>
    </div>
</div>

<!-- Modal new Attack -->
<input type="checkbox" id="modal" />
<div class="modal">
    <div class="modal-content">
        <div class="modal-container">
            <div class="header">
                <h2>Criando ataque</h2>
            </div>
            <div class="main">
                <form id="newAttack">
                    <label for="nameAttack">Nome do ataque</label>
                    <input type="text" name="nameAttack" id="nameAttack">
                    <label for="detailAttack">Detalhe do ataque</label>
                    <textarea name="detailAttack" id="detailAttack" rows="3"></textarea>
                    <div class="dice">
                        <div class="content-dice">
                            <label for="QTDDice">QTD dados</label>
                            <input type="number" name="QTDDice" id="QTDDice">
                        </div>
                        <div class="content-dice">
                            <label for="VlrDice">Vlw dado</label>
                            <input type="number" name="VlrDice" id="VlrDice">
                        </div>
                    </div>
                </form>
            </div>
            <div class="footer">
                <label for="modal" class="button-quit">Desistir</label>
                <button class="button-save" onclick="addAttack()">Salvar</button>
            </div>
        </div>
    </div>
    <label class="modal-close" for="modal"></label>
</div>
<input type="hidden" id="ROTA_IMAGES" value="{$ROTA_IMAGES}">
<input type="hidden" id="FR" value="{$FR}">
<script src="{$ROTA_SCRIPTS}/monster.js"></script>