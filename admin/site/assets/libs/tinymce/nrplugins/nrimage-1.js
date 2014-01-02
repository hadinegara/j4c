tinymce.PluginManager.add('nrimage', function(editor) {
    
    function editImage(){
		var win = editor.dom,
            width, height;
        
        // calculate image size
        function recalcSize(e) {
            var widthCtrl, heightCtrl, newWidth, newHeight;

            widthCtrl = win.find('#width')[0];
            heightCtrl = win.find('#height')[0];

            newWidth = widthCtrl.value();
            newHeight = heightCtrl.value();

            if (win.find('#constrain')[0].checked() && width && height && newWidth && newHeight) {
                if (e.control == widthCtrl) {
                    newHeight = Math.round((newWidth / width) * newHeight);
                    heightCtrl.value(newHeight);
                } else {
                    newWidth = Math.round((newHeight / height) * newWidth);
                    widthCtrl.value(newWidth);
                }
            }

            width = newWidth;
            height = newHeight;
        }
        
        editor.windowManager.open({
            title: 'Edit Image',
            height: 250,
            width: 350,
            body: [
                { name: 'src', type: 'filepicker', filetype: 'image', label: 'Source', autofocus: true },
                { name: 'alt', type: 'textbox', label: 'Alt Text' },
                {
                    type: 'container',
                    label: 'Size',
                    layout: 'flex',
                    direction: 'row',
                    align: 'center',
                    spacing: 5,
                    items: [
                        { name: 'width', type: 'textbox', maxLength: 3, size: 3 },
                        { type: 'label', text: 'x' },
                        { name: 'height', type: 'textbox', maxLength: 3, size: 3 },
                        { name: 'constrain', type: 'checkbox', checked: true, text: 'Prop.' }
                    ]
                }
            ],
            onsubmit: function(e){
                console.log(e);
            }
        });
    }
    
    editor.on('dblclick', function(e) {
        var img = '<img src="'+ e.target.src +'" />';
        editor.insertContent(img);
        editor.insertContent(img);
        editor.insertContent(img);
    });
                
    // Add a button that opens a window
    editor.addButton('nrimage', {
        title: 'Insert/ Edit Image',
        icon: "image",
        onclick: function() {
            var sel = editor.selection.getNode();
            
            if(sel.nodeName.toLowerCase() != "img"){
                /* edit image
                 * *******************/
                editImage(editor, tinymce);
            /* end of edit image */
            } else {
                /* insert image
                 * *******************/
                editor.windowManager.open({
                    title: 'Insert Image',
                    url: "popup-image.php",
                    width: 702,
                    height: 303,
                    inline: true,
                    buttons: [{
                        text: 'Insert',
                        subtype: "primary",
                        onclick: function(e){
                            var me = $(e.currentTarget),
                            idoc = me.find("iframe:first").contents() || null,
                            img = idoc.find(".focus:first").html() || null;

                            if(img != null){
                                editor.insertContent(img);
                                editor.windowManager.close();
                            } else {
                                // close window with no action
                                alert("Please select image!");
                            }
                        }
                    }]
                });
            /* end of insert image */
            }
        }
    });
                
});
