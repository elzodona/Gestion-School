<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiants</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
    .table-bordered th,
    .table-bordered td {
    border: 3px solid;
}

.table-cols {
    margin-top: 2rem;
    margin-left: 5rem;
    width: 950px;
    height: 550px;
}
h1{
    margin: 2rem;
}
.filter-container {
    margin-top: 5rem;
    margin-left: 1rem;
}

.filter-container select {
    margin-right: 0.5rem;
}

</style>

</head>

<body>

 <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <img src="http://localhost:4000/images.png" alt="logo" width="120px" height="80px">
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" style="font-weight: bold; font-size: 1.5rem; margin-right: 10rem; color: white" href="#" role="button">ACCUEIL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="font-weight: bold; font-size: 1.5rem; margin-right: 4rem; color: #ffffff" href="/annee" target="content">Années Scolaires</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="font-weight: bold; font-size: 1.5rem; margin-right: 4rem; color: #ffffff" href="/niveau" target="content">Niveaux d'Etudes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="font-weight: bold; font-size: 1.5rem; margin-right: 4rem; color: #ffffff" href="/classe" target="content">Classes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="font-weight: bold; font-size: 1.5rem; margin-right: 4rem; color: #ffffff" href="/eleve" target="content">Élèves</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="font-weight: bold; font-size: 1.5rem; margin-right: -10rem; color: white" href="#"
                        role="button">Deconnexion</a>
                </li>
            </ul>
        </div>
    </nav>


<div class="container">

<div class="filter-container">

<label for="filter-class">Classe :</label>
<select id="filter-class">
    <option value="">Toutes les classes</option>
    <option value="2nd S">2ndS</option>
    <option value="3e">3e</option>
    <option value="2nd L">2ndSTEG</option>
    <option value="CM2 A">TleS1</option>

</select>

<button class="btn btn-primary" id="btn-filter">Filtrer</button>
</div>

<div class="container py-4">
    
<h1 class="text-center mb-4">Listes des élèves</h1>

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end mb-3">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Ajouter un élève</button>
            </div>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>nom</th>
                        <th>prenom</th>
                        <th>numero</th>
                        <th>type_eleve</th>
                        <th>classe</th>
                        <th>actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($data as $eleve):?>
                        <tr>
                            <td><?php echo $eleve['nom_eleve']; ?></td>
                            <td><?php echo $eleve['prenom_eleve']; ?></td>
                            <td><?php echo $eleve['numero_eleve']; ?></td>
                            <td><?php echo $eleve['type_eleve']; ?></td>
                            <td><?php echo $eleve['id_classe']; ?></td>
                            <td>
                                <button>modifier</button>
                                <button>supprimer</button>
                            </td>
                        </tr>
                    <?php endforeach ?>

                    </tbody>
                </table>
        </div>
    </div>

</div>


<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Ajouter un élève</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">

            <form action="http://localhost:4000/addEleve" method="post">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
                </div>
                <div class="form-group">
                    <label for="num">Numéro</label>
                    <input type="int" class="form-control" id="num" name="num" placeholder="numéro">
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select class="form-control" name="typeE" id="type">
                                <option value="">Sélectionner un etat</option>
                                <option value="1">interne</option>
                                <option value="0">externe</option>
                    </select>
                    <!-- <input type="text" class="form-control" id="type" name="typeE" placeholder="typeEleve"> -->
                </div>
                <div class="form-group">
                    <label for="classe">Classe</label>
                    <input type="int" class="form-control" id="classe" name="classe" placeholder="Classe">
                </div>
                <div class="modal-footer">
                <button type="submit" id="btn-ajouter" class="btn btn-primary">Ajouter</button>
            </div>
            </form>

            </div>
            
        </div>
    </div>
</div>

</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>

</script>

</body>

</html>

