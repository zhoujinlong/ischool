

    $(function(){

        $(".imgbox img").click(function(){

            $("#testdiv").focus();

            var sy = $(".imgbox img").index(this) + 1;

            var img_url = "<img src='img/faceimg/"+sy+".png'>";



            /*此处如果不是插入图片可这样：

            var img_url = "插入测试的文字";

            */
            _insertimg(img_url);
        })

//注：如果要插入的是那种“快捷发言，快捷留言”里的文字，只需把那些文字都分别放在A标签里即可，然后img_url=a标签里面的内容。工作中的编辑器终于搞定！能插入图片和快捷发言和表情图片等。

    })


//监控粘贴(ctrl+v),如果是粘贴过来的东东，则替换多余的html代码，只保留<br>

function pasteHandler(){

    setTimeout(function(){

        var content = document.getElementById("testdiv").innerHTML;

        valiHTML=["br"];

        content=content.replace(/_moz_dirty=""/gi, "").replace(/\[/g, "[[-").replace(/\]/g, "-]]").replace(/<\/ ?tr[^>]*>/gi, "[br]").replace(/<\/ ?td[^>]*>/gi, "&nbsp;&nbsp;").replace(/<(ul|dl|ol)[^>]*>/gi, "[br]").replace(/<(li|dd)[^>]*>/gi, "[br]").replace(/<p [^>]*>/gi, "[br]").replace(new RegExp("<(/?(?:" + valiHTML.join("|") + ")[^>]*)>", "gi"), "[$1]").replace(new RegExp('<span([^>]*class="?at"?[^>]*)>', "gi"), "[span$1]").replace(/<[^>]*>/g, "").replace(/\[\[\-/g, "[").replace(/\-\]\]/g, "]").replace(new RegExp("\\[(/?(?:" + valiHTML.join("|") + "|img|span)[^\\]]*)\\]", "gi"), "<$1>");

        if(!$.browser.mozilla){

            content=content.replace(/\r?\n/gi, "<br>");

        }

        document.getElementById("testdiv").innerHTML=content;

    },1)



}



//锁定编辑器中鼠标光标位置。。

function _insertimg(str){

    var selection= window.getSelection ? window.getSelection() : document.selection;

    var range= selection.createRange ? selection.createRange() : selection.getRangeAt(0);

    if (!window.getSelection){

        document.getElementById('testdiv').focus();

        var selection= window.getSelection ? window.getSelection() : document.selection;

        var range= selection.createRange ? selection.createRange() : selection.getRangeAt(0);

        range.pasteHTML(str);

        range.collapse(false);

        range.select();

    }else{

        document.getElementById('testdiv').focus();

        range.collapse(false);

        var hasR = range.createContextualFragment(str);

        var hasR_lastChild = hasR.lastChild;

        while (hasR_lastChild && hasR_lastChild.nodeName.toLowerCase() == "br" && hasR_lastChild.previousSibling && hasR_lastChild.previousSibling.nodeName.toLowerCase() == "br") {

            var e = hasR_lastChild;

            hasR_lastChild = hasR_lastChild.previousSibling;

            hasR.removeChild(e)

        }

        range.insertNode(hasR);

        if (hasR_lastChild) {

            range.setEndAfter(hasR_lastChild);

            range.setStartAfter(hasR_lastChild)

        }

        selection.removeAllRanges();

        selection.addRange(range)

    }

}



//监控按enter键和空格键，如果按了enter键，则取消原事件，用<BR/ >代替。此处还等待修改！！！！！！如果后端能实现各个浏览器回车键产生的P，div, br的输出问题话就无需采用这段JS、

// function enterkey(){
//
//     e = event.keyCode;
//
//     if (e==13||e==32) {
//
//         // var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
//         //
//         // event.returnValue = false;  // 取消此事件的默认操作
//         //
//         // if(document.selection && document.selection.createRange){
//         //
//         //     var myRange = document.selection.createRange();
//         //
//         //     myRange.pasteHTML('<br />');
//         //
//         // }else if(window.getSelection){
//         //
//         //     var selection = window.getSelection();
//         //
//         //     var range = window.getSelection().getRangeAt(0);
//         //
//         //     range.deleteContents();
//         //
//         //     var newP = document.createElement('br');
//         //
//         //     range.insertNode(newP);
//         //
//         // }
//
// //alert(document.getElementById("testdiv").innerHTML)
//
//     }
//
// }

