<!DOCTYPE html>
		<html>
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
				<title></title>
			</head>
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