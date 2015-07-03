
function ft_reload(page, type, id) {
            var link = "index.php";
            link += "?page="+page;
            link += "&type="+type;
            link += "&id=" + id;
            window.location = link;

}

function init()
{
   $('#list #action #buy ').mousedown(function(event) {
            var id = $(this)[0].id;
            if (event.which == 1)
                ft_reload("client", "confirme", id);
            });
  
   $('#list #action #clear ').mousedown(function(event) {
            var id = $(this)[0].id;
            if (event.which == 1)
                ft_reload("client", "clear", id);
            });
  
   $('#list .produit ').mousedown(function(event) {
            var id = $(this)[0].id;
            if (event.which == 1)
                ft_reload("client", "cancel", id);
            });
  
    $('#buy_zone .produit ').mousedown(function(event) {
            var id = $(this)[0].id;
            if (event.which == 1)
                ft_reload("client", "buy", id);
            });
    $('#buy_zone .categorie ').mousedown(function(event) {
            var id = $(this)[0].id;
            if (event.which == 1)
                ft_reload("client", "categorie", id);
            });
}
