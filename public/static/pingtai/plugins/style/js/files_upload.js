var _editor_files = UE.getEditor('upload_files');
var oFile = "#"+file_div+"_files";
var oDiv = "#"+file_div+"_files div";
var oFile1 = file_div+"_files";
var img_max = 10;
var img_msg = "最多只能上传10个";

$list = $(oFile);
_editor_files.ready(function () {
	_editor_files.hide();
	//侦听文件上传，取图片文件列表中第一个上传的图片的路径
	_editor_files.addListener('afterUpfile', function (t, arg) {
		var len = arg.length;
		//alert(len);
		var imgList = document.getElementById(oFile1);
	    var divNode = imgList.getElementsByTagName('div');
	    var ll = divNode.length;//获得<img>元素个数
	    var l2 = ll-1;
	    if(ll > 0){
	    	var sname = $(oDiv).eq(l2).attr("id");
	    	var upname= new Array(); 
	    	upname=sname.split("_"); 
	    	//alert(sname);
	    	ll = parseInt(upname[1])+1;
	    }
	    
		//var ll = $("#pics_images").children('div').length;
		var div_len = $(oDiv).length;
		if(div_len>=img_max){
			alert(img_msg);
			return false;
		}

		var html1 = imgList.innerHTML;
		
		for(var i=0;i<len;i++){
			var jj = ll +i;
			
			var aaa = "uplistd_"+jj;
			var $li = '<div id="' + aaa + '" >' +
	                    '<input type="text" size="40" class="input-text img1" name="' +file_div+'[]" value=""> &nbsp;' +
	                    '<input type="text" class="input-text imgname1" name="'+file_div+'_name[]" value="" size="10"> &nbsp;'+
	                    '<a class="btn btn-sm btn-info imghref1" target="_blank" href="">下载</a>&nbsp;'+
	                    '<a class="btn btn-sm btn-warning" href="javascript:remove_this(\'uplistd_'+jj+'\');">移除</a>'+
	                '</div>';
			str = $list.html();
			str = str + $li;
			
	        $list.html(str);
		
		}
		
		$.each(arg,function(n,value) {
			var abc = arg[n].url;
			var jj = ll +n;
			
			var str1 = "#uplistd_"+jj+" .img1--------"+n+"-----"+ll;
			//alert(str1);
			
			var abc1 = abc.split("/");
			var aaa = "#uplistd_"+jj+" .img1";
			var href2 = "#uplistd_"+jj+" .imghref1";
			var aaa1 = "#uplistd_"+jj+" .imgname1";

			$(aaa).val(abc);
			$(href2).attr('href',abc);
			$(aaa1).val(abc1[6]);
			
			$(aaa).attr('aaa',abc);
			$(aaa1).attr('aaa',abc1[6]);
			
			for(var jj=0;jj<ll;jj++){
				var img1 = "#uplistd_"+jj+" .img1";
				var imgname1 = "#uplistd_"+jj+" .imgname1";
				
				if($(img1).val()==''){
					var a1 = $(img1).attr('aaa')
					$(img1).attr('value',a1);
					$(img1).val(a1);
				}
				if($(imgname1).val()==''){
					var a1 = $(imgname1).attr('aaa')
					$(imgname1).attr('value',a1);
					$(imgname1).val(a1);
				}
			}
        });

		
	});
});
function up_files() {
	var myImage_s_file = _editor_files.getDialog("attachment");
	myImage_s_file.open();
}
function remove_this(obj){
	$('#'+obj).remove();
}
