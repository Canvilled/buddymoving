
import Main from "@scripts/main";

/**
 * Application entrypoint
 */
document.addEventListener('DOMContentLoaded', () => {
  new Main();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
//@ts-ignore
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
