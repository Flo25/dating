<!DOCTYPE html>
<html>
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="/dating/src/css/style.css" />
        <title>Insta Dating</title>
    </head>
    
    <header>
            <h1>Insta Dating</h1>    
            <img class="logo" src="/dating/src/img/tn_logo.jpg" alt="logo" />
    </header>      
    
    <body>
			
        <form method="POST" action="#">
            <label>Email :</label><input type="text" name="email" /> <br/>
            <label>Mot de passe :</label><input type="text" name="mdp" /><br/>
            <label>Pseudo :</label><input type="text" name="pseudo" /><br/>
            <label>Date :</label><input type="text" name="dateNaissance" /><br/>
            <label>Vous êtes ?</label><select name="sexe">
            <option selected="selected" value="F">Une femme</option>
            <option value="H">Un homme</option> 
            </select><br/>
	
            <input type="submit" value="Valider" />
	</form>

    </body>
    
</html>