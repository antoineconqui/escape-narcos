<!-- Il s'agit du script de l'escape-game n°1 -->

<div id="dark"> <!-- Cadre initialement affiché en début de partie -->
    <div class="titre" id="titre1"> <!-- Titre de la pièce -->
        <h2>Pièce Numéro 1 : Le Cachot</h2>
    </div>
    <div class="indication" id="indication1" style="display:none;"> <!-- Indication pour l'énigme n°1 -->
        <h2>Enigme 1 : Sortez de l'obscurité</h2>
    </div>
    <button id="switch" style="display:none;"></button> <!-- Interrupteur clickable (caché) pour allumer la lumière et avancer dans la partie  -->
</div>

<div id="light" style="display:none;"> <!-- Cadre initialement caché en début de partie et affiché par click sur l'interrupteur -->
    <div id="zoomBackground" style="display:none;"></div> <!-- Fond flou esthétique -->
    <button id="locker"></button> <!-- Cadre clickable de verrou -->
    <div class="zoom" id="lockerZoom" style="display:none;"> <!-- Cadre de zoom vers le verrou -->
        <form method="post"> <!-- Formulaire du code du verrou -->
            <h4>Verrou</h4>
            <br><br><br>
            <input type="number" id="int1" min="0" max="9">
            <input type="number" id="int2" min="0" max="9">
            <input type="number" id="int3" min="0" max="9">
            <input type="number" id="int4" min="0" max="9">
            <br><br><br>
            <button type="button" id="button-verrou">Valider</button>
            <span id="message"></span>
        </form>
    </div>
</div>