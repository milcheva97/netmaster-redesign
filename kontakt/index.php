<?php
$submitted = $_SERVER['REQUEST_METHOD'] === 'POST';
$fields = [
    'nachname' => trim($_POST['nachname'] ?? ''), 'vorname' => trim($_POST['vorname'] ?? ''),
    'strasse' => trim($_POST['strasse'] ?? ''), 'ort' => trim($_POST['ort'] ?? ''),
    'telefon' => trim($_POST['telefon'] ?? ''), 'email' => trim($_POST['email'] ?? ''),
    'nachricht' => trim($_POST['nachricht'] ?? '')
];
$errors = [];
if ($submitted) {
    if ($fields['nachname'] === '') $errors[] = 'Bitte geben Sie Ihren Nachnamen ein.';
    if ($fields['vorname'] === '') $errors[] = 'Bitte geben Sie Ihren Vornamen ein.';
    if (!filter_var($fields['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'Bitte geben Sie eine gültige E-Mail-Adresse ein.';
    if ($fields['nachricht'] === '') $errors[] = 'Bitte schreiben Sie uns eine kurze Nachricht.';
    if (!isset($_POST['privacy'])) $errors[] = 'Bitte akzeptieren Sie die Datenschutzvereinbarung.';
}
$success = $submitted && !$errors;
?>
<!doctype html><html lang="de"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="description" content="Kontaktieren Sie Netmaster in Wädenswil oder Lugano."><title>Kontakt — Netmaster</title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><link href="/assets/styles.css" rel="stylesheet"><link href="/assets/logo.css" rel="stylesheet"><link href="/assets/header.css" rel="stylesheet"><link href="/assets/contact-page.css" rel="stylesheet">
</head><body class="contact-page">
<header class="site-header"><div class="header-topbar"><div class="container-xl d-flex justify-content-end align-items-center gap-4"><a href="mailto:info@netmaster.ch">✉ info@netmaster.ch</a><a href="tel:+41445424747">☎ +41 44 542 47 47</a></div></div><nav class="navbar navbar-expand-lg" aria-label="Hauptnavigation"><div class="container-xl"><a class="brand" href="/"><img src="/assets/images/logo.png" alt="Netmaster"></a><button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-label="Navigation öffnen"><span class="navbar-toggler-icon"></span></button><div class="collapse navbar-collapse" id="mainNav"><ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1"><li class="nav-item"><a class="nav-link" href="/ueber-uns">Über uns</a></li><li class="nav-item"><a class="nav-link" href="/franchising">Franchising</a></li><li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Dienstleistungen</a><ul class="dropdown-menu"><li><a class="dropdown-item" href="/marketingmaster.php">Marketingmaster</a></li><li><a class="dropdown-item" href="/salesmaster.php">Salesmaster</a></li><li><a class="dropdown-item" href="/callmaster">Callmaster</a></li><li><a class="dropdown-item" href="https://propertymaster.ch">Propertymaster</a></li><li><a class="dropdown-item" href="https://jobsmaster.ch">Jobsmaster</a></li></ul></li><li class="nav-item"><a class="nav-link" href="/stellenangebote">Jobs</a></li><li class="nav-item"><a class="nav-link active" href="/kontakt">Kontakt</a></li><li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">De</a><ul class="dropdown-menu dropdown-menu-end"><li><a class="dropdown-item active" href="/kontakt">Deutsch</a></li><li><a class="dropdown-item" href="/it">Italiano</a></li><li><a class="dropdown-item" href="/en">English</a></li></ul></li><li class="nav-item ms-lg-2"><a class="btn btn-cyan login-button" href="/login">Login</a></li></ul></div></div></nav></header>

<main>
<section class="contact-hero"><div class="contact-hero-grid" aria-hidden="true"></div><div class="container-xl position-relative"><div class="row align-items-end gy-4"><div class="col-lg-8"><div class="eyebrow fade-up">Kontakt</div><h1 class="fade-up delay-1">Lassen Sie uns<br><span>ins Gespräch kommen.</span></h1></div><div class="col-lg-4 fade-up delay-2"><p>Haben Sie Fragen zu unseren Dienstleistungen? Wir freuen uns auf Ihre Nachricht und melden uns persönlich bei Ihnen.</p><div class="hero-direct"><a href="tel:+41445424747">+41 44 542 47 47 ↗</a><a href="mailto:info@netmaster.ch">info@netmaster.ch ↗</a></div></div></div></div></section>

<section class="contact-form-section"><div class="container-xl"><div class="contact-form-layout">
    <div class="contact-form-intro reveal"><div class="eyebrow dark">Ihre Anfrage</div><h2>Womit können wir Ihnen helfen?</h2><p>Füllen Sie das Formular aus. Pflichtfelder sind mit einem Stern gekennzeichnet.</p><div class="response-note"><span></span><p><strong>Persönliche Rückmeldung</strong>In der Regel innerhalb eines Arbeitstages.</p></div></div>
    <div class="modern-form-wrap reveal">
    <?php if ($success): ?><div class="contact-success" role="status"><span>✓</span><h3>Vielen Dank, <?= htmlspecialchars($fields['vorname']) ?>.</h3><p>Ihre Anfrage wurde erfolgreich validiert. Für den Live-Betrieb muss noch der E-Mail-Versand angeschlossen werden.</p></div>
    <?php else: ?>
    <?php if ($errors): ?><div class="contact-errors" role="alert"><?= implode('<br>', array_map('htmlspecialchars', $errors)) ?></div><?php endif; ?>
    <form method="post" class="modern-contact-form"><div class="form-grid">
        <label><span>Nachname *</span><input name="nachname" value="<?= htmlspecialchars($fields['nachname']) ?>" required></label><label><span>Vorname *</span><input name="vorname" value="<?= htmlspecialchars($fields['vorname']) ?>" required></label>
        <label><span>Strasse</span><input name="strasse" value="<?= htmlspecialchars($fields['strasse']) ?>"></label><label><span>Ort / PLZ</span><input name="ort" value="<?= htmlspecialchars($fields['ort']) ?>"></label>
        <label><span>Telefonnummer</span><input name="telefon" type="tel" value="<?= htmlspecialchars($fields['telefon']) ?>"></label><label><span>E-Mail *</span><input name="email" type="email" value="<?= htmlspecialchars($fields['email']) ?>" required></label>
        <label class="form-wide"><span>Zusätzliche Informationen *</span><textarea name="nachricht" rows="5" required><?= htmlspecialchars($fields['nachricht']) ?></textarea></label>
        <label class="privacy-check form-wide"><input type="checkbox" name="privacy" value="1" <?= isset($_POST['privacy']) ? 'checked' : '' ?> required><span>Beim Absenden des Formulars akzeptiere ich die <a href="/datenschutz">Datenschutzvereinbarung</a>.</span></label>
        <div class="form-wide"><button class="btn btn-cyan rounded-pill" type="submit">Nachricht senden →</button></div>
    </div></form><?php endif; ?>
    </div>
</div></div></section>

<section class="contact-locations"><div class="container-xl"><div class="contact-locations-heading reveal"><div class="eyebrow">Unsere Standorte</div><h2>Zwei Standorte.<br>Ein gemeinsames Netzwerk.</h2></div><div class="contact-location-grid reveal">
    <div class="contact-addresses"><button class="contact-location active" type="button" data-map-query="Zugerstrasse 162, 8820 Wädenswil, Switzerland" aria-pressed="true"><span>01</span><div><small>Hauptsitz · Schweiz</small><h3>Wädenswil</h3><p>Netmaster (Schweiz) AG<br>Zugerstrasse 162<br>8820 Wädenswil</p></div><b>↗</b></button><button class="contact-location" type="button" data-map-query="Via Giovanni Maraini 16, 6963 Lugano, Switzerland" aria-pressed="false"><span>02</span><div><small>Filiale · Schweiz</small><h3>Lugano</h3><p>Via Giovanni Maraini 16<br>6963 Lugano<br>Switzerland</p></div><b>↗</b></button></div>
    <div class="contact-map"><iframe id="contactMap" title="Google Maps – Netmaster Wädenswil" src="https://maps.google.com/maps?q=Zugerstrasse%20162%2C%208820%20W%C3%A4denswil%2C%20Switzerland&amp;z=15&amp;output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe><a id="contactDirections" href="https://www.google.com/maps/dir/?api=1&amp;destination=Zugerstrasse%20162%2C%208820%20W%C3%A4denswil%2C%20Switzerland" target="_blank" rel="noopener">Route öffnen ↗</a></div>
</div></div></section>
</main>
<footer><div class="container-xl"><div class="footer-main"><a class="brand brand-light" href="/"><img src="/assets/images/logo.png" alt="Netmaster"></a><p>Netmaster (Schweiz) AG<br>Zugerstrasse 162 · CH–8820 Wädenswil</p><div class="footer-links"><a href="/ueber-uns">Über uns</a><a href="/franchising">Franchising</a><a href="/kontakt">Kontakt</a></div></div><div class="footer-bottom"><span>© <?= date('Y') ?> Netmaster</span><span>Impressum · Datenschutz · AGB</span></div></div></footer>
<script src="/assets/app.js"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script><script src="/assets/contact-page.js"></script>
</body></html>
