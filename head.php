<?php echo Theme::metaTags('title'); ?>
<?php echo Theme::metaTags('description'); ?>
<?php echo Theme::favicon('assets/img/favicon.png'); ?>
<link href="https://fonts.googleapis.com" rel="preconnect">
<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
<?php
echo Theme::css('assets/vendor/bootstrap/css/bootstrap.min.css');
echo Theme::css('assets/vendor/bootstrap-icons/bootstrap-icons.css');
echo Theme::css('assets/vendor/glightbox/css/glightbox.min.css');
echo Theme::css('assets/vendor/swiper/swiper-bundle.min.css');
echo Theme::css('assets/vendor/aos/aos.css');
echo Theme::css('assets/css/main.css');
Theme::plugins('siteHead');
?>
<!-- Script pour la table des matières dynamique -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Fonction pour générer la table des matières
    function genererTableMatieres() {
        // Sélectionner le contenu principal où se trouvent les titres h2
        const contenu = document.querySelector('.content');
        if (!contenu) return;
        
        // Sélectionner tous les titres h2 dans le contenu
        const titres = contenu.querySelectorAll('h2');
        if (titres.length === 0) return;
        
        // Créer le conteneur de la table des matières
        const tableContainer = document.getElementById('table-matieres');
        if (!tableContainer) return;
        
        // Créer le titre de la table des matières
        const titreTOC = document.createElement('h3');
        titreTOC.textContent = 'Table des matières';
        titreTOC.className = 'toc-title';
        tableContainer.appendChild(titreTOC);
        
        // Créer la liste des liens
        const liste = document.createElement('ul');
        liste.className = 'toc-list';
        
        // Pour chaque titre h2, créer un élément de liste avec un lien
        titres.forEach((titre, index) => {
            // Ajouter un ID au titre s'il n'en a pas
            if (!titre.id) {
                titre.id = 'section-' + index;
            }
            
            // Créer un élément de liste pour ce titre
            const item = document.createElement('li');
            
            // Créer un lien vers le titre
            const lien = document.createElement('a');
            lien.href = '#' + titre.id;
            lien.textContent = titre.textContent;
            lien.className = 'toc-link';
            
            // Ajouter le lien à l'élément de liste
            item.appendChild(lien);
            
            // Ajouter l'élément de liste à la liste
            liste.appendChild(item);
        });
        
        // Ajouter la liste au conteneur de la table des matières
        tableContainer.appendChild(liste);
        
        // Rendre le conteneur visible
        tableContainer.style.display = 'block';
    }
    
    // Exécuter la fonction une fois que la page est chargée
    genererTableMatieres();
    
    // Activer/désactiver la classe active sur les liens lors du défilement
    window.addEventListener('scroll', function() {
        const titres = document.querySelectorAll('h2');
        const liens = document.querySelectorAll('.toc-link');
        
        let indexActif = -1;
        
        // Déterminer quelle section est actuellement visible
        titres.forEach((titre, index) => {
            const rect = titre.getBoundingClientRect();
            if (rect.top <= 100) {
                indexActif = index;
            }
        });
        
        // Mettre à jour la classe active sur les liens
        liens.forEach((lien, index) => {
            if (index === indexActif) {
                lien.classList.add('active');
            } else {
                lien.classList.remove('active');
            }
        });
    });
});
</script>

