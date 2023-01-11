/*
	Copyright By Sunplace,2017
	Demo https://sunorz.github.io/demo/sample-39.html 

适配于本博客的修改版本
*/
$(".codeblock").each(function(index,ele){
		//循环代码块
		var arr=$(this).html().split("\n");
	    //arr.splice(arr.length-1,1);//移除最后一个空白
		var textc = "";	//代码初始化
		var text="<ul class='linenum'>"//行号初始化
		var sline=startLine($(this));
		$(arr).each(function(index,ele){
			//循环行
		
			if(arr[index].trim()==""){arr[index]="&nbsp;";}
				arr[index]='<div name="L'+sline+'">'+arr[index]+'</div>';
				text+="<li>"+sline+"</li>";		
				textc+=arr[index];
			sline++;

			});
		        text+="</ul>";
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
	$(".linenum").each(function(){
		$(this).height($(this).parent(".codeblock").height());
	})
	}
	
	//行高亮
	function initLine(obj){
		var hightline = obj.attr("line");
		if(hightline!=null)
			{
		var arr = obj.attr("line").split(',');
		$(arr).each(function(index,ele){
		obj.find("div[name=L"+ele+"]").addClass("mark");
		});
			}
	}
	//指定行开始
	function startLine(obj){
		var sline = obj.attr("start");
		if(sline!=null)
			{
		       return sline;
			}
		else
			{
				return 1;
			}
	}
	$(window).resize(function(){
		setHeight();
	});
 $('#chgimg').on({  
                    click:function(){ 
					if($('#chgimg').attr('src')=='https://sunorz.github.io/demo/imgs/4/bg_chk.png')
					{
						 $('#chgimg').attr('src', 'https://sunorz.github.io/demo/imgs/4/bg_chkon.png'); 
						
					}
					else if($('#chgimg').attr('src')=='https://sunorz.github.io/demo/imgs/4/bg_chkon.png')
					{
						 $('#chgimg').attr('src', 'https://sunorz.github.io/demo/imgs/4/bg_chk.png'); 
						
					}  
                   } 
						 
                }); 