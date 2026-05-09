import { setLanguage } from "./Multi_language.js";

document.addEventListener("DOMContentLoaded", () => {
    const savedLang = localStorage.getItem("language") || "fa";
    setLanguage(savedLang);

    const faBtn = document.getElementById("btn-fa");
    const enBtn = document.getElementById("btn-en");

    if (faBtn) {
        faBtn.addEventListener("click", () => {
            setLanguage("fa");
        });
    }

    if (enBtn) {
        enBtn.addEventListener("click", () => {
            setLanguage("en");
        });
    }
});
