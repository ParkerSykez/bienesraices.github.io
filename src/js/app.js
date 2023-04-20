document.addEventListener('DOMContentLoaded', function(){
    EventListeners();
    darkMode();
})


function darkMode(){


    const darkMode = window.matchMedia('(prefers-color-scheme: dark)');
    // console.log(darkMode.matches);

    if(darkMode.matches){
        document.body.classList.add('dark-mode');
    } else{
        document.body.classList.remove('dark-mode');
    }

    darkMode.addEventListener('change', function(){
        if(darkMode.matches){
            document.body.classList.add('dark-mode');
        } else{
            document.body.classList.remove('dark-mode');
        }
    });

    const btnDarkMode = document.querySelector('.dark-mode-btn');

    btnDarkMode.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
    })
}


function EventListeners(){
    const mobile_menu = document.querySelector('.mobile-menu')

    mobile_menu.addEventListener('click', navResponsive)
}

function navResponsive(){
    const navegacion = document.querySelector('.navegacion');
    if(navegacion.classList.contains('mostrar')){
        navegacion.classList.remove('mostrar')
    } else{
        navegacion.classList.add('mostrar')
    }
}