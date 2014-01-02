<!DOCTYPE html>
<html>
    <head>
        <title>Popup Image</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>libs/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>libs/bootstrap/css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>libs/bootstrap/css/todc-bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>libs/font-awesome/css/font-awesome.min.css" />
        
        <!--[if IE]>
        <link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>libs/font-awesome/css/font-awesome-ie7.min.css" />    
        <script type="text/javascript" src="<?php echo assets_url(); ?>libs/bootstrap/js/html5shiv.js"></script>
        <![endif]-->
        
        <link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>libs/dropzone/basic-nr.css" />
        <style type="text/css">
            .popup-image {
                margin: 0 !important;
                padding: 0 !important;
            }
            .scrollable::-webkit-scrollbar,
            .scrollable::-webkit-scrollbar-thumb:vertical,
            .scrollable::-webkit-scrollbar-thumb:horizontal {
                width:8px;
                border-radius: 4px;
                -webkit-box-shadow: none;
                -moz-box-shadow: none;
                box-shadow: none;
            }
            
            .list {
                padding: 5px;
            }
            .list .item {
                border: none;
                float: left;
                margin: 10px;
            }
            .list .item a {
                display: block;
                background-color: #EEE;
                border: 1px solid #EEE;
                width:95px;
                height:95px;
                line-height: 93px;
                padding: 3px;
                border-radius: 3px;
                text-align: center;
            }
            .list .item a img {
                max-height: 95px;
                max-width: 95px;
            }
            .list .item a:hover {
                border-color: #DDD;
            }
            .list .item a:focus, .list .item a.focus, 
            .list .item a:active, .list .item a.active {
                border-color: #CCC;
                background-color: #DDD;
            }
        </style>        
    </head>
    <body class="popup-image">
        <div style="border-top:1px solid #CCC;width:700px;height:300px;overflow:hidden;">
            <div class="pull-left" style="width:200px;border-right:1px solid #CCC;margin-right:-1px;">
                <div>
                    <ul class="nav nav-list">
                        <li class="nav-header">Image Gallery</li>
                        <li class="<?php echo (@$_GET['q']=='upload'?'':'active'); ?>"><a href="<?php echo base_url('mce/popup/image'); ?>">My Images</a></li>
                        <li class="<?php echo (@$_GET['q']=='upload'?'active':''); ?>"><a href="<?php echo base_url('mce/popup/image?q=upload'); ?>">Upload</a></li>
                    </ul>
                </div>
            </div>
            <div class="pull-right" style="width:500px;min-height:300px;border-left:1px solid #CCC;margin-right:-1px;">
                
                <?php if(! isset($_GET['q'])): ?>
                
                    <div class="scrollable" style="height:300px;overflow-x:auto;margin-right:1px;">
                        <div class="list">
                            <?php 
                            // read folder
                            $opendir = opendir($gallery_path);
                            $allowed = array('jpg','png','gif');
                            while($file = readdir($opendir))
                            {
                                $ext = substr($file, strrpos($file,'.')+1);
                                $src = base_url("assets/images/blog/{$file}");
                                if(! in_array(strtolower($ext), $allowed)) continue;
                                ?>
                                <div class="item">
                                    <a class="mce-trigger" href="javascript:void(0);">
                                        <img src="<?php echo $src; ?>" />
                                    </a>
                                </div>
                                <?php 
                            }
                            ?>
                            
                            <div class="clearfix"></div>
                        </div>
                    </div>
                
                <?php else: ?>
                
                    <div id="dz-container" style="padding:10px;">
                        <form action="<?php echo base_url('mce/popup/image-upload'); ?>" class="dropzone" id="my-awesome-dropzone"></form>
                    </div>
                    
                <?php endif; ?>
                
            </div>
            <div class="clearfix"></div>
        </div>

        <script type="text/javascript" src="<?php echo assets_url(); ?>js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="<?php echo assets_url(); ?>libs/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo assets_url(); ?>libs/dropzone/dropzone.min.js"></script>
        <script type="text/javascript">
            // dropzone option
            Dropzone.options.myAwesomeDropzone = {
                maxFilesize: 1000,
                dictDefaultMessage: "Drop file here or click here to upload!",
                acceptedMimeTypes: "image/png,image/jpeg,image/gif",
                acceptedFiles: "image/png,image/jpeg,image/gif",
                success: function(file, res, xhr){
                    if(res.success == true){
                        this.removeAllFiles();
                        
                        var tpl = '<div class="list">'+
                                  '    <div class="item">'+
                                  '        <a class="mce-trigger focus" href="#">'+
                                  '            <img src="'+ res.message +'" />'+
                                  '        </a>'+
                                  '    </div>'+
                                  '</div>';
                        $("#dz-container").html(tpl);
                    }
                }
            };

            $(function(){
            
                var mce = parent.tinymce || null;                
                $(".mce-trigger").each(function(){
                    
                    $(this).on("click", function(e){
                        e.preventDefault();
                        
                        $(".mce-trigger").each(function(){
                            $(this).removeClass("focus");
                        });
                        
                        var me = $(this);
                            me.addClass("focus");                        
                    });
                    
                    /**
                    $(this).on("dblclick", function(e){
                        e.preventDefault();
                        
                        var me = $(this),
                            im = me.find("img:first");
                        
                        if(mce != null && typeof mce.Editor != "undefined"){
                            var ed = mce.get(0),
                                img = '<img src="'+ im.attr("src") +'" />';
                                
                            ed.insertContent(img);
                            ed.windowManager.close();
                        }
                        return false;
                    });
                    /**/

                });                
            });
        </script>
    </body>
</html>