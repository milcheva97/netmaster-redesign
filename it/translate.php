<?php
function netmaster_italian_page(string $source, string $currentRoute): void
{
    ob_start(); require $source; $html = ob_get_clean();
    $t = require __DIR__ . '/translations.php';
    $serviceTranslations = require dirname(__DIR__) . '/en/service-translations.php';
    $serviceRouteMap = [
        '/it/marketingmaster' => '/en/marketingmaster', '/it/salesmaster' => '/en/salesmaster',
        '/it/callmaster' => '/en/callmaster', '/it/propertymaster' => '/en/propertymaster',
        '/it/jobsmaster' => '/en/jobsmaster'
    ];
    if (isset($serviceRouteMap[$currentRoute], $serviceTranslations[$serviceRouteMap[$currentRoute]])) {
        $englishPage = $serviceTranslations[$serviceRouteMap[$currentRoute]];
        $italianValues = require __DIR__ . '/service-values.php';
        foreach ($englishPage as $german => $english) {
            $t[$german] = $italianValues[$english] ?? $english;
        }
    }
    $html = strtr($html, $t);

    $routes = [
        'href="/ueber-uns"'=>'href="/it/chi-siamo"','href="/franchising"'=>'href="/it/franchising"',
        'href="/dienstleistungen"'=>'href="/it/servizi"','href="/kontakt"'=>'href="/it/contatti"',
        'href="/stellenangebote"'=>'href="/it/carriere"','href="/login"'=>'href="/it/login"',
        'href="/register"'=>'href="/it/registrazione"','href="/marketingmaster.php"'=>'href="/it/marketingmaster"',
        'href="/salesmaster.php"'=>'href="/it/salesmaster"','href="/callmaster"'=>'href="/it/callmaster"',
        'href="/propertymaster.php"'=>'href="/it/propertymaster"','href="/jobsmaster.php"'=>'href="/it/jobsmaster"'
    ];
    $html = strtr($html, $routes);
    $german = ['/it'=>'/','/it/chi-siamo'=>'/ueber-uns','/it/franchising'=>'/franchising','/it/servizi'=>'/dienstleistungen','/it/contatti'=>'/kontakt','/it/carriere'=>'/stellenangebote','/it/login'=>'/login','/it/registrazione'=>'/register','/it/marketingmaster'=>'/marketingmaster.php','/it/salesmaster'=>'/salesmaster.php','/it/callmaster'=>'/callmaster','/it/propertymaster'=>'/propertymaster.php','/it/jobsmaster'=>'/jobsmaster.php'];
    $html = preg_replace('~<a class="dropdown-item active" href="[^"]*">Tedesco</a>~','<a class="dropdown-item" href="'.($german[$currentRoute]??'/').'">Tedesco</a>',$html);
    $html = preg_replace('~<a class="dropdown-item" href="/it">Italiano</a>~','<a class="dropdown-item active" href="'.htmlspecialchars($currentRoute).'">Italiano</a>',$html);
    $html = preg_replace('~(<a class="nav-link dropdown-toggle"[^>]*>)De(</a>)~','$1It$2',$html);
    echo $html;
}
