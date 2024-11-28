//side bar


var sidebarOpen=false;
var sidebar = document.getElementById("sidebar");


function openSidebar(){
    if(!sidebarOpen){
        sidebar.classList.add("sidebar-responsive");
        sidebarOpen=true;
    }
}



function closeSidebar(){
    if(sidebarOpen){
        sidebar.classList.remove("sidebar-responsive");
        sidebarOpen=false;
    }
}



//----------  CHART ---------//



  var chart = new ApexCharts(document.querySelector("#bar-chart"), options);
  chart.render();



  function navigateToPage(url) {
    window.location.href = url; // Redirect to the specified URL
}
