<div id="obscurite">
    <div class="titre" id="titre1">
        <h2>Pièce Numéro 1 : Le Cachot</h2>
    </div>
    <div class="indication" id="indication1" style="display:none;">
        <h2>Enigme 1 : Sortez de l'obscurité</h2>
    </div>
    <button id="interrupteur" style="display:none;"></button>
</div>

<div id="lumiere" style="display:none;">
    <div id="zoomBackground" style="display:none;"></div>
    <button id="verrou"></button>
    <div class="zoom" id="verrouZoom" style="display:none;">
        <form action="verrou.php" method="get">
            <h4>Verrou</h4>
            <br><br><br>
            <input type="number" name="int1" min="0" max="9">
            <input type="number" name="int2" min="0" max="9">
            <input type="number" name="int3" min="0" max="9">
            <input type="number" name="int4" min="0" max="9">
            <br><br><br>
            <button type="submit">Valider</button>
            <span id="message"></span>
        </form>
    </div>
</div>