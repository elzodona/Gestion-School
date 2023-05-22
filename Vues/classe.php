<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des classes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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

    <div class="container py-4">
        <h1 class="text-center mb-4">Classes</h1>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Ajouter une
                        classe</button>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>id_classe</th>
                            <th>nom_classe</th>
                            <th>niveau</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($data as $classe):?>
                        <tr>
                            <td><?php echo $classe['id_classe']; ?></td>
                            <td><?php echo $classe['nom_classe']; ?></td>
                            <td><?php echo $classe['niveau']; ?></td>
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
                    <h5 class="modal-title" id="addModalLabel">Ajouter une classe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="http://localhost:4000/addClasse" method="post">
                        <div class="form-group">
                            <label for="nom_classe">Nom de la classe</label>
                            <input type="text" class="form-control" name="nom_classe" id="nom_classe" placeholder="nom de la classe">
                        </div>
                        <div class="form-group">
                            <label for="niveau">Niveau :</label>
                            <input type="number" class="form-control" name="niveau" id="niveau" placeholder="nom de la classe">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>