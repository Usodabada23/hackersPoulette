# Hackers Poulette - Contact Support Form

**Type de défi** : `Consolidation` | **Mode** : `SOLO`  
**Durée** : `3 jours`  
**Repository** : `hackers-poulette`

---

## 🚀 Présentation

Bienvenue sur le projet **Hackers Poulette** !  
Ce projet a pour but de créer un **formulaire de contact** complet permettant aux utilisateurs de **contacter le support** de la société Hackers Poulette™. Le formulaire est entièrement développé en **PHP** et utilise un **design moderne** grâce à **Bulma**, un framework CSS léger et flexible.

### 📋 Objectifs du projet

- Créer un formulaire de contact avec les champs suivants : nom, prénom, adresse email, description et un fichier optionnel.
- Assurer la validation, l'assainissement et le traitement des données soumises via le formulaire.
- Implémenter une base de données pour stocker les informations des utilisateurs et des messages.
- Ajouter une protection contre le spam via un **captcha**.
- Offrir une expérience utilisateur agréable avec une interface moderne grâce à **Bulma**.

---

## 📝 Fonctionnalités principales

### 1. **Formulaire de contact**  
Le formulaire inclut les champs suivants :

- **Nom** (obligatoire, chaîne de caractères, min 2, max 255)
- **Prénom** (obligatoire, chaîne de caractères, min 2, max 255)
- **Adresse email** (obligatoire, valide, min 2, max 255)
- **Fichier** (optionnel, types acceptés : JPG, PNG, GIF, taille max : 2MB)
- **Description** (obligatoire, min 2, max 1000 caractères)

### 2. **Validation côté client (JavaScript)**  
Avant de soumettre les données, une validation côté client est effectuée pour vérifier que tous les champs obligatoires sont remplis et que le fichier téléchargé est dans le bon format.

### 3. **Validation et assainissement côté serveur (PHP)**  
Les données envoyées sont ensuite validées et nettoyées sur le serveur pour éviter les attaques **SQL Injection**, **XSS**, et autres vulnérabilités. Si tout est valide, les données sont enregistrées dans la base de données.

### 4. **Protection contre le spam (reCAPTCHA)**  
Le formulaire utilise **Google reCAPTCHA** pour empêcher les soumissions automatisées de type spam.

### 5. **Message de confirmation**  
Après une soumission réussie, un message de confirmation est affiché à l'utilisateur pour lui indiquer que son message a bien été envoyé.

---

## ⚙️ Structure du projet

### Architecture MVC

Le projet suit une structure **MVC** (Modèle-Vue-Contrôleur), permettant une séparation claire des responsabilités dans le code :

- **Model** : Gère la logique de données, les interactions avec la base de données pour enregistrer les messages et les clients.
- **View** : Le code HTML/CSS qui présente le formulaire à l'utilisateur, avec un design moderne utilisant **Bulma**.
- **Controller** : Gère la logique de l'application, la validation du formulaire et l'envoi des messages.

### Structure des tables

- **clients** : Contient les informations des clients (nom, prénom, email).
- **messages** : Contient les messages envoyés par les utilisateurs (description, référence à un client, URL du fichier si fourni,la date de la premiere sauvegarde).

---

## 🔐 Sécurité

Le projet prend en compte les bonnes pratiques de sécurité :

- **Validation et assainissement des données** : Toutes les données envoyées par l'utilisateur sont validées et nettoyées pour éviter les attaques **SQL Injection**, **XSS**, etc.
- **reCAPTCHA** : Le formulaire utilise **Google reCAPTCHA** pour éviter les soumissions automatisées.

---

## 🛠️ Technologies utilisées

- **PHP** : Pour la gestion des données côté serveur et la logique métier.
- **MySQL** : Base de données relationnelle pour stocker les informations des clients et des messages.
- **PDO** : Gestion sécurisée des requêtes SQL.
- **HTML/CSS** : Structure et design du formulaire, avec **Bulma** pour le design.
- **JavaScript** : Validation côté client pour améliorer l'expérience utilisateur.
- **Google reCAPTCHA** : Pour la protection contre les bots et les soumissions de spam.
