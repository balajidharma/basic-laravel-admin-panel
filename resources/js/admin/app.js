import './bootstrap';

import Alpine from 'alpinejs';
import { themeChange } from 'theme-change';

window.Alpine = Alpine;

Alpine.start();
themeChange();

var selectedTheme = localStorage.getItem("theme");
if(selectedTheme === 'dark') {
    document.getElementById("theme-change").checked = true;
}