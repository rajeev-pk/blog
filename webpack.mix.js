const mix = require('laravel-mix');
	mix.js('assets/js/app.js', 'public/build')
		.sass('assets/scss/main.scss', 'public/build')
