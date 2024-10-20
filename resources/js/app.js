import './bootstrap.js';
import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.css"; // import Flatpickr styles

document.addEventListener("DOMContentLoaded", function() {
    flatpickr("#datepicker-format", {
        dateFormat: "d-m-Y", // Adjust to your desired format
        // You can add more options here
    });
});
