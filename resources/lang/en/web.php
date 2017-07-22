<?php

function p(array $strings) {
    return implode('', array_map(function($string) {
        return '<p>' . $string . '</p>';
    }, $strings));
}

return [
    'copyright' => '&copy; 2017 Daniel Mejta',
    'get-in-touch' => 'Get in touch',
    'lead' => [
        'text' => 'I’m your #1 contact if you want to create an awesome website or web application. From project management through development to marketing campaigns in cooperation with other great freelancers.',
        'member-of' => 'Member of',
    ],
    'navigation' => [
        'home' => 'Home',
        'developer' => 'Developer',
        'manager' => 'Manager',
        'contact' => 'Contact',
    ],
    'header' => [
        'developer' => [
            'h' => 'Full stack web developer',
            't' => 'Do you want a website or web application?'
        ],
        'manager' => [
            'h' => 'Agile Project Manager',
            't' => 'Do you want to make sure that your project won\'t fail?'
        ],
    ],
    'developer' => [
        'heading' => 'Full stack web developer',
        'text' => p([
            'I’m web developer with 15 years of experience. My languages are Javascript, Node.JS, CSS, PHP and my tools are React.js, jQuery, Bootstrap, Laravel, Wordpress, OctoberCMS, and many others. I’m pretty much geek and I love technologies.',
            'Web development is not only about technologies, and making websites.',
        ]),
        'qualities' => [
            'heading' => 'Your website will be:',
            'awesome' => [
                'h' => 'awesome',
                't' => 'Your website should attract people. I cooperate with great graphic designers and together we can create great user experience you need for your project and your customers.'
            ],
            'visible' => [
                'h' => 'visible',
                't' => 'You want your website popular, right? I can help you with that, so your website is ready to be found.',
            ],
            'mobile' => [
                'h' => 'mobile',
                't' => 'More and more visitors use mobile phones to browse the internet. Actually it’s close to half of users using mobile phones and your website will look awesome also on the small screens of mobile phones and tablets.',
            ],
            'fast' => [
                'h' => 'fast',
                't' => 'More and more visitors use mobile phones to browse the internet. Actually it’s close to half of users using mobile phones and your website will look awesome also on the small screens of mobile phones and tablets.',
            ],
            'secure' => [
                'h' => 'secure',
                't' => 'Security is important for you (you don’t want to have your website compromised), for customers (if you want them share information, you have to make them sure that data are operated securely) and for search engines (secured websites on https appear higher in search results).',
            ],
            'sustainable' => [
                'h' => 'sustainable',
                't' => 'Your website is not one-off. If you want to improve your website after some time, developer should be able to do that easily. By using cutting-edge and modern technologies, great documentation and popular 3rd party components your website will be technologically up-to-date, easily upgradable and any developer can improve your website. And yes, there is no vendor lock.',
            ],
        ],
    ],
    'manager' => [
        'heading' => 'Agile Project Manager',
        'text' => p([
            'I help people to make projects successful. In last 4 years, as a Scrum Master or Project manager, I\'ve done many projects for small and big companies from marketing, commerce, IT or financial sector. I\'m Certified Scrum Professional.',
            'With many project behind I can help you specify your needs and requirements, prepare project methodology that fits your project, coordinate people and be a liaison between business, developers and other parties.',
            'My focus is on efficiency (you want to get as much as possible for your money), transparency (you will see every day what\'s done), and priority (most important things with most value first). All of that leads to great product.',
        ]),
        'references' => [
            'heading' => 'Companies I worked for:',
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
                'position' => 'Head of Development',
            ],
        ],
    ],
    'contact' => [
        'contact-me' => 'Contact me',
        'write-me' => 'Write me',
        'visit-me' => 'Visit me',
        'follow-me' => 'Follow me',
        'text' => 'Do you want to make a website? Do you have a project I can help with? Do you need an advise? Or do you just to say hello? Feel free to do it.',
        'form' => [
            'message' => 'Message',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'budget' => 'Budget',
            'submit' => 'Send',
            'submitting' => 'Sending ...',
            'success' => 'Your message has been successfully sent. Thank you.',
        ],
    ],
];
