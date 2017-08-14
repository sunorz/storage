/*
	Copyright By Sunplace,2017
	Demo https://sunorz.github.io/demo/sample-39.html
适配于本博客的修改版本
*/
$(".codeblock").each(function(index,ele){
		//循环代码块
		var arr=$(this).html().split("\n");
	  	var textc = "";	//代码初始化
		var text="<ol class='linenum'>"//行号初始化
		$(arr).each(function(index,ele){
			//循环行
			if(arr[index].trim()==""){arr[index]="&nbsp;";}
				arr[index]='<div name="L'+(index+1)+'">'+arr[index]+'</div>';
				if(index!==arr.length-1){
					arr[index]+="\n";
				}	
				text+="<li></li>";		
				textc+=arr[index];

			});
		        text+="</ol>";
				$(this).html(textc);
		        $(this).append(text);
		        setHeight();
		        initLine($(this));
				
	});

	function setHeight(){
	$("div[name^=L]").each(function(index,ele){
		var j=$(this).next().position().top-$(this).position().top;
		if(j>0){
			$(".linenum li:eq("+index+")").height(j);
		}
			});
	}
	
	//行高亮
	function initLine(obj){
		var hightline = obj.attr("line");
		if(hightline!=null)
			{
		var arr = obj.attr("line").split(',');
		$(arr).each(function(index,ele){
			//console.log(obj.find("div[name=L"+ele+"]").text());
			obj.find("div[name=L"+ele+"]").addClass("mark");
		});
			}
	}
	$(window).resize(function(){
		setHeight();
	});