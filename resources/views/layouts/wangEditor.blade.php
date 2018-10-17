<!--

使用

1、插入 html

<div id="editor" data-for="#content"></div>
<textarea name="content" id="content" hidden></textarea>

2、include模版

#include('layouts.wangEditor')
#换成@符号
-->
<link rel="stylesheet" href="{{asset('/lib/wangEditor-3.1.0/release/wangEditor.css')}}"/>
<script src="https://unpkg.com/wangeditor@3.1.0/release/wangEditor.min.js"></script>
<script>
	$(function () {
		var E = window.wangEditor;
		var selector = '#editor';
		var editor = new E(selector);
		var $input = $($(selector).attr('data-for'));
		// 图片上传配置服务器端地址
		editor.customConfig.uploadImgServer = "{{url('upload')}}";
		editor.customConfig.uploadFileName = 'file[]';
		editor.customConfig.uploadImgShowBase64 = true;
		// editor.customConfig.hideLinkImg = true;
		editor.customConfig.uploadImgHeaders = {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		};
		editor.customConfig.menus = [
			'head',  // 标题
			'bold',  // 粗体
			'link',  // 插入链接
			'list',  // 列表
			'justify',  // 对齐方式
			'image',  // 插入图片
		];
		editor.customConfig.onchange = function (html) {
			// 监控变化，同步更新到 textarea

			$input.val(html)
		};

		editor.create();
	})
</script>