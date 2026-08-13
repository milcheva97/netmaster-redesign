<?php
$submitted = $_SERVER['REQUEST_METHOD'] === 'POST';
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$company = trim($_POST['company'] ?? '');
$message = trim($_POST['message'] ?? '');
$errors = [];

if ($submitted) {
    if ($name === '') $errors[] = 'Bitte geben Sie Ihren Namen ein.';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Bitte geben Sie eine gültige E-Mail-Adresse ein.';
    if ($message === '') $errors[] = 'Bitte beschreiben Sie kurz Ihre Herausforderung.';
}

$success = $submitted && !$errors;
?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Netmaster verbindet Sales, Marketing, HR und digitale Lösungen für nachhaltiges Unternehmenswachstum.">
    <title>Netmaster — Business neu vernetzt</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/styles.css" rel="stylesheet">
    <link href="assets/logo.css" rel="stylesheet">
    <link href="assets/welcome.css" rel="stylesheet">
    <link href="assets/values.css" rel="stylesheet">
    <link href="assets/header.css" rel="stylesheet">
    <link href="assets/philosophy.css" rel="stylesheet">
    <link href="assets/locations.css" rel="stylesheet">
    <link href="assets/clients.css" rel="stylesheet">
</head>
<body>
<header class="site-header">
    <div class="header-topbar">
        <div class="container-xl d-flex justify-content-end align-items-center gap-4">
            <a href="mailto:info@netmaster.ch" aria-label="E-Mail an Netmaster">
                <span aria-hidden="true">✉</span> info@netmaster.ch
            </a>
            <a href="tel:+41445424747" aria-label="Netmaster anrufen">
                <span aria-hidden="true">☎</span> +41 44 542 47 47
            </a>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg" aria-label="Hauptnavigation">
        <div class="container-xl">
            <a class="brand" href="/" aria-label="Netmaster Startseite"><img src="assets/images/logo.png" alt="Netmaster"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Navigation öffnen"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                    <li class="nav-item"><a class="nav-link" href="/ueber-uns">Über uns</a></li>
                    <li class="nav-item"><a class="nav-link" href="/franchising">Franchising</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/dienstleistungen" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dienstleistungen</a>
                        <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                            <li><a class="dropdown-item" href="/marketingmaster.php">Marketingmaster</a></li>
                            <li><a class="dropdown-item" href="/salesmaster.php">Salesmaster</a></li>
                            <li><a class="dropdown-item" href="/callmaster">Callmaster</a></li>
                            <li><a class="dropdown-item" href="/propertymaster.php">Propertymaster</a></li>
                            <li><a class="dropdown-item" href="/jobsmaster.php">Jobsmaster</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/stellenangebote">Jobs</a></li>
                    <li class="nav-item"><a class="nav-link" href="/kontakt">Kontakt</a></li>
                    <li class="nav-item dropdown language-menu">
                        <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">De</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                            <li><a class="dropdown-item active" href="/">Deutsch</a></li>
                            <li><a class="dropdown-item" href="/it">Italiano</a></li>
                            <li><a class="dropdown-item" href="/en">English</a></li>
                        </ul>
                    </li>
                    <li class="nav-item ms-lg-2"><a class="btn btn-cyan login-button" href="/login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main id="top">
    <section class="hero overflow-hidden">
        <div class="hero-grid" aria-hidden="true"></div>
        <div class="container-xl position-relative">
            <div class="row align-items-end gy-5">
                <div class="col-lg-8">
                    <div class="eyebrow fade-up">Outsourcing & Business Solutions · seit 2008</div>
                    <h1 class="display-title fade-up delay-1">Business neu<br><span>vernetzt.</span></h1>
                </div>
                <div class="col-lg-4 pb-lg-3 fade-up delay-2">
                    <p class="hero-copy">Wir verbinden Menschen, Prozesse und Technologie – damit Sie sich auf das konzentrieren können, was Ihr Unternehmen einzigartig macht.</p>
                    <div class="d-flex flex-wrap gap-3 mt-4">
                        <a href="#contact" class="btn btn-cyan rounded-pill">Kostenlose Analyse <span>→</span></a>
                    </div>
                </div>
            </div>
            <div class="hero-experience fade-up delay-3"><strong>16+</strong><span>Jahre Erfahrung</span></div>
            <div class="hero-client-slider fade-up delay-3" aria-label="Auswahl unserer Kunden und Partner">
                <div class="hero-client-track">
                    <div class="hero-client-logo"><img src="assets/images/projects/APG-SGA.jpg" alt="APG SGA"></div>
                    <div class="hero-client-logo"><img src="assets/images/projects/sidler-ag-sursee.jpeg" alt="Sidler"></div>
                    <div class="hero-client-logo"><img src="assets/images/projects/hev.png__240x130_q85_crop-1-1.jpg" alt="HEV Zürich"></div>
                    <div class="hero-client-logo"><img src="assets/images/projects/Cinergy.jpg" alt="Cinergy"></div>
                    <div class="hero-client-logo"><img src="assets/images/projects/scheuble.png" alt="Scheuble Hotel"></div>
                    <div class="hero-client-logo"><img src="assets/images/projects/klafs.png" alt="Klafs"></div>
                    <div class="hero-client-logo"><img src="assets/images/projects/Jobcloud.jpg" alt="JobCloud"></div>
                    <div class="hero-client-logo"><img src="assets/images/projects/Henkel.jpg" alt="Henkel"></div>
                    <div class="hero-client-logo"><img src="assets/images/projects/APG-SGA.jpg" alt="" aria-hidden="true"></div>
                    <div class="hero-client-logo"><img src="assets/images/projects/sidler-ag-sursee.jpeg" alt="" aria-hidden="true"></div>
                    <div class="hero-client-logo"><img src="assets/images/projects/hev.png__240x130_q85_crop-1-1.jpg" alt="" aria-hidden="true"></div>
                    <div class="hero-client-logo"><img src="assets/images/projects/Cinergy.jpg" alt="" aria-hidden="true"></div>
                    <div class="hero-client-logo"><img src="assets/images/projects/scheuble.png" alt="" aria-hidden="true"></div>
                    <div class="hero-client-logo"><img src="assets/images/projects/klafs.png" alt="" aria-hidden="true"></div>
                    <div class="hero-client-logo"><img src="assets/images/projects/Jobcloud.jpg" alt="" aria-hidden="true"></div>
                    <div class="hero-client-logo"><img src="assets/images/projects/Henkel.jpg" alt="" aria-hidden="true"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="welcome-section" aria-labelledby="welcome-title">
        <div class="container-xl">
            <div class="welcome-heading reveal">
                <div class="eyebrow dark">Ihr Outsourcing-Experte</div>
                <h2 id="welcome-title">Willkommen bei <span>Netmaster</span></h2>
            </div>

            <div class="row align-items-center gy-5 welcome-content">
                <div class="col-lg-6">
                    <div class="welcome-visual reveal">
                        <span class="welcome-shape welcome-shape-one" aria-hidden="true"></span>
                        <span class="welcome-shape welcome-shape-two" aria-hidden="true"></span>
                        <figure>
                            <img src="assets/images/outsourcing-team.jpeg" alt="Geschäftsleute im persönlichen Austausch" loading="lazy">
                            <figcaption><strong>16+</strong><span>Jahre Outsourcing-Erfahrung</span></figcaption>
                        </figure>
                    </div>
                </div>

                <div class="col-lg-5 offset-lg-1">
                    <div class="welcome-copy reveal">
                        <h3>Vorteile von Outsourcing</h3>
                        <p class="welcome-lead">Outsourcen Sie Ihre Geschäftsfelder aus. Wir helfen Ihnen dabei, während Sie sich auf Ihr Kerngeschäft konzentrieren.</p>
                        <p>Das Wort Outsourcing kommt aus dem Englischen und bezieht sich auf einzelne Aufgaben, Teilbereiche oder Geschäftsprozesse, welche von Unternehmen an externe Firmen ausgelagert werden.</p>
                        <p>Dank der Auslagerung gewisser Geschäftsbereiche geniessen Sie viele Vorteile, wie zum Beispiel Ersparnisse bei der Produktion in globalisierten Märkten. Ausserdem können Sie das unternehmerische Risiko senken, was in angespannten wirtschaftlichen Zeiten nützlich ist.</p>
                        <p>Im Gebiet Outsourcing sind wir langjährige Experte. Profitieren Sie von unserem Netzwerk mit Spezialisten im Bereich</p>

                        <ul class="welcome-benefits" aria-label="Unsere Spezialgebiete">
                            <li>Sales</li>
                            <li>Marketing</li>
                            <li>IT</li>
                            <li>Human Resources</li>
                        </ul>

                        <p>Wir suchen für Ihr Unternehmen die passende Lösung. Durch die freiwerdenden Ressourcen können Sie in Ihr Hauptgeschäft investieren und somit die Qualität, Effektivität und Ihre Marktposition verbessern.</p>
                        <a href="#contact" class="btn btn-dark rounded-pill welcome-cta">Kostenlose Analyse anfordern <span>→</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="values-section" aria-labelledby="values-title">
        <div class="values-overlay" aria-hidden="true"></div>
        <div class="container-xl position-relative">
            <div class="values-heading reveal">
                <div class="eyebrow">Unsere Werte</div>
                <h2 id="values-title">Was bieten Wir Ihnen?</h2>
            </div>

            <div class="row g-4 values-grid">
                <div class="col-lg-4">
                    <article class="value-card reveal">
                        <div class="value-icon" aria-hidden="true">
                            <svg viewBox="0 0 64 64" fill="none"><circle cx="30" cy="32" r="20"/><circle cx="30" cy="32" r="11"/><path d="m30 32 18-18M43 12h9v9"/></svg>
                        </div>
                        <h3>Philosophie</h3>
                        <p>Unsere hochmotivierten Mitarbeiter versuchen stets Ihr Unternehmen nachhaltig und wirtschaftlich zum Erfolg zu führen.</p>
                        <a href="#philosophy" aria-label="Mehr über unsere Philosophie">Mehr erfahren <span>↓</span></a>
                    </article>
                </div>

                <div class="col-lg-4">
                    <article class="value-card reveal">
                        <div class="value-icon" aria-hidden="true">
                            <svg viewBox="0 0 64 64" fill="none"><path d="M9 15h31v27H22L11 51v-9H9z"/><path d="M31 23h24v24H43l-8 7v-7h-4M17 25h15M17 32h10"/></svg>
                        </div>
                        <h3>Franchising</h3>
                        <p>Wir möchten unseren Kunden nur den besten und professionellsten Service bieten, der Sie zum Erfolg führt.</p>
                        <a href="/franchising" aria-label="Mehr über Franchising">Mehr erfahren <span>↗</span></a>
                    </article>
                </div>

                <div class="col-lg-4">
                    <article class="value-card reveal">
                        <div class="value-icon" aria-hidden="true">
                            <svg viewBox="0 0 64 64" fill="none"><path d="M13 54V21h38v33M8 54h48M23 21V11h18v10"/><circle cx="25" cy="34" r="5"/><path d="M17 49c1-6 4-9 8-9s7 3 8 9M39 31h7M39 38h7M39 45h7"/></svg>
                        </div>
                        <h3>Offene Stellen</h3>
                        <p>Wer Interesse an einem abwechslungsreichen und fordernden Job im Bereich Marketing hat, der sollte sich bei uns um eine Anstellung (m/w) bewerben.</p>
                        <a href="/stellenangebote" aria-label="Offene Stellen ansehen">Stellen ansehen <span>↗</span></a>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section id="philosophy" class="philosophy-section" aria-labelledby="philosophy-title">
        <div class="container-xl">
            <div class="philosophy-heading reveal">
                <div class="eyebrow dark">Lösungen für Ihre Herausforderung</div>
                <h2 id="philosophy-title">Unsere Philosophie</h2>
            </div>

            <div class="row g-4 philosophy-cards">
                <div class="col-lg-4">
                    <article class="philosophy-card reveal">
                        <div class="philosophy-icon" aria-hidden="true">
                            <svg viewBox="0 0 64 64" fill="none"><path d="M22 42h20M25 49h14M27 55h10M20 35c-3-3-5-7-5-12a17 17 0 0 1 34 0c0 5-2 9-6 13-3 3-4 5-4 6H25c0-2-1-4-5-7Z"/><path d="m24 23 5 5 11-12M46 9h9v9"/></svg>
                        </div>
                        <h3>Tägliche Bestleistung</h3>
                        <p>Unsere Mitarbeiter arbeiten leidenschaftlich, um Ihr Unternehmen auf Erfolgskurs zu bringen.</p>
                    </article>
                </div>

                <div class="col-lg-4">
                    <article class="philosophy-card reveal">
                        <div class="philosophy-icon" aria-hidden="true">
                            <svg viewBox="0 0 64 64" fill="none"><circle cx="32" cy="20" r="8"/><circle cx="16" cy="30" r="6"/><circle cx="48" cy="30" r="6"/><path d="M19 52c1-10 5-16 13-16s12 6 13 16M7 51c1-8 4-13 10-13 3 0 5 1 7 4M57 51c-1-8-4-13-10-13-3 0-5 1-7 4"/></svg>
                        </div>
                        <h3>Die Mitarbeiter sind das Herz des Unternehmens</h3>
                        <p>Langfristig sichere Arbeitsplätze zu gewährleisten ist unser oberstes Ziel.</p>
                    </article>
                </div>

                <div class="col-lg-4">
                    <article class="philosophy-card reveal">
                        <div class="philosophy-icon" aria-hidden="true">
                            <svg viewBox="0 0 64 64" fill="none"><path d="M13 12h38v31H31L20 52v-9h-7z"/><path d="M23 27c3 5 7 7 10 7s7-2 10-7M24 22h.1M42 22h.1"/></svg>
                        </div>
                        <h3>Kundenzufriedenheit</h3>
                        <p>Es ist für uns selbstverständlich, unsere Kunden von Anfang an kompetent und professionell zu beraten und unser Know-how und die langjährige Erfahrung in Ihr Projekt einfliessen zu lassen.</p>
                    </article>
                </div>
            </div>

            <div class="philosophy-core reveal" aria-label="Unsere vier Stärken">
                <div class="core-orbit" aria-hidden="true">
                    <span class="orbit orbit-one"></span>
                    <span class="orbit orbit-two"></span>
                    <div class="core-mark">N</div>
                </div>
                <div class="core-value core-value-one"><strong>Fachwissen</strong></div>
                <div class="core-value core-value-two"><strong>Kreativität</strong></div>
                <div class="core-value core-value-three"><strong>Hingabe</strong></div>
                <div class="core-value core-value-four"><strong>Erfahrung</strong></div>
            </div>
        </div>
    </section>

    <section id="locations" class="section-pad locations-section">
        <div class="container-xl">
            <div class="locations-heading reveal">
                <div class="eyebrow dark">Unsere Standorte</div>
                <h2>Persönlich für Sie da.</h2>
                <p>Wählen Sie einen Standort, um ihn direkt auf der Karte anzuzeigen.</p>
            </div>

            <div class="location-finder reveal">
                <div class="location-sidebar">
                    <button class="location-option active" type="button" data-map-query="Zugerstrasse 162, 8820 Wädenswil, Switzerland" aria-pressed="true">
                        <span class="location-number">01</span>
                        <span class="location-details">
                            <small>Hauptsitz · Schweiz</small>
                            <strong>Wädenswil</strong>
                            <span>Zugerstrasse 162<br>8820 Wädenswil, Switzerland</span>
                        </span>
                        <span class="location-arrow" aria-hidden="true">↗</span>
                    </button>

                    <button class="location-option" type="button" data-map-query="Via Giovanni Maraini 16, 6963 Lugano, Switzerland" aria-pressed="false">
                        <span class="location-number">02</span>
                        <span class="location-details">
                            <small>Filiale · Schweiz</small>
                            <strong>Lugano</strong>
                            <span>Via Giovanni Maraini 16<br>6963 Lugano, Switzerland</span>
                        </span>
                        <span class="location-arrow" aria-hidden="true">↗</span>
                    </button>

                    <div class="location-contact">
                        <small>Direkter Kontakt</small>
                        <a href="tel:+41445424747">+41 44 542 47 47</a>
                        <a href="mailto:info@netmaster.ch">info@netmaster.ch</a>
                    </div>
                </div>

                <div class="location-map">
                    <iframe id="locationMap" title="Google Maps – Netmaster Hauptsitz Wädenswil" src="https://maps.google.com/maps?q=Zugerstrasse%20162%2C%208820%20W%C3%A4denswil%2C%20Switzerland&amp;z=15&amp;output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
                    <a id="mapDirections" class="map-directions" href="https://www.google.com/maps/dir/?api=1&amp;destination=Zugerstrasse%20162%2C%208820%20W%C3%A4denswil%2C%20Switzerland" target="_blank" rel="noopener">Route in Google Maps <span>↗</span></a>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact-section section-pad">
        <div class="container-xl">
            <div class="row gy-5">
                <div class="col-lg-5">
                    <div class="eyebrow">Projekt starten</div>
                    <h2 class="mt-3">Was dürfen wir für Sie einfacher machen?</h2>
                    <p>Erzählen Sie uns kurz von Ihrer Herausforderung. Wir melden uns persönlich und unverbindlich.</p>
                    <a href="tel:+41445424747" class="contact-direct">+41 44 542 47 47</a>
                    <a href="mailto:info@netmaster.ch" class="contact-direct">info@netmaster.ch</a>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <?php if ($success): ?>
                        <div class="form-success" role="status"><strong>Vielen Dank, <?= htmlspecialchars($name) ?>.</strong><br>Ihre Anfrage wurde lokal validiert. Für den Live-Betrieb wird hier der E-Mail-Versand angeschlossen.</div>
                    <?php else: ?>
                        <?php if ($errors): ?><div class="alert alert-danger"><?= implode('<br>', array_map('htmlspecialchars', $errors)) ?></div><?php endif; ?>
                        <form method="post" class="contact-form">
                            <div class="row g-4">
                                <div class="col-md-6"><label for="name">Name *</label><input id="name" name="name" value="<?= htmlspecialchars($name) ?>" required></div>
                                <div class="col-md-6"><label for="email">E-Mail *</label><input id="email" name="email" type="email" value="<?= htmlspecialchars($email) ?>" required></div>
                                <div class="col-12"><label for="company">Unternehmen</label><input id="company" name="company" value="<?= htmlspecialchars($company) ?>"></div>
                                <div class="col-12"><label for="message">Ihre Herausforderung *</label><textarea id="message" name="message" rows="4" required><?= htmlspecialchars($message) ?></textarea></div>
                                <div class="col-12 d-flex flex-column flex-sm-row align-items-sm-center gap-3"><button class="btn btn-cyan rounded-pill" type="submit">Anfrage absenden →</button><small>Ihre Daten werden vertraulich behandelt.</small></div>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<footer>
    <div class="container-xl"><div class="footer-main"><a class="brand brand-light" href="#top" aria-label="Netmaster Startseite"><img src="assets/images/logo.png" alt="Netmaster"></a><p>Netmaster (Schweiz) AG<br>Zugerstrasse 162 · CH–8820 Wädenswil</p><div class="footer-links"><a href="#services">Leistungen</a><a href="#about">Über uns</a><a href="/kontakt">Kontakt</a></div></div><div class="footer-bottom"><span>© <?= date('Y') ?> Netmaster</span><span>Impressum · Datenschutz · AGB</span></div></div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/app.js"></script>
</body>
</html>
