var argv = require('yargs').argv;
var deploy = require('ssh2deploy');

var envfile = argv.env ? '.env.' + argv.env : '.env';

require('dotenv').config({
    path: envfile,
});

deploy.connect({
    cwd: process.env.FTP_CWD || '.',
    connect: {
        host: process.env.FTP_SERVER,
        username: process.env.FTP_USER,
        password: process.env.FTP_PASSWORD,
        port: 21,
    },
    exec: {
        pty: true,
    },
})
.then(deploy.copy([
    envfile,
    'app/**',
    'bootstrap/**',
    'config/**',
    'database/**',
    'public/**',
    'resources/**',
    'routes/**',
    'storage/**',
    'artisan',
    'composer.*',
    '*.php',
]))
.then(deploy.exec([
    'mv -f ' + envfile + ' .env',
    'composer install --no-dev --optimize-autoloader',
    'chmod -R 777 bootstrap',
    'chmod -R 777 storage',
    'php artisan down',
    'php artisan config:clear',
    'php artisan cache:clear',
    'php artisan view:clear',
    'php artisan route:clear',
    'php artisan clear-compiled',
    'php artisan migrate --force',
    'php artisan up',
]))
.then(deploy.disconnect())
.catch(function (error) {
    console.error('> ERROR', error);
});
