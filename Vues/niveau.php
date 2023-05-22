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
        <h1 class="text-center mb-4">Niveaux d'études</h1>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-center m-3">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Enseignement secondaire supérieur</button>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>id_niveau</th>
                            <th>nom_niveau</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($data as $niveau):?>
                        <tr>
                            <td><?php echo $niveau['id_niveau']; ?></td>
                            <td><?php echo $niveau['nom_niveau']; ?></td>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>