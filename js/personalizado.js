
document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'es',
        plugins: ['interaction', 'dayGrid'],
        editable: true,
        eventLimit: true,
        events: 'cargar_eventos.php',
        extraParams: function () {
            return {
                cachebuster: new Date().valueOf()
            };
        },
        eventClick: function (info) {
            $("#apagar_evento").attr("href", "borrar_evento.php?id=" + info.event.id);
            info.jsEvent.preventDefault(); // don't let the browser navigate
            console.log(info.event);
            $('#visualizar #id').text(info.event.id);
            $('#visualizar #id').val(info.event.id);
            $('#visualizar #nombre').text(info.event.title);
            $('#visualizar #nombre').val(info.event.title);
            $('#visualizar #apellido').text(info.event.extendedProps.apellido);
            $('#visualizar #apellido').val(info.event.extendedProps.apellido);
            $('#visualizar #empresa').text(info.event.extendedProps.empresa);
            $('#visualizar #empresa').val(info.event.extendedProps.empresa);
            $('#visualizar #telefono').text(info.event.extendedProps.telefono);
            $('#visualizar #telefono').val(info.event.extendedProps.telefono);
            $('#visualizar #motivo_reunion').text(info.event.extendedProps.motivo_reunion);
            $('#visualizar #motivo_reunion').val(info.event.extendedProps.motivo_reunion);
            $('#visualizar #apuntes').text(info.event.extendedProps.apuntes);
            $('#visualizar #apuntes').val(info.event.extendedProps.apuntes);
            $('#visualizar #fecha_reunion').text(info.event.start.toLocaleString());
            $('#visualizar #fecha_reunion').val(info.event.start.toLocaleString());
            $('#visualizar').modal('show');
        },
        selectable: true,
        select: function (info) {
            //alert('Início do evento: ' + info.start.toLocaleString());
            $('#cadastrar #fecha_reunion').val(info.start.toLocaleString());
            // $('#cadastrar #end').val(info.end.toLocaleString());
            $('#cadastrar').modal('show');
        }
    });

    calendar.render();
});

//Mascara para o campo data e hora
function DataHora(evento, objeto) {
    var keypress = (window.event) ? event.keyCode : evento.which;
    campo = eval(objeto);
    if (campo.value == '00/00/0000 00:00:00') {
        campo.value = "";
    }

    caracteres = '0123456789';
    separacao1 = '/';
    separacao2 = ' ';
    separacao3 = ':';
    conjunto1 = 2;
    conjunto2 = 5;
    conjunto3 = 10;
    conjunto4 = 13;
    conjunto5 = 16;
    if ((caracteres.search(String.fromCharCode(keypress)) != -1) && campo.value.length < (19)) {
        if (campo.value.length == conjunto1)
            campo.value = campo.value + separacao1;
        else if (campo.value.length == conjunto2)
            campo.value = campo.value + separacao1;
        else if (campo.value.length == conjunto3)
            campo.value = campo.value + separacao2;
        else if (campo.value.length == conjunto4)
            campo.value = campo.value + separacao3;
        else if (campo.value.length == conjunto5)
            campo.value = campo.value + separacao3;
    } else {
        event.returnValue = false;
    }
}

$(document).ready(function () {
    $("#addevent").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "guardar_evento.php",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (resultado) {
                if (resultado['sit']) {
                    location.reload();
                }
            },
            error: function (resultado) {
                alert("No ha sido posible guardar los datos, revise la fecha y hora")
            }
        })
    });

    $('.btn-canc-vis').on("click", function () {
        $('.visevent').slideToggle();
        $('.formedit').slideToggle();
    });

    $('.btn-canc-edit').on("click", function () {
        $('.formedit').slideToggle();
        $('.visevent').slideToggle();
    });

    $("#editevent").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "editar_evento.php",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (resultado) {
                if (resultado['sit']) {
                    location.reload();
                }
            },
            error: function (resultado) {
                alert("No ha sido posible guardar los datos, revise la fecha y hora")
            }
        })
    });
});