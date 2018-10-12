<div style="padding-left: 20px;">
    <h3>Car service center</h3>
    <h4>Pavel Zaharciuc</h4>
    <h4>420-5b7 MO Applications internet</h4>
    <h4>Automne 2018, Collège Montmorency</h4>
    <p>
        Le site permet d’enregistrer des services de réparations automobiles pour des clients.  Les enregistrements peuvent être effectués seulement par les utilisateurs avec les droits nécessaires. <br> 
        Sans une session ouverte, seulement les dates prises seront affichées. Les utilisateurs supervisors peuvent voir et modifier (sauf les réservations qui n’appartiennent pas à eux) tous les enregistrements. <br> 
        Seul l’utilisateur admin peut enregistrer un nouvel utilisateur et supprimer les enregistrements. Tous les utilisateurs doivent activer leurs comptes via un lien envoyé sur les courriels lors de la création. <br>
        Sinon, seulement l'affichage de données est disponible.
    </p>
    <p>
        Premièrement, il faut créer un client. Les voitures et les réservations se font à partir du client particulier. Le client doit avoir au moins une voiture pour qu’il puisse avoir une réservation. <br>
        Les enregistrements des voitures peuvent avoir des images associées. De même, les réservations peuvent avoir plusieurs étiquettes.
    </p>
    <p>
        Le site offre trois langues : français, anglais et russe. Les données traduites sont la description de la réservation et les étiquettes. 
    </p>
    <h4>La base de données actuelle:</h4>
    <?= $this->Html->image('bd_actuelle.jpg', ['alt' => 'BD actuelle']); ?>
    <h4><a href="http://www.databaseanswers.org/data_models/car_svc_center/index.htm">La base de données originale:</a></h4>
    <?= $this->Html->image('car_svc_center.gif', ['alt' => 'BD actuelle']); ?>
</div>
