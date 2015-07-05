
function init() {
    $('#accept').mousedown(function (event) {
        if (event.which == 1) {
            var prixPayer = $('#payer')[0].value;
            if (confirm(prixTotal + " - " + prixPayer + " = " + ((prixTotal - prixPayer)))) {
                 // 6.1 - 10.00 = -3.9000000000000004
                 // Merci js !!
                ft_reload('valideEnd', '', '');
            }
        }
    });
}
