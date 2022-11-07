import { nodeResolve } from '@rollup/plugin-node-resolve';
import replace from '@rollup/plugin-replace';
import commonjs from '@rollup/plugin-commonjs';
import { terser } from "rollup-plugin-terser";
import css from "rollup-plugin-import-css";

export default [
  {
    input: 'resources/js/fancybox.js',
    output: {
      file: 'public/js/fancybox.js',
      format: 'iife'
    },
    plugins: [nodeResolve()]
  },
  {
    input: 'resources/css/maps/index.js',
    output: {
      file: 'public/js/maps.css',
    },
    plugins: [
      nodeResolve(),
      css()
    ]
  },
  {
    input: 'resources/js/maps.js',
    output: {
      file: 'public/js/maps.js',
      format: 'iife'
    },
    plugins: [
      css(),
      nodeResolve(),
      replace({
        preventAssignment: true,
            "process.env.NODE_ENV": JSON.stringify("development")
        }),
        commonjs({
          
          include: /node_modules/,
          requireReturnsDefault: 'auto', // <---- this solves default issue
        }),
        terser()
      ]
  }

];
