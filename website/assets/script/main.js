require('bootstrap/js/src/collapse');
require('../style/main.scss');

document.getElementById("sidebarCollapse").addEventListener("click", function(){
    document.getElementById("sidebar").classList.toggle("active");
});