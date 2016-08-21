        $(document).ready(function() {

            $('a[urlajax]').click(function() {
                $.ajax({
                  url: $(this).attr('urlajax'),
                })
                  .done(function( html ) {
                    $.fancybox( html, {});
                  });   
            });

        });
//# sourceMappingURL=main.js.map
