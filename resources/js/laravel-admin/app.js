import './bootstrap';

import { themeChange } from 'theme-change';
import Tagify from '@yaireo/tagify';
import Choices from 'choices.js';

themeChange();
window.Tagify = Tagify;
window.Choices = Choices;

var selectedTheme = localStorage.getItem("theme");
if(selectedTheme === 'dark') {
    document.getElementById("theme-change").checked = true;
}