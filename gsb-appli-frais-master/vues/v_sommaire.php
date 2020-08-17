<?php
    if ( estConnecte() ) {
?>
    <!-- Division pour le sommaire -->
    <div id="menuGauche">
      <div id="infosUtil">
        <h2>
				<?php echo $_SESSION['prenom']."  ".$_SESSION['nom']  ?>   
        </h2>
        <h3>Visiteur médical</h3>
      </div>  
        <ul id="menuList">
           <li class="smenu">
              <a href="index.php?uc=gererFrais&amp;action=saisirFrais" title="Saisie fiche de frais ">Saisie fiche de frais</a>
           </li>
           <li class="smenu">
              <a href="index.php?uc=etatFrais&amp;action=selectionnerMois" title="Consultation de mes fiches de frais">Mes fiches de frais</a>
           </li>
 	         <li class="smenu">
              <a href="index.php?uc=connexion&amp;action=deconnexion" title="Se déconnecter">Déconnexion</a>
           </li>
         </ul>        
    </div>
<?php
    }
?>    
    