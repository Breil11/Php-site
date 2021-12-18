<?php
include('usr.php');

   if(isset($_GET['admin']) AND !empty($_GET['admin'])) {
      $admin = (int) $_GET['admin'];
      $req = $usr->prepare('UPDATE utilisateur SET is_admin = 1 WHERE id = ?');
      $req->execute(array($admin));
   }
   if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
      $supprime = (int) $_GET['supprime'];
      $req = $usr->prepare('DELETE FROM utilisateur WHERE id = ?');
      $req->execute(array($supprime));
   }
 
$users = $usr->query('SELECT * FROM utilisateur ORDER BY id DESC LIMIT 5');
$commentaires = $usr->query('SELECT * FROM utilisateur ORDER BY id DESC LIMIT 5');
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8" />
   <title>Admin liste users récents</title>
</head>
<body>
   <h2 style="text-align:center;">Liste des users récemment inscrits</h2>
   <ul>
      <?php while($user = $users->fetch()) { ?>
      <li><?= $user['id'] ?> : <?= $user['nom'] ?><?php if($user['is_admin'] == 0) { ?> - <a href="admin2.php?admin=<?= $user['id'] ?>">Ajouter comme admin</a><?php } ?> - <a href="admin2.php?supprime=<?= $user['id'] ?>">Supprimer</a></li>
      <?php } ?>
   </ul>
</body>
</html>