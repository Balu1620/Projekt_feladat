@extends('layouts.header')

@section('content')

<div class="adatvedelem">
    <h2>Adatvédelmi szabályzat</h2>
    <p><strong>Hatályba lépés dátuma:</strong> 2025.02.10</p>
    
    <h3>1. Az adatkezelő adatai</h3>
    <ul>
        <li><strong>Cégnév:</strong> Motorkirálya Kft.</li>
        <li><strong>Székhely:</strong> 1051 Budapest, Deák Ferenc tér 3.</li>
        <li><strong>E-mail:</strong> kapcsolat@motorkiralya.hu</li>
    </ul>

    <h3>2. Milyen adatokat gyűjtünk és milyen célból?</h3>
    <h4>2.1. Személyes adatok</h4>
    <ul>
        <li><strong>Regisztráció és fiókkezelés:</strong> név, e-mail cím, telefonszám.</li>
        <li><strong>Fizetés:</strong> bankkártya-adatok (harmadik fél fizetési szolgáltató kezeli).</li>
        <li><strong>Helymeghatározás:</strong> a motorok elhelyezkedésének és használatának követése.</li>
    </ul>

    <h4>2.2. Technikai adatok</h4>
    <p id="marad">A rendszer automatikusan rögzítheti az IP-címet, eszközazonosítót, böngészési adatokat a szolgáltatás biztonságának és teljesítményének fenntartása érdekében.</p>

    <h3>3. Az adatok megőrzési ideje</h3>
    <ul>
        <li><strong>Felhasználói fiók adatokat</strong> a fiók aktív fennállásáig.</li>
        <li><strong>Pénzügyi tranzakciók adatait</strong> legalább 8 évig (jogszabályi előírás alapján).</li>
    </ul>

    <h3>4. Kivel osztjuk meg az adatokat?</h3>
    <ul>
        <li><strong>Harmadik fél szolgáltatók</strong> (pl. fizetési rendszerek, ügyfélszolgálat).</li>
        <li><strong>Hatóságok</strong>, amennyiben jogszabály ezt megköveteli.</li>
    </ul>

    <h3>5. Felhasználói jogok</h3>
    <ul>
        <li>Hozzáférés a kezelt adatokhoz.</li>
        <li>Az adatok helyesbítésének vagy törlésének kérése.</li>
        <li>Marketing célú adatkezelés elleni tiltakozás.</li>
    </ul>

    <p class="kap"><strong>📩 Kapcsolat adatvédelmi ügyekben:</strong> kapcsolat@motorkiralya.hu</p>
</div>

@endsection

@extends('layouts.footer')