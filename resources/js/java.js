    // Open/Close 
    window.OpenLogin = function OpenLogin() {
        document.getElementById("RegistrazioneUtente").style.display = "flex";
    };

    window.CloseLogin= function CloseLogin() {
        document.getElementById("RegistrazioneUtente").style.display = "none";
    };
    


    // Login/Register 
    const signUpButton = document.getElementById("signUp");
    const signInButton = document.getElementById("signIn");
    const containerKER = document.getElementById("Kericontainer");


// Funzione select category
    signUpButton.addEventListener("click", () => {
containerKER.classList.add("right-panel-active");
});

signInButton.addEventListener("click", () => {
containerKER.classList.remove("right-panel-active");
});

    
    // Funzione cambia colore/imagine
function changeCategory(name, image, gradient) {
    const elements = ["Gioielli", "Donna", "Tech", "Uomo", "Giochi", "Sport", "Auto", "Orologio", "Film", "Musica"];
    elements.forEach(element => document.getElementById(element).style.color = element === name ? "#ffffff" : "#ebeaea8d");
    document.getElementById("ImagineContainerCategory").style.backgroundImage = `url(${image})`;
    document.getElementById("SfondoCategorie").style.background = gradient;
    document.getElementById("BoxContatti").style.background = gradient;
}

categories.forEach(category => window[category.name] = () => changeCategory(category.name, category.image, category.gradient));
//

