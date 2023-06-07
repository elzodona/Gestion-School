
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
   
    <img src="http://localhost:4000/images.png" alt="logo" width="120px" height="80px">
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" style="font-weight: bold; font-size: 1.5rem; margin-right: 10rem; color: white" href="/accueil" role="button">ACCUEIL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="font-weight: bold; font-size: 1.5rem; margin-right: 4rem; color: #ffffff" href="/annee">Années Scolaires</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="font-weight: bold; font-size: 1.5rem; margin-right: 4rem; color: #ffffff" href="/niveau">Niveaux d'Etudes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="font-weight: bold; font-size: 1.5rem; margin-right: 4rem; color: black" href="/annee"><?php echo $data['annee']['annee_scolaire']; ?></a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" style="font-weight: bold; font-size: 1.5rem; margin-right: 4rem; color: #ffffff" href="/classe">Classes</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" style="font-weight: bold; font-size: 1.5rem; margin-right: 4rem; color: #ffffff" href="/listeEleves">Élèves</a>
            </li>
           <li class="nav-item">
                <a class="nav-link" style="font-weight: bold; font-size: 1.5rem; margin-right: 4rem; color: #ffffff" href="/discipline/gestion">Gestion Discipline</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="font-weight: bold; font-size: 1.5rem; margin-right: 4rem; color: #ffffff" href="/log">Deconnexion</a>
            </li>
        </ul>
    </div>
</nav>

