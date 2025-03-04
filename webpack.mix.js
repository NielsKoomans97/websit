require('dotenv').config();

let mix = require('laravel-mix');

mix.copy('resources/js/app.js', 'public/js');

const packages = [
    {
        'name': 'bootstrap',
        'css': 'node_modules/bootstrap/dist/css/bootstrap.min.css',
        'js': 'node_modules/bootstrap/dist/js/bootstrap.min.js'
    },
    {
        'name': 'bootstrap-icons',
        'css': 'node_modules/bootstrap-icons/font/bootstrap-icons.min.css',
    },
    {
        'name': 'alpinejs',
        'js': [
            'node_modules/alpinejs/dist/cdn.min.js',
            'node_modules/alpinejs/dist/module.esm.min.js',
            'node_modules/alpinejs/dist/module.cjs.js',
        ]
    }
]

packages.forEach(package => {
    if (package['css'] != null && package['css'].length >= 0) {
        if (package['css'] instanceof Array) {
            package['css'].forEach(path => {
                mix.copy(path, `public/css/${package['name']}`);
            });
        }
        else {
            mix.copy(package['css'], 'public/css');
        }
    }

    if (package['js'] != null && package['js'].length >= 0) {
        if (package['js'] instanceof Array) {
            package['js'].forEach(path => {
                mix.copy(path, `public/js/${package['name']}`);
            });
        }
        else {
            mix.copy(package['js'], 'public/js');
        }
    }

    if (package['fontface'] != null && package['fontface'].length >= 0) {
        if (package['fontface'] instanceof Array) {
            package['fontface'].forEach(path => {
                mix.copy(path, `public/css/fonts/${package['name']}`);
            });
        }
        else {
            mix.copy(package['fontface'], 'public/css/fonts');
        }
    }
});

mix.sass('resources/scss/app.scss', 'public/css');

mix.browserSync(process.env.APP_URL);