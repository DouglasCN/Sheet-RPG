let rotaApi = "http://192.168.100.13";

function keyEnter(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
        addAtribute(event.target.id)
    }
}

function loadingData() {
    dataMonstersAB()
    dataMonstersAI()
    dataAttack()
}

async function dataMonstersAB() {
    const fr = document.getElementById('FR').value;
    await fetch(rotaApi + '/RPG/api/monster/monster.php?GET=monster-AB&fr=' + fr)
        .then(response => response.json())
        .then(result => {
            var attribute = "";

            for (var i = 0; i < result.length; i++) {
                attribute += "<form>";
                attribute += "    <label for='attribute'>" + result[i].nomeAtributo + "</label>";
                attribute += "    <input type='number' name='attribute' id='attribute' value='" + result[i].valor + "'>";
                attribute += "</form>";
            }
            document.getElementById("attributeAB").innerHTML = attribute;
        })
        .catch(err => {
            // trata se alguma das promises falhar
            console.error('Failed retrieving information', err);
        });
}

async function dataMonstersAI() {
    const fr = document.getElementById('FR').value;
    await fetch(rotaApi + '/RPG/api/monster/monster.php?GET=monster-AI&fr=' + fr)
        .then(response => response.json())
        .then(result => {
            var attribute = "";

            for (var i = 0; i < result.length; i++) {
                attribute += "<form>";
                attribute += "    <label for='attribute'>" + result[i].nomeAtributo + "</label>";
                attribute += "    <input type='number' name='attribute' id='attribute' value='" + result[i].valor + "'>";
                attribute += "</form>";
            }
            document.getElementById("attributeAI").innerHTML = attribute;
        })
        .catch(err => {
            // trata se alguma das promises falhar
            console.error('Failed retrieving information', err);
        });
}

async function dataAttack() {
    const fr = document.getElementById('FR').value;
    await fetch(rotaApi + '/RPG/api/monster/attack.php?GET=' + fr)
        .then(response => response.json())
        .then(result => {
            var attack = "";

            for (var i = 0; i < result.length; i++) {
                attack += "<form>";
                attack += "    <label for='nameAttack'>Nome do ataque</label>";
                attack += "    <input type='text' name='nameAttack' id='nameAttack' value='" + result[i].ataque + "'>";
                attack += "    <label for='detailAttack'>Detalhe do ataque</label>";
                attack += "    <textarea name='detailAttack' id='detailAttack' rows='3'>" + result[i].detalhe + "</textarea>";
                attack += "    <div class='dice'>";
                attack += "        <div class='content-dice'>";
                attack += "             <label for='QTDDice'>QTD dados</label>";
                attack += "            <input type='number' name='QTDDice' id='QTDDice' value='" + result[i].quantidadeDados + "'>";
                attack += "        </div>";
                attack += "        <div class='content-dice'>";
                attack += "            <label for='VlrDice'>Vlw dado</label>";
                attack += "             <input type='number' name='VlrDice' id='VlrDice' value='" + result[i].valorDado + "'>";
                attack += "         </div>";
                attack += "    </div>";
                attack += "</form>";
            }
            document.getElementById("attack").innerHTML = attack;
        })
        .catch(err => {
            // trata se alguma das promises falhar
            console.error('Failed retrieving information', err);
        });
}

async function dataMonster() {
    const fr = document.getElementById('FR').value;
    await fetch(rotaApi + '/RPG/api/monster/monster.php?MONSTRO=' + fr)
        .then(response => response.json())
        .then(result => {

            document.getElementById("nameMonster").innerHTML = result[0].nome;
            document.getElementById("description").innerHTML = result[0].descricao;
        })
        .catch(err => {
            // trata se alguma das promises falhar
            console.error('Failed retrieving information', err);
        });
}

async function addAttack() {

    var formData = new FormData(document.getElementById("newAttack"));
    formData.append('fr', document.getElementById("FR").value);

    await fetch(rotaApi + '/RPG/api/monster/attack.php', {
        method: 'POST',
        body: formData
    })
        .then(response => {
            document.getElementById('modal').checked = false;
            document.getElementById("newAttack").reset();
            loadingData();
        })
        .catch(err => {
            // trata se alguma das promises falhar
            console.error('Failed retrieving information', err);
        });
}

async function deleteAttack(id) {
    var formData = new FormData();
    formData.append('method', 'delete');
    formData.append('id', id);

    if (window.confirm('Tem certeza que deseja excluir está campanha?')) {
        await fetch(rotaApi + '/RPG/api/monster/monster.php', {
            method: 'POST',
            body: formData
        })
            .then(response => {
                loadingData();

            })
            .catch(err => {
                // trata se alguma das promises falhar
                console.error('Failed retrieving information', err);
            });
    }
}

dataMonster()
loadingData()