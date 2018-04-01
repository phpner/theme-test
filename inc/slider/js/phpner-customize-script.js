( function( $ ) {
    $(window).load(function(){
        var begin_attachment_string = $("#images-input").val();
        var begin_attachment_array = begin_attachment_string.split(",");

        for(var i = 0; i < begin_attachment_array.length; i++){
            if(begin_attachment_array[i] != ""){
                $(".images").append( "<li class='image-list'><img src='"+begin_attachment_array[i]+"'></li>" );
            }
        }

        wp.api.loadPromise.done( function() {
            var pa = new  wp.api.models.Post({ 'id':1});
            console.log(pa.fetch());


        });

        $(".button-secondary.upload").click(function(){

            var custom_uploader = wp.media.frames.file_frame = wp.media({
                frame: 'select',
                title: 'Добавить фото в слайдер',
                button: {
                    text: 'добавить в слайдер'
                },  multiple: false
            });


            custom_uploader.on('select', function() {

                var selection = custom_uploader.state().get('selection');
                var attachments = [];
                selection.map( function( attachment ) {
                    attachment = attachment.toJSON();
                    $(".images").append( "<li class='image-list'><img src='"+attachment.url+"'><span class='delleteImg'></span></li>" );
                    attachments.push(attachment.url);

                    console.log(attachments);
                    //
                });
                var attachment_string = attachments.join() + "," + $('#images-input').val();
                $('#images-input').val(attachment_string).trigger('change');
            });
            custom_uploader.open();
        });

        $(document).on('click','.image-list',function(){
            var img_src = $(event.target).find("img").attr('src');
            $(event.target).closest("li").remove();
            var attachment_string = $('#images-input').val();
            attachment_string = attachment_string.replace(img_src+",", "");
            $('#images-input').val(attachment_string).trigger('change');
        });
    });

} )( jQuery );