CREATE TABLE clients (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nom varchar(255) COLLATE utf8_bin NOT NULL,
  prenom varchar(255) COLLATE utf8_bin NOT NULL,
  email varchar(255) COLLATE utf8_bin NOT NULL,
  password varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE commandes (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  id_client int(11) NOT NULL,
  id_produit int(11) NOT NULL,
  quantite int(11) NOT NULL,
  date date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE produits (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nom varchar(255) COLLATE utf8_bin NOT NULL,
  description varchar(255) COLLATE utf8_bin NOT NULL,
  lien_image varchar(255) COLLATE utf8_bin NOT NULL,
  prix decimal(10,2) NOT NULL,
  tva decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

ALTER TABLE commandes
  ADD KEY fk_idClient (id_client),
  ADD KEY fk_idProduit (id_produit),
  ADD CONSTRAINT fk_idClient FOREIGN KEY (id_client) REFERENCES `clients` (id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT fk_idProduit FOREIGN KEY (id_produit) REFERENCES produits (id) ON DELETE CASCADE ON UPDATE CASCADE;