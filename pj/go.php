<?php
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<title>安全跳转页面</title>
		<style>
			*{
			    padding: 0px;
				margin: 0px;
			}
			body{
				width: 100%;
				height: 100vh;
			}
			.main{
				position: relative;
			    width: 100%;
				height: 100%;
				background: #000;
				display: flex;
				justify-content: center;
				align-items: center;
			}
			.circle{
				display: flex;
				justify-content: center;
				align-items: center;
				width: 200px;
				height: 200px;
				background-image: linear-gradient(0deg,
				rgb(47,102,255),
				rgb(153,64,255) 30%,
				rgb(238,55,255) 60%,
				rgb(255,0,76) 100%);
				border-radius: 50%;
				animation: rotate 1s linear infinite;
			}
			/* 模糊 */
			.circle::before{
				content: "";
				position:absolute;
				width: 200px;
				height: 200px;
				background-image: linear-gradient(0deg,
				rgb(47,102,255),
				rgb(153,64,255) 30%,
				rgb(238,55,255) 60%,
				rgb(255,0,76) 100%);
				border-radius: 50%;
				filter: blur(35px);
			}
			/* 黑圆 */
			.circle::after{
				content: "";
				position:absolute;
				width: 150px;
				height: 150px;
				background:#000;
				border-radius: 50%;
			}
			h1{
				position: absolute;
				color: #fff;
				font-weight: bold;
			}
			.title{
				color: #FFFFFF;
				position:absolute;
				top:10%;
				text-shadow:0px 0 30px #fff;
				text-align: center;
				font-size: 2rem;
				font-weight: bold;
			}
			.text{
				color: #FFFFFF;
				position:absolute;
				bottom:10%;
				text-shadow:0px 0 30px #fff;
				font-weight: bold;text-align: center;
			}
			/* 添加动画 */
			@keyframes rotate{
				0%{
					transform: rotate(0deg);
				}
				100%{
					transform: rotate(360deg);
				}
			}
		</style>
	</head>
	<body onload="time()">
	    <div class="main">
			<div class="circle"></div>
			<h1 id="second">5s</h1>
			<p class="title">安全跳转页</p>
			<p class="text">正在跳转到目标网址</p>
		</div>
	</body>
	<script>
		function cs(){
			var query = window.location.search.substring(1);
			       var vars = query.split("&");
			       for (var i=0;i<vars.length;i++) {
			               var pair = vars[i].split("=");
			               if(pair[0] == "url"){
							   return pair[1];
							}
			       }
			return("http://1715zyy.xlphp.net/pj/");//无指定跳转地址，将跳转此网页地址。
		}
		function time(){
			var sec = document.getElementById("second");
			 var i = 5;//设置定时时间
			 var timer = setInterval(function(){
			 i--;
			 sec.innerHTML = i+"s";
			 if(i==1){
			  window.location.href = cs();
			 }
			 },1000);
			  
			 function goBack(){ 
			 window.history.go(-1);
			 } 
		}
	</script>
</html>