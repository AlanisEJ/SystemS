        var hora = new Date().getHours();
        var fondoHTML = document.querySelector('body');
        // Aplicar diferentes fondos según la hora del día
        if (hora >= 6 && hora < 12) {
            fondoHTML.style.backgroundImage = "linear-gradient(to left bottom, #abd1e8, #a7c2eb, #b5aee4, #cc97cf, #de80ab, #d16f95, #c45f7f, #b64f6a, #943f66, #70315e, #4c2551, #2a1a41)";
            document.getElementById('mensajeSaludo').textContent = '¡Buenos días!';
        } else if (hora >= 12 && hora < 20) {
            fondoHTML.style.backgroundImage = "linear-gradient(to left bottom, #ffc300, #fea402, #f88415, #ee6423, #e0432e, #d22e38, #c1193f, #ae0044, #990649, #830f4b, #6d1549, #571845)";
            document.getElementById('mensajeSaludo').textContent = '¡Buenas tardes!';
        } else {
            fondoHTML.style.backgroundImage = "linear-gradient(200deg, hsla(181, 60%, 51%, 1) 12%, hsla(339, 74%, 46%, 1) 41%, hsla(205, 28%, 18%, 1) 74%)"
            document.getElementById('mensajeSaludo').textContent = '¡Buenas noches!';
        }

        