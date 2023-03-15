<header class="p-10 pb-20">
    <nav class="flex justify-between w-full px-10" >
        <div><h2 class="text-2xl">logo</h2></div>
        <ul class="flex gap-8">
            <li><a href="evenements.php" >Evénements</a></li>
            <li><a href="contacter.php">Nous contacter</a></li>
            <li><a href="aPropos">À propos</a></li>
        </ul>
        
        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="flex w-10 h-10 overflow-hidden bg-withe rounded-full border border-blue-500">
            <svg class=" w-12 h-12 text-blue-700 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
        </button>
        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <h2 class="text-white m-2"><?php echo $_SESSION['Nom'] . ' ' . $_SESSION['Prenom'] ?></h2>
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Gerer le profil</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mes évenements</a>
                </li>
                <?php
                    if (isset($_SESSION['IdUtilisateur']) && $_SESSION['Role'] === 'admin') {
                    echo '  <li>
                                <a href="admin.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Admin</a>
                            </li>';
                    }
                ?>
                <li>
                    <a href="logOut.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Déconnexion</a>
                </li>
            </ul>
        </div>

    </nav>
</header> 

