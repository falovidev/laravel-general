var currentModal = null; // Variable para rastrear el modal actualmente abierto

function activateModalPoster() {
    // Listener para cada SVG específico
    document.querySelectorAll(".icon_menu_points").forEach(function (svg) {

        svg.addEventListener("click", function (event) {
            event.stopPropagation(); // Evitar que el clic se propague y cierre el modal inmediatamente

            // Ocultar el modal anterior si está abierto
            if (currentModal) {
                currentModal.style.opacity = "0";
            }

            // Obtener el modal específico
            var modal_home_nmenu = document.getElementById(
                "modal_home_nmenu_" + this.id.split("_").pop()
            );

            modal_home_nmenu.style.opacity = "1";
            modal_home_nmenu.style.left = 94 + "%";
            modal_home_nmenu.style.top = -68 + "%";
            modal_home_nmenu.style.pointerEvents = "all";

            // Actualizar la referencia al modal actual
            currentModal = modal_home_nmenu;
        });
    });

    // Cerrar cualquier modal cuando se hace clic en cualquier otro lugar de la página
    document.addEventListener("click", function (event) {
        if (currentModal && !currentModal.contains(event.target)) {
            //
            currentModal.style.opacity = "0";
            currentModal = null; // Reiniciar la referencia al modal actual
        }
    });

    document
        .querySelectorAll(".menu_option.addStuff")
        .forEach(function (option) {
            option.addEventListener("click", function (event) {
                event.stopPropagation();

                const videoId = this.closest(".video")
                    .querySelector("svg")
                    .id.split("_")
                    .pop();

                addStuff(videoId);
            });
        });

    document
        .querySelectorAll(".menu_option.removeStuff")
        .forEach(function (option) {
            option.addEventListener("click", function (event) {
                event.stopPropagation();

                const videoId = this.closest(".video")
                    ?.querySelector("svg")
                    .id.split("_")
                    .pop();

                removeVideoFromList(videoId);
            });
        });
}

function activateModalStuff() {
    // Listener para cada SVG específico
    document.querySelectorAll(".icon_menu_points.stuff").forEach(function (svg) {
        svg.addEventListener("click", function (event) {
            event.stopPropagation(); // Evitar que el clic se propague y cierre el modal inmediatamente

            // Ocultar el modal anterior si está abierto
            if (currentModal) {
                currentModal.style.opacity = "0";
            }

            // Obtener el modal específico
            var modal_home_nmenu = document.getElementById(
                "modal_home_nmenu_" + this.id.split("_").pop()
            );

            modal_home_nmenu.style.opacity = "1";
            modal_home_nmenu.style.left = 94 + "%";
            modal_home_nmenu.style.top = -48 + "%";
            modal_home_nmenu.style.pointerEvents = "all";

            // Actualizar la referencia al modal actual
            currentModal = modal_home_nmenu;
        });
    });

    // Cerrar cualquier modal cuando se hace clic en cualquier otro lugar de la página
    document.addEventListener("click", function (event) {
        if (currentModal && !currentModal.contains(event.target)) {
            //
            currentModal.style.opacity = "0";
            currentModal = null; // Reiniciar la referencia al modal actual
        }
    });



    document
        .querySelectorAll(".menu_option.removeStuff")
        .forEach(function (option) {
            option.addEventListener("click", function (event) {
                event.stopPropagation();

                const videoId = this.closest(".video__stuff")
                    .querySelector("svg")
                    .id.split("_")
                    .pop();


                    console.log(videoId);
                removeVideoFromListStuff(videoId);
            });
        });
}

function activateModalContinueWatching() {
    document.querySelectorAll(".icon_menu_points.cw").forEach(function (svg) {
        svg.addEventListener("click", function (event) {
            event.stopPropagation(); // Evitar que el clic se propague y cierre el modal inmediatamente

            // Ocultar el modal anterior si está abierto
            if (currentModal) {
                currentModal.style.opacity = "0";
            }

            var modal_home_nmenu = document.getElementById(
                "modal_home_nmenu_cw_" + this.id.split("_").pop()
            );

            modal_home_nmenu.style.opacity = "1";
            modal_home_nmenu.style.left = 94 + "%";
            modal_home_nmenu.style.top = 12 + "%";
            modal_home_nmenu.style.pointerEvents = "all";

            currentModal = modal_home_nmenu;
        });
    });

    document
        .querySelectorAll(".menu_option.removeContinueWatching")
        .forEach(function (option) {
            option.addEventListener("click", function (event) {
                event.stopPropagation();

                const videoId = this.closest(".video")
                    .querySelector("svg")
                    .id.split("_")
                    .pop();

                removeContinueWatching(videoId);
            });
        });
}

function activateJs(params) {
    activateModalPoster();
    activateModalContinueWatching();
    activateModalStuff();
}

activateJs();
