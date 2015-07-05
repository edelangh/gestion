
function init()
{
   $('#list #action #buy ').mousedown(function(event) {
            var id = $(this)[0].id;
            if (event.which == 1)
                ft_reload("client", "confirme", "&id="+id);
            });
  
   $('#list #action #clear ').mousedown(function(event) {
            var id = $(this)[0].id;
            if (event.which == 1)
                ft_reload("client", "clear", "&id="+id);
            });
  
   $('#list .produit ').mousedown(function(event) {
            var id = $(this)[0].id;
            if (event.which == 1)
                ft_reload("client", "cancel", "&id="+id);
            });
  
    $('#buy_zone .produit ').mousedown(function(event) {
            var id = $(this)[0].id;
            if (event.which == 1)
                ft_reload("client", "buy", "&id="+id);
            });
    $('#buy_zone .categorie ').mousedown(function(event) {
            var id = $(this)[0].id;
            if (event.which == 1)
                ft_reload("client", "categorie", "&id="+id);
            });
}
