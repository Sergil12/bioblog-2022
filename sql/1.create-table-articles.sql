CREATE TABLE articles ( -- créé une table
      ID INT AUTO_INCREMENT PRIMARY KEY,
      Title VARCHAR(50), -- CHAR TOUJOURS LE NOMBRE QUI EST INDIQUER ET VARCHAR CA VA ETRE DE 0 __> AU NOMBRE DE CARACTERE DEFINIS
      Content VARCHAR(1000),
      Creation_date DATETIME
) 

-- On va dans php my admin crée une nouvelle base de donner puis on va dans privilege ajouter l'utilisateur que on a mit dans le fichier db on crée une nouvelle table puis on met un articles