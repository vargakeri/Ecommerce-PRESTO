<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>{{ $title ?? config('app.name') }}</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/java.js', 'resources/css/style.css'])
    @livewireStyles
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
     	integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        	crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    
    <x-navbar></x-navbar>

    <x-delete></x-delete>
    <x-warning></x-warning>

    {{ $slot }}
    @livewireScripts


    <script>
        {{$script ?? ''}}
        setTimeout(function() {
            document.getElementById('successMessage').style.opacity = '0';
            setTimeout(function() {
                document.getElementById('successMessage').style.display = 'none';
            }, 1000); // Rimuove il messaggio di successo dopo la transizione
        }, 1500); // Nasconde il messaggio di successo dopo 5 secondi

        setTimeout(function() {
            document.getElementById('errorMessage').style.opacity = '0';
            setTimeout(function() {
                document.getElementById('errorMessage').style.display = 'none';
            }, 1000); // Rimuove il messaggio di errore dopo la transizione
        }, 1500); // Nasconde il messaggio di errore dopo 5 secondi

        const thumbnails = document.querySelectorAll('.carousel__thumbnails');
        thumbnails.forEach(thumbnail => {
            const announcementId = thumbnail.getAttribute('data-announcement-id');
            const radioButtons = document.querySelectorAll(`input[name="slides${announcementId}"]`);

            thumbnail.addEventListener('click', (event) => {
                if (event.target.tagName === 'LABEL') {
                    const targetId = event.target.getAttribute('for');
                    const radioBtn = document.getElementById(targetId);
                    radioBtn.checked = true;
                }
            });
        });


        const categories = [{
                name: "Gioielli",
                image: "{{ Storage::url('/Imagini/Gioielli.jpg') }}",
                gradient: "linear-gradient(90deg, rgba(177, 137, 85, 1) 10%, rgba(180, 161, 138, 1) 100%)"
            },
            {
                name: "Donna",
                image: "{{ Storage::url('/Imagini/Donna.jpg') }}",
                gradient: "linear-gradient(90deg, rgba(168,101,88,1) 10%, rgba(194,136,124,1) 100%)"
            },
            {
                name: "Tech",
                image: "{{ Storage::url('/Imagini/Tech.jpg') }}",
                gradient: "linear-gradient(90deg, rgba(24,23,23,1) 10%, rgba(64,64,64,1) 100%)"
            },
            {
                name: "Uomo",
                image: "{{ Storage::url('/Imagini/Uomo.jpg') }}",
                gradient: "linear-gradient(to right, #141e30, #243b55)"
            },
            {
                name: "Giochi",
                image: "{{ Storage::url('/Imagini/Giochi.jpg') }}",
                gradient: "linear-gradient(to right, #200122, #6f0000)"
            },
            {
                name: "Sport",
                image: "{{ Storage::url('/Imagini/Sport.jpg') }}",
                gradient: "linear-gradient(to right, #093028, #237a57)"
            },
            {
                name: "Auto",
                image: "{{ Storage::url('/Imagini/Auto.jpg') }}",
                gradient: "linear-gradient(90deg, rgba(63,23,23,1) 50%, rgba(108,62,62,1) 100%)"
            },
            {
                name: "Orologio",
                image: "{{ Storage::url('/Imagini/Orologio.jpg') }}",
                gradient: "linear-gradient(to right, #1d4350, #a43931)"
            },
            {
                name: "Film",
                image: "{{ Storage::url('/Imagini/Film.jpg') }}",
                gradient: "linear-gradient(to right, #cb2d3e, #ef473a)"
            },
            {
                name: "Musica",
                image: "{{ Storage::url('/Imagini/Musica.jpg') }}",
                gradient: "linear-gradient(to right, #403a3e, #be5869)"
            }
        ];


        @php
            $category = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'];
        @endphp

        function GioielliLink() {
            var link = document.getElementById('frecciaHref');
            link.href = '{{ route('categoryShow', ['category' => $category[0]]) }}';
            link.innerHTML = ' <i style="padding-left: 50px;" class="bi bi-arrow-right-circle"></i>';
        }

        function DonnaLink() {
            var link = document.getElementById('frecciaHref');
            link.href = '{{ route('categoryShow', ['category' => $category[1]]) }}';
            link.innerHTML = ' <i style="padding-left: 50px;" class="bi bi-arrow-right-circle"></i>';
        }

        function TechLink() {
            var link = document.getElementById('frecciaHref');
            link.href = '{{ route('categoryShow', ['category' => $category[2]]) }}';
            link.innerHTML = ' <i style="padding-left: 50px;" class="bi bi-arrow-right-circle"></i>';
        }


        function UomoLink() {
            var link = document.getElementById('frecciaHref');
            link.href = '{{ route('categoryShow', ['category' => $category[3]]) }}';
            link.innerHTML = ' <i style="padding-left: 50px;" class="bi bi-arrow-right-circle"></i>';
        }

        function GiochiLink() {
            var link = document.getElementById('frecciaHref');
            link.href = '{{ route('categoryShow', ['category' => $category[4]]) }}';
            link.innerHTML = ' <i style="padding-left: 50px;" class="bi bi-arrow-right-circle"></i>';
        }

        function SportLink() {
            var link = document.getElementById('frecciaHref');
            link.href = '{{ route('categoryShow', ['category' => $category[5]]) }}';
            link.innerHTML = ' <i style="padding-left: 50px;" class="bi bi-arrow-right-circle"></i>';
        }

        function AutoLink() {
            var link = document.getElementById('frecciaHref');
            link.href = '{{ route('categoryShow', ['category' => $category[6]]) }}';
            link.innerHTML = ' <i style="padding-left: 50px;" class="bi bi-arrow-right-circle"></i>';
        }

        function OrologioLink() {
            var link = document.getElementById('frecciaHref');
            link.href = '{{ route('categoryShow', ['category' => $category[7]]) }}';
            link.innerHTML = ' <i style="padding-left: 50px;" class="bi bi-arrow-right-circle"></i>';
        }

        function FilmLink() {
            var link = document.getElementById('frecciaHref');
            link.href = '{{ route('categoryShow', ['category' => $category[8]]) }}';
            link.innerHTML = ' <i style="padding-left: 50px;" class="bi bi-arrow-right-circle"></i>';
        }

        function MusicaLink() {
            var link = document.getElementById('frecciaHref');
            link.href = '{{ route('categoryShow', ['category' => $category[9]]) }}';
            link.innerHTML = ' <i style="padding-left: 50px;" class="bi bi-arrow-right-circle"></i>';
        }


        function decreaseQuantity() {
            var quantityInput = document.getElementById('quantityInput');
            var currentQuantity = parseInt(quantityInput.value);

            if (currentQuantity > 1) {
                quantityInput.value = currentQuantity - 1;
            }
        }

        function increaseQuantity() {
            var quantityInput = document.getElementById('quantityInput');
            var currentQuantity = parseInt(quantityInput.value);

            quantityInput.value = currentQuantity + 1;
        }

        const toggleHeart = document.getElementById('toggleHeart');
        const heartIcon = document.getElementById('AggiuntaPreferiti');
        const message = document.getElementById('message');

        toggleHeart.addEventListener('click', function() {
            if (heartIcon.classList.contains('bi-heart')) {
                heartIcon.classList.remove('bi-heart');
                heartIcon.classList.add('bi-heart-fill');
                heartIcon.style.color = 'red';

                message.style.display = 'block';
                setTimeout(function() {
                    message.style.opacity = '0';
                    setTimeout(function() {
                        message.style.display = 'none';
                        message.style.opacity = '1';
                    }, 1000);
                }, 2000);
            } else {
                heartIcon.classList.remove('bi-heart-fill');
                heartIcon.classList.add('bi-heart');
                heartIcon.style.color = '#ffffff';

                message.style.display = 'block';
                setTimeout(function() {
                    message.style.opacity = '0';
                    setTimeout(function() {
                        message.style.display = 'none';
                        message.style.opacity = '1';
                    }, 1000);
                }, 2000);
            }
        });

        function mostraContenuto(sezione) {
            document.querySelectorAll('.boxContent').forEach(element => {
                element.style.display = 'none';
            });
            document.querySelector(`.box${sezione}`).style.display = 'block';
        }




  function color(elementId) {
            var elements = document.querySelectorAll('.infoPers, .myArticle, .myMessage, .setInfoPers');

            elements.forEach(function(element) {
                if (element.id === elementId) {
                    element.style.color = '#6b6b6b';
                } else {
                    element.style.color = '#e9e9e9';
                }
            });
        }

        function togglePassword(button) {
            var passwordInput = document.getElementById('passwordInput');
            var eyeIcon = document.getElementById('eyeIcon');
            var password = passwordInput.getAttribute('data-password');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordInput.value = password;
                eyeIcon.classList.remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash');
                button.style.backgroundColor = '#ffffff'; // Cambia il colore di sfondo a bianco
                button.style.border = '1px solid #2c2c2c'; // Cambia il colore del bordo a grigio scuro
            } else {
                passwordInput.type = 'password';
                passwordInput.value = '';
                eyeIcon.classList.remove('bi-eye-slash');
                eyeIcon.classList.add('bi-eye');
                button.style.backgroundColor = '#2c2c2c'; // Cambia il colore di sfondo a grigio scuro
                button.style.border = '1px solid #ffffff'; // Cambia il colore del bordo a bianco
            }
        }



    
    

    function toggleDisplayFlex() {
    var menuMobileBox = document.getElementById("MenuMobileBox");
    if (menuMobileBox.style.display === "none") {
        menuMobileBox.style.display = "flex";
    } else {
        menuMobileBox.style.display = "none";
    }
}


function Esc() {
    var menuMobileBox = document.getElementById("MenuMobileBox");
    if (menuMobileBox.style.display === "flex") {
        menuMobileBox.style.display = "none";
    } else {
        menuMobileBox.style.display = "flex";
    }
}








    </script>
  

<script>



$(document).ready(function() {
    $('#submitForms').click(function() {
        var formData1 = $('#form1').serialize();
        var formData2 = $('#form2').serialize();

        var request1 = $.ajax({
            type: 'PUT',
            url: '/user/profile-information',
            data: formData1
        });

        var request2 = $.ajax({
            type: 'POST',
            url: '{{ route('number-upload') }}',
            data: formData2
        });

        $.when(request1, request2)
            .done(function(response1, response2) {
                console.log('Form 1 inviato con successo:', response1);
                console.log('Form 2 inviato con successo:', response2);
                alert('Entrambi i form sono stati inviati con successo!');
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                console.error('Si è verificato un errore durante l\'invio dei form:', errorThrown);
            });
    });
});



</script>
  

</body>

</html>
