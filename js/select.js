$(document).ready(function(){
    init();

	$("#add_product #scancode").keypress(function(e) {
		//Enter key
		if (e.which == 13) {
			return false;
		}
	});

    function ft_reload(page, type, id) {
                var link = "index.php";
                link += "?page="+page;
                link += "&type="+type;
                link += "&id=" + id;
                window.location = link;

    }

    function ft_reloadCode(page, type, code) {
                var link = "index.php";
                link += "?page="+page;
                link += "&type="+type;
                link += "&code=" + code;
                window.location = link;

    }

    function init()
    {
       $('#panier #action #buy ').mousedown(function(event) {
                var id = $(this)[0].id;
                if (event.which == 1)
                    ft_reload("client", "confirme", id);
                });
      
       $('#panier #action #clear ').mousedown(function(event) {
             if (confirm("Vider le panier ?")) {
                var id = $(this)[0].id;
                if (event.which == 1)
                    ft_reload("client", "clear", id);
            }
                });

       $('#panier .product ').mousedown(function(event) {
                var id = $(this)[0].id;
                if (event.which == 1)
                    ft_reload("client", "cancel", id);
                });

        $('#code').keyup(function(event){
            if(event.keyCode == 13) {
                var code = $(this).val();
                $(this).val('');
                ft_reloadCode("client", "buy", code);
            }
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
});