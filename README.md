# Web Technology Assignment 2 — Cloud-Ready PHP Registration Form

**Student USN:** 1RF24CS139

## Project objective
Build an online registration form using HTML, CSS, JavaScript, jQuery and PHP. The form validates user input and displays submitted information on a styled success page.

## Technologies used
- HTML5 — registration form and page structure
- CSS3 — responsive styling
- JavaScript — client-side validation
- jQuery 3.7.1 — form events and validation
- PHP 8.3 — server-side validation and result rendering
- Docker — reproducible cloud deployment

## Project structure
```text
Web_Technology_Assignment_2_Cloud_Ready_1RF24CS139/
├── index.php
├── submit.php
├── Dockerfile
├── render.yaml
├── .dockerignore
├── .gitignore
├── README.md
└── assets/
    ├── style.css
    └── script.js
```

## Run locally (PHP)
Requires PHP 8.0+.
1. Open a terminal in the project directory.
2. Run `php -S localhost:8000`.
3. Visit `http://localhost:8000`.

Alternatively, put the folder in XAMPP's `htdocs` directory, start Apache, and visit `http://localhost/Web_Technology_Assignment_2_Cloud_Ready_1RF24CS139/`.

## Deploy to Render (Docker)
This repository is configured for a Docker-based PHP web service.

1. Extract this ZIP file.
2. Create a new GitHub repository (public is convenient for an assignment).
3. Upload the *contents* of the extracted project folder to the repository root. Ensure `Dockerfile` and `render.yaml` are at the root, not nested inside another folder.
4. Sign in to Render and choose **New → Blueprint** (or create a **New Web Service** and connect the GitHub repository).
5. If using Blueprint, Render reads `render.yaml` and builds the Dockerfile. Approve creation of the web service.
6. Wait for the deployment to finish. Open the `onrender.com` URL shown in the Render dashboard.
7. Test the form with sample data and verify that the success page displays the submitted values.
8. Submit that public URL to your instructor.

The service uses Render's free plan setting in `render.yaml` where available. Free services may sleep when idle and take a short time to wake on the next visit. Hosting provider plans and limits can change.

### Alternative Docker run
```bash
docker build -t student-registration .
docker run --rm -p 10000:10000 -e PORT=10000 student-registration
```
Then open `http://localhost:10000`.

## Important deployment notes
- This is a PHP application. GitHub Pages and static-only hosting cannot run `submit.php`.
- The `Dockerfile` starts PHP's built-in web server and listens on the port supplied by the hosting platform.
- jQuery is loaded from the official jQuery CDN, so browser-side jQuery validation needs internet access.
- This demonstration displays submitted details but does not save them to a database.
- Do not enter real sensitive personal information when testing or sharing the demo.

## Validation and security
- jQuery performs client-side checks before submission.
- PHP independently validates submitted values; client-side validation can be bypassed.
- Output is HTML-escaped with `htmlspecialchars()` to reduce cross-site scripting risk.
- No database or persistent data storage is configured.

## Screenshots recommended for assignment
1. Registration form page.
2. Filled form before submission (use sample data).
3. Successful submission page.
4. Optional validation error display.
