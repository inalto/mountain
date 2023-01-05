import laravel from 'laravel-vite-plugin'
import copy from 'rollup-plugin-copy'
import {defineConfig} from 'vite'

export default defineConfig({
    plugins: [
        laravel(
            {
            input: [
            'resources/css/app.css',
            'resources/js/app.js',
    //        'resources/css/maps.css',
            'resources/js/maps.js',
            ],
           
            }),
	 {
            name: 'blade',
            handleHotUpdate({ file, server }) {
                if (file.endsWith('.blade.php')) {
                    server.ws.send({
                        type: 'full-reload',
                        path: '*',
                    });
                }
            },
        },
	    {
	...copy({
      targets: [
        { src: ['node_modules/@raruto/leaflet-elevaion/src/**/*','node_modules/@raruto/leaflet-elevation/libs/**/*','node_modules/@raruto/leaflet-elevation/images/**/*'], dest: 'public/build' }
      ]
    }),
	    enforce: 'post'
	    }
    ],
});
