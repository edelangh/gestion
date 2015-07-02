
=== Serveur mere ===

lieux
id name 

type
id type couleur

Besoin
id id_lieux date text id_type

=== Serveur fille ===

User
id pseudo hash_pass

Produits
id name img_src prix_achat prix_vente nbr id_categorie scancode nbr_limit

Categories
id name img_src

Ticket
id list_des_produit(JSON) prix_total date id_user

[
  { name : "bierre", nb: 45, prix_unitaire: 2.4 , date:1548972247},
]
