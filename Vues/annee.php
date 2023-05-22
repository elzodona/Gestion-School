<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Années scolaires</title>
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
        <h1 class="text-center mb-4">Années scolaires</h1>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Ajouter une année
                        scolaire</button>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>id_annee_scolaire</th>
                            <th>annee_scolaire</th>
                            <th>active</th>
                        </tr>
                    </thead>
                    <tbody>
                              
                    <?php foreach ($data as $annee):?>
                        <tr>
                            <td><?php echo $annee['id_annee_scolaire']; ?></td>
                            <td><?php echo $annee['annee_scolaire']; ?></td>
                            <td><?php echo $annee['actif']; ?></td>
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
                    <h5 class="modal-title" id="addModalLabel">Ajouter une année scolaire</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="http://localhost:4000/add" method="POST">
                        <div class="form-group">
                            <label for="annee">Année scolaire</label>
                            <input type="text" class="form-control" name="annee" placeholder="Année scolaire">
                        </div>
                        <div class="form-group">
                            <label for="type">Etat</label>
                            <select class="form-control" name="etat" id="type">
                                <option value="">Sélectionner un etat</option>
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
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