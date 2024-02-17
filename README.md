![newsletterVideoImage](https://github.com/HAMZA7onx/Shares/assets/88968389/4624d90a-2892-43de-8504-cbfe96a6172d)
![Admin Dash](https://github.com/HAMZA7onx/Shares/assets/88968389/a08cacb1-675d-4198-ac14-e1ff54e19990)

# Plateforme Web de Communication et Marketing

## Description
Notre client est une entreprise en pleine croissance dans le secteur de la communication et du marketing. Ayant constaté un besoin croissant de centraliser et de rationaliser ses opérations en ligne, l'entreprise a décidé de développer une plateforme web interne intégrant des fonctionnalités avancées pour améliorer la communication, la gestion de l'information et la collaboration au sein de l'équipe.

## Fonctionnalités


### Gestion de Newsletter (Spatie)
La plateforme permet d'envoyer des newsletters régulières à ses clients et partenaires. L'intégration du package Spatie Newsletter facilite la création, l'envoi et le suivi des campagnes de newsletters. Les fonctionnalités de gestion des abonnements et des listes de diffusion sont intuitives et conviviales.

### Authentification avec Gestion des Rôles (Policies et Guards)
Un système d'authentification robuste avec gestion des rôles basée sur les politiques et gardes de Laravel est mis en place. Trois rôles distincts sont définis : Administrateur, Rédacteur et Membre, avec des autorisations spécifiques pour accéder et modifier certaines parties de la plateforme.

### Fonctionnalités Forgot Password et Remember Me
La plateforme inclut les fonctionnalités "forgot password" pour réinitialiser les mots de passe des utilisateurs, ainsi que la fonction "remember me" pour faciliter la connexion automatique.

### Media Library (Spatie)
La gestion de médias est simplifiée avec l'utilisation de Spatie Media Library. Les utilisateurs peuvent télécharger, organiser et partager des fichiers multimédias tels que des images, des vidéos et des documents, associés à un utilisateur ou à un projet spécifique.

### Soft Delete
La fonctionnalité "soft delete" est mise en œuvre pour éviter la perte accidentelle de données. Les enregistrements ne sont pas supprimés physiquement de la base de données, mais plutôt marqués comme supprimés, permettant leur éventuelle restauration.

### Middleware
Des middleware sont utilisés pour gérer les autorisations spécifiques aux rôles, assurant que chaque utilisateur a accès uniquement aux fonctionnalités qui lui sont autorisées en fonction de son rôle.

### Génération PDF
La plateforme peut générer des fichiers PDF à partir de données spécifiques, comme un rapport mensuel agrégeant les performances des campagnes de newsletters ou un récapitulatif des médias téléchargés sur une période donnée.

### Modélisation avec 3 Rôles
La base de données est modélisée pour prendre en charge les trois rôles définis (Administrateur, Rédacteur, Membre), assurant ainsi une séparation claire des données et des responsabilités au sein de la plateforme.

## Objectif
En intégrant ces fonctionnalités, la plateforme offre à notre client une solution complète et personnalisée pour répondre à ses besoins internes en matière de communication, de collaboration et de gestion d'informations.

