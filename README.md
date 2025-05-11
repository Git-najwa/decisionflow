# 🧠 DecisionFlow- Simulateur de Prise de Décision

Une application interactive où l’utilisateur est plongé dans des situations réalistes (entretien d’embauche, conflit professionnel, dilemme éthique), et doit faire des choix influençant la suite de l’histoire.
Ce projet a été réalisé dans le cadre d’un module full-stack mêlant Laravel (backend) et Vue.js (frontend).



## 🛠️ Stack technique

* **Backend** : Laravel 11 (API RESTful)
* **Frontend** : Vue.js 3 + Vite
* **Authentification** : Laravel Sanctum
* **Base de données** : SQLite
* **API communication** : JSON



## 📚 Fonctionnalités

### Backend (Laravel)

* Création de scénarios (`Scenario`), étapes (`Step`) et choix (`Option`)
* Authentification (register / login / logout / me)
* Middleware `auth:sanctum` pour protéger les routes sensibles
* Contrainte métier : un seul `is_start = true` par scénario
* Endpoints versionnés (`/api/...`)
* Seeders avec 2 scénarios complets pré-remplis
* Réponses API claires avec codes HTTP appropriés

### Frontend (Vue.js)

* Affichage de tous les scénarios disponibles
* Affichage du chapitre de départ (`is_start`)
* Navigation entre étapes selon les choix (relation dynamique)
* Affichage clair des options à chaque étape
* Navigation en temps réel sans rechargement



## 🚀 Installation

### 1. Cloner le projet

```bash
git clone https://github.com/votre-utilisateur/simulateur-decision.git
cd simulateur-decision
```

### 2. Backend (Laravel)

```bash
cd backend

# Installer les dépendances
composer install

# Copier l'exemple d'environnement
cp .env.example .env

# Générer la clé
php artisan key:generate

# Créer la base et migrer
php artisan migrate:fresh --seed

# Lancer le serveur local
php artisan serve
```

> Accès à l’API via : `http://127.0.0.1:8000/api`

### 3. Frontend (Vue.js)

```bash
cd frontend

# Installer les dépendances
npm install

# Lancer le projet
npm run dev
```

> Accès à l’interface : `http://localhost:5173`



## 🔐 Utilisation API (avec Postman ou Axios)

* `POST /api/register` : créer un compte
* `POST /api/login` : récupérer le token
* `GET /api/scenarios` : récupérer les scénarios disponibles
* `GET /api/scenarios/{id}` : récupérer un scénario complet (steps + options)
* Naviguer dynamiquement selon les relations entre étapes

## 💼 Exemples de scénarios intégrés

* **Première impression** : un entretien d’embauche 
* **Le désaccord** : une gestion de conflit professionnel


## 👤 Comptes test disponibles 

* **Email** : `test@example.com`
* **Mot de passe** : `password`



## 📁 Structure simplifiée

```bash
backend/
├── app/
├── routes/api.php
├── database/seeders/ScenarioSeeder.php
frontend/
├── src/
│   ├── components/
│   ├── pages/
│   ├── composables/
│   └── App.vue
```



## 📌 À propos

Projet réalisé dans le cadre des cours de Développement de produit média et Web & Mobile UI  (HEIG) – simulateur narratif à choix multiples.
Usage académique uniquement.

