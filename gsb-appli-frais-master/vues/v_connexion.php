      <h2>Identification utilisateur</h2>

      <form id="frmConnexion" method="POST" action="index.php?uc=connexion&action=valideConnexion">
         
         <div class="corpsForm">
            <p>
              <label for="login" accesskey="n">* Login : </label>
              <input type="text" id="login" name="login" maxlength="20" size="15" 
                      value="" title="Entrez votre login" />
            </p>
            <p>
              <label for="mdp" accesskey="m">* Mot de passe : </label>
              <input type="password" id="mdp" name="mdp" maxlength="8" size="15" 
                      value="" title="Entrez votre mot de passe"/>
            </p>
            </div>
            <div class="piedForm">
            <p>
              <input type="submit" id="ok" value="Valider" />
              <input type="reset" id="annuler" value="Effacer" />
            </p> 
            </div>
      </form>
