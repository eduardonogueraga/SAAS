import './bootstrap';
import Alpine from 'alpinejs';
import flatpickr from "flatpickr";

flatpickr.l10ns.default.firstDayOfWeek = 1; // Monday
flatpickr.localize(flatpickr.l10ns.es);
import {es as Es} from 'flatpickr/dist/l10n/es.js';
flatpickr.localize(Es);

flatpickr(".selector", {
    dateFormat: "d-m-Y"
});

window.Alpine = Alpine;


Alpine.start();
