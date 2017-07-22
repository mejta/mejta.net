<?php

function p(array $strings) {
    return implode('', array_map(function($string) {
        return '<p>' . $string . '</p>';
    }, $strings));
}

return [
    'copyright' => '&copy; 2017 Daniel Mejta',
    'get-in-touch' => 'Kontaktujte mě',
    'navigation' => [
        'home' => 'Home',
        'developer' => 'Developer',
        'manager' => 'Manager',
        'contact' => 'Kontakt',
    ],
    'lead' => [
        'text' => 'Pokud chcete vytvořit webovou stránku, nebo webovou aplikaci, jsem váš člověk. Od project managementu přes programování po marketingovou kampaň ve spolupráci s dalšími skvělými freelancery',
        'member-of' => 'Členem',
    ],
    'header' => [
        'developer' => [
            'h' => 'Web developer',
            't' => 'Chcete webovou stránku nebo aplikaci?'
        ],
        'manager' => [
            'h' => 'Project Manager',
            't' => 'Chcete zajistit, že váš projekt bude úspěšný?'
        ],
    ],
    'developer' => [
        'heading' => 'Web developer',
        'text' => p([
            'Jsem <strong>full stack web developer</strong> s více než 15 lety zkušeností. Ovládám Javascript, Node.js, CSS, PHP a používám React.js, Vue.js, jQuery, Bootstrap, Laravel, Wordpress, OctoberCMS a spoustu dalších technologií.',
            'Web development není jen o technologiích a vytváření webů.',
        ]),
        'qualities' => [
            'heading' => 'Se mnou Váš web bude:',
            'awesome' => [
                'h' => 'Krásný',
                't' => 'Vaše webová stránka se bude líbit a dobře používat uživatelům. Spolupracuji se skvělými grafiky a UX designéry a společně vytvoříme úspěšný web.'
            ],
            'visible' => [
                'h' => 'Viditelný',
                't' => 'Chcete, aby byl web vidět ve vyhledávačích i na sociálních sítích. Pomůžu vám, aby wáš web byl připraven být nalezen.',
            ],
            'mobile' => [
                'h' => 'Mobilní',
                't' => 'Stále více uživatelů (až 50%) používá web na mobilních zařízeních. Všechny weby, které vytvářím jsou připravené pro mobilní zařízení.',
            ],
            'fast' => [
                'h' => 'Rychlý',
                't' => 'Nemáte rádi čekání při načítání stránky? Já také ne, webové stránky, které vytvořím, jsou rychlé, takže uživatel nebude čekat ani na pomalém mobilním připojení na načtení.',
            ],
            'secure' => [
                'h' => 'Bezpečný',
                't' => 'Bezpečnost webových stránek a aplikací je důležitá pro vás i vaše zákazníky. Váš web bude bezpečný a připravený na <strong>GDPR</strong>, takže se nebudete mít čeho obávat.',
            ],
            'sustainable' => [
                'h' => 'Udržitelný',
                't' => 'Pro mě není webová stránka či aplikace jednorázový projekt. Píšu vždy tak, aby byl web udržovatelný s použitím otevřených technologií a knihoven. Vždy dostanete zdrojové kódy a dokumentaci pro developery.',
            ],
        ],
    ],
    'manager' => [
        'heading' => 'Agile Project Manager',
        'text' => p([
            'Pomáhám zákazníkům vytvořit úspěšné projekty. V posledních 5 letech jako Project manager nebo Scrum Master jsem pomáhal s mnoha projekty pro malé i velké zákazníky z oblasti marketingu, bankovnictví nebo IT. Jsem <strong>Certified Scrum Professional</strong>.',
            'Se spoustou zkušeností z předchozích projektů vám pomůžu se specifikováním požadavků, metodologií projektu a koordinací lidí. Budu vaše spojka s developery a dalšími spolupracovníky.',
            'Zaměřuji se na efektivitu, transparentnost a prioritizaci. Získáte tak velmi rychle nejdůležitější součásti systému a o celém procesu budete mít dokonalý přehled.',
        ]),
        'references' => [
            'heading' => 'Reference',
            '4finance' => [
                'name' => '4finance',
                'position' => 'Scrum Master',
            ],
            'r2development' => [
                'name' => 'R2 Development',
                'position' => 'Scrum Master',
            ],
            'socialbakers' => [
                'name' => 'Socialbakers',
                'position' => 'Scrum Master',
            ],
            'adineo' => [
                'name' => 'Adineo',
                'position' => 'Vedoucí oddělení vývoje',
            ],
        ],
    ],
    'contact' => [
        'contact-me' => 'Kontaktujte mě',
        'write-me' => 'Napište mi',
        'visit-me' => 'Navštivte mě',
        'follow-me' => 'Sledujte mě',
        'text' => 'Potřebujete vytvořit webovou stránku nebo aplikaci? Chcete pomoci s online projektem? Potřebujete poradit? Napište mi.',
        'form' => [
            'message' => 'Zpráva',
            'name' => 'Jméno',
            'phone' => 'Telefon',
            'email' => 'E-mail',
            'budget' => 'Rozpočet',
            'submit' => 'Odeslat',
            'submitting' => 'Odesílám ...',
            'success' => 'Vaše zpráva byla úspěšně odeslána, děkuji.',
        ],
    ],
];
