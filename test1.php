<style><!--
    #resize {
        background : #FF9;
        font-size : 16px;
        padding : 12px;
    }

    #resize-submit {
        padding : 12px 36px;
    }
    --></style>
<form id="resize">
    <p><input id="resize-files" type="file" name="files[]" accept="image/*" multiple="multiple" /></p>
    <p>寬： <input id="resize-width" name="width" type="number" value="640" /></p>
    <p>高： <input id="resize-height" name="height" type="number" /></p>
    <p><label><input id="resize-ratio" name="ratio" value="y" type="checkbox" disabled="disabled" checked="checked" /> 維持原比例</label></p>
    <p>輸出檔案格式：<select id="resize-type" name="type">
            <option value="jpeg">JPG</option>
            <option value="png">PNG</option>
        </select></p>
    <p><input id="resize-submit" type="submit" value="調整" /></p>
</form>
<p><script >
        (function() {
            var $form = $('#resize'),
                $files = $form.find('#resize-files')
            $width = $form.find('#resize-width'),
                $height = $form.find('#resize-height'),
                $ratio = $form.find('#resize-ratio'),
                $type = $form.find('#resize-type');

            $width.change(function() {
                if(!this.value) {
                    $ratio[0].checked = true;
                    return;
                }

                if($height.val())
                    $ratio[0].checked = false;
            });

            $height.change(function() {
                if(!this.value) {
                    $ratio[0].checked = true;
                    return;
                }

                if($width.val())
                    $ratio[0].checked = false;
            });

            $form.submit(function() {
                var files = $files[0].files,
                    width = $width.val() ^ 0,
                    height = $height.val() ^ 0,
                    type = $type.val(),
                    n = files.length;

                for(var i = 0; i < n; ++i) {
                    (function(file) {
                        var fileReader = new FileReader();

                        fileReader.onload = function(e) {
                            var image = new Image();

                            image.onload = function() {
                                var canvas = document.createElement('canvas'),
                                    context = canvas.getContext('2d'),
                                    w,
                                    h;

                                if(width && height) {
                                    w = width;
                                    h = height;
                                }
                                else if(width) {
                                    w = width;
                                    h = width / this.width * this.height;
                                }
                                else if(height) {
                                    w = height / this.height * this.width;
                                    h = height;
                                }
                                else {
                                    w = this.width;
                                    h = this.height;
                                }

                                canvas.width = w;
                                canvas.height = h;

                                context.drawImage(this, 0, 0, w, h);


                                var name = file.name;
                                i = name.lastIndexOf('.');

                                if(i === -1)
                                    name += (type === 'jpeg' ? '_resized.jpg' : '_resized.png');
                                else
                                    name = name.substr(0, i) + '_resized.' + (type === 'jpeg' ? 'jpg' : 'png');

                                if(navigator.msSaveBlob) {
                                    navigator.msSaveBlob(canvas.msToBlob(), name);

                                    return;
                                }

                                var e = document.createEvent('MouseEvents');

                                e.initEvent('click', true, true);

                                $('<a>', {
                                    download : name,
                                    href : canvas.toDataURL('image/' + type),
                                    target : '_blank'
                                })[0].dispatchEvent(e);
                            };

                            image.src = e.target.result;
                        };

                        fileReader.readAsDataURL(file);
                    })(files[i]);
                }

                return false;
            });
        })();
    </script></p>
