# Application de Gestion de Tickets

Cette application web permet aux clients de signaler des problèmes et de demander de l'assistance pour un logiciel spécifique. Les administrateurs peuvent assigner ces tickets à des développeurs, qui sont responsables de leur résolution. Chaque acteur peut suivre l'évolution des tickets en temps réel, ce qui améliore la communication et l'efficacité de l'équipe technique.

## Fonctionnalités

### 📦 Création et Gestion des Tickets
- **Création de ticket** : Les clients peuvent créer un ticket en fournissant :
  - Titre descriptif
  - Description détaillée
  - Priorité (Haute, Moyenne, Basse)
  - Système d’exploitation concerné
  - Logiciel concerné
  - Date de création
- **Tri des tickets** : Les tickets peuvent être triés par priorité, logiciel ou statut.
- **Recherche de tickets** : Les utilisateurs peuvent rechercher des tickets via des mots-clés.

![Exemple de création de ticket](screenshots/creation-ticket.png)

### 💬 Attribution et Suivi des Tickets
- **Assignation des tickets** : Les administrateurs peuvent assigner des tickets aux développeurs, avec la date d’assignation et l'identité de l'administrateur.
- **Mise à jour du statut** : Les développeurs peuvent mettre à jour le statut d’un ticket en :
  - En cours
  - Résolu
  - Fermé
- **Suivi pour les clients** : Les clients peuvent suivre l’évolution de leurs tickets via leur tableau de bord.

![Tableau de bord client](screenshots/tableau-de-bord-client.png)

### 📊 Statistiques et Analyse
- **Nombre de tickets** : Affichage du nombre total de tickets créés, assignés et résolus.
- **Logiciels populaires** : Mise en avant des logiciels avec le plus de demandes.
- **Développeurs les plus actifs** : Classement des développeurs en fonction du nombre de tickets résolus.

![Statistiques des tickets](screenshots/statistiques-tickets.png)

### 🔐 Authentification et Rôles
- **Client** : Peut créer des tickets et suivre leur état.
- **Développeur** : Peut voir les tickets qui lui sont assignés et les résoudre.
- **Administrateur** : Peut assigner des tickets et superviser l’activité de l’équipe.

## Pages d'authentification

### 🏠 Page d'Accueil
Voici une capture d'écran de la page d'accueil de l'application :
![Page d'Accueil](screenshots/accueil.png)

### 🔐 Page de Connexion (Login)
Voici une capture d'écran de la page de connexion :
![Page de Connexion](screenshots/login.png)

### 📝 Page d'Inscription (Register)
Voici une capture d'écran de la page d'inscription :
![Page d'Inscription](screenshots/register.png)

## Installation

1. Clonez ce projet dans votre répertoire local :
   ```bash
   git clone https://github.com/Safaa-Ettalhi/Gestion-des-Tickets-et-Affectation-des-D-veloppeurs-/tree/main/ticket-system