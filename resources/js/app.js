import './bootstrap';

import Alpine from 'alpinejs';
require('alpinejs');
// window.Alpine = Alpine;


Alpine.start();
import Choices from "choices.js";

// create multi-select element

window.choices = (element) => {
    return new Choices(element, {
          maxItemCount: 4,
          removeItemButton: true,
    });
}
