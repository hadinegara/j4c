tinymce.PluginManager.add('nrimage', function(editor) {
	function getImageSize(url, callback) {
		var img = new Image();

		function done(width, height) {
			img.parentNode.removeChild(img);
			callback({width: width, height: height});
		}

		img.onload = function() {
			done(img.clientWidth, img.clientHeight);
		};

		img.onerror = function() {
			done();
		};

		img.src = url;

		var style = img.style;
		style.visibility = 'hidden';
		style.position = 'fixed';
		style.bottom = style.left = 0;
		style.width = style.height = 'auto';

		document.body.appendChild(img);
	}
    
    function getImageSrc(tag){
        var regex = /<img.*?src=['"](.*?)['"]/gi;
        return regex.exec(tag)[1];
    }
    
    function openImageGallery(placement, el){
        var place = placement || 'editor';
        
        editor.windowManager.open({
            title: 'Insert Image',
            url: App.base_url +"mce/popup/image",
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
                        if(place == 'editor'){
                            editor.insertContent(img);
                        } else {
                            el.value(getImageSrc(img));
                            setTimeout(function(){
                                document.getElementById(el[0]._id).focus();
                            }, 100);
                        }
                        
                        // close window
                        editor.windowManager.close();
                    } else {
                        editor.windowManager.alert("Please select image!");
                    }
                }
            },{
                text: 'Cancel',
                onclick: 'close'
            }]
        });
    }
    
    function openImageEditor(){
		var win, data, dom = editor.dom, imgElm = editor.selection.getNode();
		var width, height, imageListCtrl, newImgElm;
        
        function updateSize(){
			getImageSize(this.value(), function(data) {
				if (data.width && data.height) {
					width = data.width;
					height = data.height;

					win.find('#width').value(width);
					win.find('#height').value(height);
				}
			});            
        }
        
        function recalcSize(e){
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
        
        function getImgInfo(atr){
            var atr_name = atr.toLowerCase() || false,
                atr_value = $(imgElm).attr(atr_name);
            
            if(typeof atr_value == "undefined"){
                var $img = $(imgElm);
                if(atr_name=="width" || atr_name=="height"){
                    atr_value = parseInt($img[0][atr_name]);
                } else if(atr_name=="style") {
                    atr_value = "";
                    if($img[0][atr_name].length > 0){
                        for(var k in $img[0][atr_name]){
                            atr_value += $img[0][atr_name][k]+";";
                        }
                    }                    
                } else {
                    atr_value = "";
                }
            }
            
            return atr_value+"";
        }
        
        function validateStyle(raw_style){
            if(raw_style != null && raw_style.indexOf(";") != -1){
                var styles = raw_style.split(";"),
                    $ele = $('<div>'),
                    item;

                for(var i=0; i<styles.length; i++){
                    if(styles[i].indexOf(":") != -1){
                        item = styles[i].split(":");
                        $ele.css($.trim([item[0]]), $.trim(item[1]));
                    }
                }

                var result = $ele[0].style.cssText || raw_style;
                return result;
            } else {
                return "";
            }
        }
        
        // submit form
        function submitForm(e){
            function waitLoad(imgElm) {
                function selectImage() {
                    imgElm.onload = imgElm.onerror = null;
                    editor.selection.select(imgElm);
                    editor.nodeChanged();
                }

                imgElm.onload = function() {
                    if (!data.width && !data.height) {
                        dom.setAttribs(imgElm, {
                            width: imgElm.clientWidth,
                            height: imgElm.clientHeight
                        });
                    }
                    selectImage();
                };
                imgElm.onerror = selectImage;
            }

            var data = win.toJSON();
            
            if (data.align === '') {
                data.align = null;
            }

            if (data.width === '') {
                data.width = null;
            }

            if (data.height === '') {
                data.height = null;
            }

            if (data.style === '') {
                data.style = null;
            }

            data = {
                align: data.align,
                src: data.src,
                alt: data.alt,
                width: data.width,
                height: data.height,
                style: validateStyle(data.style)
            };
            
            if (! newImgElm) {
                data.id = '__mcenew';
                editor.insertContent(dom.createHTML('img', data));
                newImgElm = dom.get('__mcenew');
                dom.setAttrib(newImgElm, 'id', null);
            } else {
                dom.setAttribs(newImgElm, data);
            }
            waitLoad(newImgElm);
        }
        
        // alignment
        var sel_alignment = function(){
                var val = getImgInfo('align'),
                    opt = [['', ''], ['top', 'Top'], ['middle', 'Middle'], ['bottom', 'Bottom'], ['left', 'Left'], ['right', 'Right']],
                    tpl = '',
                    sel = '';

                for(var i=0; i<opt.length; i++){
                    sel = (opt[i][0] == val) ? 'selected="selected"' : '';
                    tpl += '<option '+ sel +' value="'+ opt[i][0] +'">'+ opt[i][1] +'</option>';
                }

                tpl = '<select style="border-color:#CCC;" class="mce-menu" onchange="tinymce.activeEditor.windowManager.windows[0].find(\'#align\').value(this.value)">'+
                      tpl +
                      '</select>';
                return tpl;
            };
        
        // tab
        var tab_general = {
                title: 'General',
                type: 'form',
                items: [
                    {
                        type: 'label',
                        label: 'Source'
                    },
                    {
                        type: 'form',
                        layout: 'grid',
                        padding: 0,
                        columns: 2,
                        items: [
                            {name: 'src', type: 'textbox', value: getImgInfo('src'), label: false, onchange: updateSize},
                            {type: 'button', icon: 'browse', onclick: function(){
                                openImageGallery('textbox', win.find('#src'));
                            }}
                        ]
                    },
                    {
                        type: 'textbox',
                        name: 'alt',
                        label: 'Alt Text',
                        value: getImgInfo('alt')
                    },
                    {
                        type: 'container',
                        label: 'Alignment',
                        html: sel_alignment()
                    },
                    {
                        type: 'container',
                        layout: 'flex',
                        direction: 'row',
                        padding: 0,
                        spacing: 5,
                        align: 'center',
                        label: 'Size',
                        items: [
                            {name: 'width', type: 'textbox', value: getImgInfo('width'), onchange: recalcSize, size: 3},
                            {type:'label', text: 'x'},
                            {name: 'height', type: 'textbox', value: getImgInfo('height'), onchange: recalcSize, size: 3},
                            {name: 'constrain', type: 'checkbox', checked: true, text: 'Prop.'},
                        ]
                    },
                    {
                        type: 'textbox',
                        hidden: true,
                        name: 'align',
                        value: getImgInfo('align')
                    }
                ]
            };
        
        var tab_advanced = {
                title: 'Advanced',
                type: 'form',
                items: [
                    {name: 'style', type: 'textbox', multiline: true, style:'height:100px;', label: 'Styles', value: getImgInfo('style')}
                ]            
            };
        
        // imgElm size
        width = getImgInfo('width');
        height = getImgInfo('height');
        
        // define window
        win = editor.windowManager.open({
            title: 'Edit Image',
            bodyType: 'tabpanel',
            body: [tab_general, tab_advanced],
            onSubmit: submitForm
        });
    }
    
    function showDialog(){
        var sel = editor.selection.getNode();

        if(sel.nodeName.toLowerCase() == "img"){
            // edit image
            openImageEditor();
        } else {
            // insert image
            openImageGallery();
        }
    }

    // Master Button
    editor.addButton("nrimage", {
        title: 'Insert/ Edit Image',
        icon: "image",
        onclick: showDialog
    });
    
    // Editor Double Click
    editor.on('dblclick', function(e){
        if(e.target.nodeName == "IMG"){
            openImageEditor();
        }
    });
    
});
