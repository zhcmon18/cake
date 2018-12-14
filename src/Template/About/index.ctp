<div style="padding-left: 20px;">
    <h2>Car service center</h2>
    <h5>Pavel Zaharciuc</h5>
    <h5>420-5b7 MO Applications internet</h5>
    <h5>Automne 2018, Collège Montmorency</h5>
    <br>

    <h5><a href="#cibles">Les cibles et les objectifs</a></h5>

    <h5><a href="https://github.com/zhcmon18/car_service_center.git">Le répertoire GitHub</a></h5>

    <h5><a href="#bdActuelle">La base de données</a></h5>

    <h5><a href="#apropos">Fonctionnement général</a></h5>

    <h5><a href="#jwt">Fonctionnement du démarrage de session et du changement de mot de passe</a></h5>

    <h5><a href="#listes">La procédure pour tester le fonctionnement de l'interface AngularJS des listes liées et du modèle "CRUD" monopage</a></h5>

    <h5><a href="#glisser">Le fonctionnement du cliquer-glisser pour ajouter une image à l'application</a></h5>

    <h5><?= $this->Html->link('Les tests unitaires ont été effectués sur le contrôleur et le modèle Clients', ['controller' => 'Coverage', 'action' => 'index.html'])?></h5>
    <br>

    <h5>Résumé:</h5>

    <hr>
    <div style="max-width: 1100px; text-align: justify;">
        <p id="cibles">
            Le but du prototype est d’offrir à l’utilisateur un environnement intuitif et facile à naviguer pour enregistrer
            et gérer les réservations des services de réparations automobiles pour des clients. L’objectif est de présenter
            toute l’information nécessaire du chaque aspect de l’enregistrement, sans l’information redondante, afin que
            l’utilisateur puisse le gérer facilement.
        </p>
        <hr>

        <div id="apropos">
            <p style="margin-top: 20px;">
                Les enregistrements peuvent être effectués seulement
                par les utilisateurs avec les droits nécessaires. Sans une session ouverte, seulement les dates prises seront affichées.
                Les utilisateurs supervisors peuvent voir et modifier (sauf les réservations qui n’appartiennent pas à eux) tous les enregistrements.
                Seul l’utilisateur admin peut enregistrer un nouvel utilisateur et supprimer les enregistrements. Tous les utilisateurs doivent activer
                leurs comptes via un lien envoyé sur les courriels lors de la création.
                Sinon, seulement l'affichage de données est disponible.
            </p>

            <p>
                Premièrement, il faut créer un client. Les voitures et les réservations se font à partir du client particulier. Le client doit avoir au
                moins une voiture pour qu’il puisse avoir une réservation.
                Les enregistrements des voitures peuvent avoir des images associées. De même, les réservations peuvent avoir plusieurs étiquettes.
            </p>

            <p>
                Le site offre trois langues : français, anglais et russe. Les données traduites sont la description de la réservation et les étiquettes.
            </p>

            <p>
                Le site offre une vue spéciale pour les utilisateurs administrateurs.
            </p>

            <p>
                Les listes liées, l’auto-complétion et la production des documents pdf sont offertes pour les Clients (page d'accueil des clients,
                ajouter un client et afficher un client).
            </p>
        </div>
        <hr>

        <p id="jwt">
            La monopage Subscriptions utilise la librairie  AngularJS et offre un démarrage de session avec un jeton JWT. Avant que l’utilisateur puisse
            se connecter, la forme vérifie, grâce à Google Captcha,
            que ce n’est pas un robot. Après le démarrage de la session, l’utilisateur peut changer son mot de passe en cliquant sur « Logout or Change password ».
        </p>
        <hr>

        <p id="listes">
            Les listes liées AngularJS sont offert pour la page « Nouveau Client » sous la forme « Abonnements-Promotions ».
            La mono-page AngularJS Subscriptions affiche tous les enregistrements par défaut, cependant, les actions ajouter, modifier et
            supprimer nécessitent une session démarrée.
        </p>
        <hr>

        <p id="glisser">
            La fonctionnalité cliquer-glisser est offerte pour la page « Photos ». Pour ajouter une photo, il faut cliquer sur la
            région « Drop files here to upload »,   ou glisser et déposer un fichier dans la même région. L’action supprimer affecte aussi le disque physique.
        </p>
        <hr>

        <h5 id="bdActuelle">La base de données actuelle:</h5>
        <?= $this->Html->image('bd_actuelle.jpg', ['alt' => 'BD actuelle']); ?>
        <h5><a href="http://www.databaseanswers.org/data_models/car_svc_center/index.htm">La base de données originale:</a></h5>
        <?= $this->Html->image('car_svc_center.gif', ['alt' => 'BD actuelle']); ?>
    </div>
</div>
