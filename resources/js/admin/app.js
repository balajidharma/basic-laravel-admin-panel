import './bootstrap';

import { themeChange } from 'theme-change';

themeChange();

var selectedTheme = localStorage.getItem("theme");
if(selectedTheme === 'dark') {
    document.getElementById("theme-change").checked = true;
}