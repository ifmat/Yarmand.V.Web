import { translations } from "./translations.js";

export function setLanguage(lang) {
    document.documentElement.lang = lang;
    document.documentElement.dir = lang === "fa" ? "rtl" : "ltr";

    const elements = document.querySelectorAll("[data-i18n]");

    elements.forEach((el) => {
        const key = el.getAttribute("data-i18n");

        if (translations[lang] && translations[lang][key]) {
            el.textContent = translations[lang][key];
        }
    });

    localStorage.setItem("language", lang);
}
