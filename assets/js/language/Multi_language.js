import { translations } from "./translations.js";

export function setLanguage(lang) {
    document.documentElement.lang = lang;
    document.documentElement.dir = lang === "fa" ? "rtl" : "ltr";

    const elements = document.querySelectorAll("[Multi_Lang]");

    elements.forEach((el) => {
        const key = el.getAttribute("Multi_Lang");

        if (translations[lang] && translations[lang][key]) {
            el.textContent = translations[lang][key];
        }
    });

    localStorage.setItem("language", lang);
}
