CREATE TABLE users ( -- créé une table Exercies 05/05 partie 1) --ID INT AUTO_INCREMENT, on utilise le users comme ID on mettant PRIMARY KEY comme ca il est unique 
      Nom VARCHAR(50) ,
      Prenom VARCHAR(50),
      User VARCHAR(50) PRIMARY KEY, 
      Pass  VARCHAR(100),
      Creation_date DATETIME,
      Delete_date DATETIME
) 