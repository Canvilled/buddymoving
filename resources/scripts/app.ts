
import Main from "@scripts/main";

/**
 * Application entrypoint
 */
document.addEventListener('DOMContentLoaded', () => {
  console.log('Huy')
  new Main();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
//@ts-ignore
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
