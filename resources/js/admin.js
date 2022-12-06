
dropDownMenu()
function dropDownMenu(){
    $('.dropdown-menubar').parent().find('.submenu-menubar').toggleClass('hidden')
    $('.dropdown-menubar').find('.arrow').toggleClass('rotate-0').toggleClass('rotate-180')
}



$('.dropdown-menubar').on('click',(e)=>{
    dropDownMenu()
})


function openSidebar() {
    document.querySelector(".sidebar").classList.toggle("hidden");
}

function searchTable() {
    document.querySelector("#searchForm").submit();
}


