window.Popper = require("popper.js").default;
window.$ = window.jQuery = require("jquery");


import 'bootstrap'

require("./bootstrap");

windows.axios = require("axios")
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

require("./components/spp/Pembayaran");
require("./components/Pembayaran");
require("./components/Example");