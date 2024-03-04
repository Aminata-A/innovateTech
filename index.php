<?php
include "connexion.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='style.css'>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title></title>
</head>

<body>
  <div>
    <header>
        
            <img src="images/logo.png" alt="logo" width="80px">

            <ul>
              <li><a href="#">Quisommenous?</a></li>
              <li><a href="#">blog</a></li>
              <li><a href="#">+d'info</a></li>
              <li><a href="#">Contact</a></li>

            </ul>

            <a href="login.php"  class="deconnexion">Deconnexion</a>
        
    </header>
    <h1>Bienvenue dans notre boîte à idées !</h1>
    <h2>Dans cet espace d'innovation, chaque idée compte ! Partagez la vôtre avec nous.</h2>
    <div class="total-card">
    <div class="cards">
      <article class="card">
        <img src="images/atelier.png" alt="categorie">
        <div class="content">
          <p>Les ateliers peuvent seulement durer une ou deux heures ou s'étendre sur des semaines en fonction du sujet. Ceux qui sont chargés d'animer l'atelier peuvent renforcer l'efficacité de leurs présentations à travers une bonne planification, l'organisation, et par un bon exercice sur la présentation.</p>
        </div>

      </article>

      <article class="card">
        <img src="images/briefs.png" alt="categorie">
        <div class="content">
          <p>Le brief, que l’on appelle aussi cahier des charges, constitue la base de votre étude. Que vous réalisiez vous-même le travail ou que vous le sous-traitiez, il va vous servir de document de référence.</p>
        </div>
      </article>

      <article class="card">
        <img src="images/dev.png" alt="categorie">
        <div class="content">
          <p>Le développement web et le développement mobile sont des domaines 
            passionnants qui vous permettent de créer des applications et des sites Web.</p>
        </div>
      </article>
      <article class="card">
        <img src="images/travauxdirige.png" alt="categorie">
        <div class="content">
          <p> Les travaux dirigés permettent d'appliquer les connaissances apprises pendant les cours théoriques ou d'introduire des notions nouvelles. 
            Les élèves ou étudiants travaillent individuellement sur des exercices d'application ou de découverte, 
            en présence du professeur, qui intervient pour aider. </p>
        </div>

      </article>
      </div>
    </div>
  <h2>Vous avez de nouvelles idées veiller nous en faire part ici.</h2>
  <div class="container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <a href="add-new.php" class="btn btn-dark mb-3">Partager mon idée</a>
    <div class="table-responsive">
    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">idees</th>
          <th scope="col">Descriptions</th>
          <th scope="col">Categorie</th>
          <th scope="col">utilisateur</th>
          <th scope="col">edit/delete</th>

        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `idees`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["id_idee"] ?></td>
            <td><?php echo $row["titre"] ?></td>
            <td class="ellipsis-text"><?php echo $row["descriptions"] ?></td>
            <td class="ellipsis-text"><?php echo $row["categorie"] ?></td>
            <td><?php echo $row["id_utilisateur"] ?></td>
            <td>
              <a href="edit.php?id_idee=<?php echo $row["id_idee"] ?>&titre=<?php echo $row["titre"]?>&descriptions=<?php echo $row["descriptions"]?>&categorie=<?php echo $row["categorie"]?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="delete.php?id_idee=<?php echo $row["id_idee"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
      </div>
  </div>


  

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
