// Add this in a TypeScript declaration file (e.g., globals.d.ts)

interface Window {
  elementorFrontend: typeof elementorFrontend;
  elementor: typeof elementor;
}

// Declare it as a global constant as well
declare const elementorFrontend: any;

declare const elementor: any;

declare const TW_PREFIX: string;

declare const polylangData: {
  currentLang: string;
};
