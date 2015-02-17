<?php /*
 * Wikipedia Traffic Grapher
 * 
 * Version: 1.0
 *
 * Copyright 2014 Kevin Payravi (SuperHamster @ en.wiki)
 * Released under the GNU General Public License
 * https://github.com/KevinPayravi/Wikipedia-Traffic-Grapher/blob/master/LICENSE
*/ ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Wikipedia Traffic Grapher</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="A tool for graphic monthly traffic of articles on the English Wikipedia.">
	<meta name="keywords" content="wikipedia, traffic, grapher, graphs, charts">
	<link rel="stylesheet" type="text/css" href="css/skeleton.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<br><br>
<div class="container">
	<div class="row">
		<div class="three columns">
			<h4><b>Wikipedia Multi-Page Traffic Grapher</b></h4>
			<h6>
				Made with <3 by <a href="http://www.kevinpayravi.com/">Kevin Payravi</a>
				<br>
				(<a href="http://en.wikipedia.org/wiki/User:SuperHamster">SuperHamster</a> at en.wiki)
				<br><br>
				Data from <a href="http://stats.grok.se/">stats.grok.se</a>
				<br>
				Made using <a href="http://getskeleton.com/">Skeleton</a> and <a href="http://www.chartjs.org/">Chart.js</a>
			</h6>
			<br>
			Enter up to 5 articles:<br>
			<form id="articleForm" action="javascript:void(0);" method="get">
				<input type="text" name="articleOne" /><br>
				<input type="text" name="articleTwo" /><br>
				<input type="text" name="articleThree" /><br>
				<input type="text" name="articleFour" /><br>
				<input type="text" name="articleFive" /><br>
				<input type="submit" onclick="loadStart()" value="" style="display:none;" />
			</form>
   			<br>
			<form id="checkForm" action="javascript:void(0);" method="get">
                		<input type="checkbox" id="showLineGraph" checked="checked" /><label for="showLineGraph">Line Graph</label>
                		<br>
				<input type="checkbox" id="showBarGraph" /><label for="showBarGraph">Bar Graph</label>
				<input type="submit" onclick="loadStart()" value="" style="display:none;" />
			</form>
			<br>
			Select Month:
			<br>
			<select id="date">
				<option selected="selected" value="201502">February '15</option>
				<option value="201501">January '15</option>
				<option value="201412">December '14</option>
				<option value="201411">November '14</option>
				<option value="201410">October '14</option>
				<option value="201409">September '14</option>
				<option value="201408">August '14</option>
				<option value="201407">July '14</option>
				<option value="201406">June '14</option>
				<option value="201405">May '14</option>
				<option value="201404">April '14</option>
				<option value="201403">March '14</option>
				<option value="201402">February '14</option>
				<option value="201401">January '14</option>
				<option value="201312">December '13</option>
				<option value="201311">November '13</option>
				<option value="201310">October '13</option>
				<option value="201309">September '13</option>
				<option value="201308">August '13</option>
				<option value="201307">July '13</option>
				<option value="201306">June '13</option>
				<option value="201305">May '13</option>
				<option value="201304">April '13</option>
				<option value="201303">March '13</option>
				<option value="201302">February '13</option>
				<option value="201301">January '13</option>
				<option value="201212">December '12</option>
				<option value="201211">November '12</option>
				<option value="201210">October '12</option>
				<option value="201209">September '12</option>
				<option value="201208">August '12</option>
				<option value="201207">July '12</option>
				<option value="201206">June '12</option>
				<option value="201205">May '12</option>
				<option value="201204">April '12</option>
				<option value="201203">March '12</option>
				<option value="201202">February '12</option>
				<option value="201201">January '12</option>
				<option value="201112">December '11</option>
				<option value="201111">November '11</option>
				<option value="201110">October '11</option>
				<option value="201109">September '11</option>
				<option value="201108">August '11</option>
				<option value="201107">July '11</option>
				<option value="201106">June '11</option>
				<option value="201105">May '11</option>
				<option value="201104">April '11</option>
				<option value="201103">March '11</option>
				<option value="201102">February '11</option>
				<option value="201101">January '11</option>
				<option value="201012">December '10</option>
				<option value="201011">November '10</option>
				<option value="201010">October '10</option>
				<option value="201009">September '10</option>
				<option value="201008">August '10</option>
				<option value="201007">July '10</option>
				<option value="201006">June '10</option>
				<option value="201005">May '10</option>
				<option value="201004">April '10</option>
				<option value="201003">March '10</option>
				<option value="201002">February '10</option>
				<option value="201001">January '10</option>
				<option value="200912">December '09</option>
				<option value="200911">November '09</option>
				<option value="200910">October '09</option>
				<option value="200909">September '09</option>
				<option value="200908">August '09</option>
				<option value="200907">July '09</option>
				<option value="200906">June '09</option>
				<option value="200905">May '09</option>
				<option value="200904">April '09</option>
				<option value="200903">March '09</option>
				<option value="200902">February '09</option>
				<option value="200901">January '09</option>
				<option value="200812">December '08</option>
				<option value="200811">November '08</option>
				<option value="200810">October '08</option>
				<option value="200809">September '08</option>
				<option value="200808">August '08</option>
				<option value="200807">July '08</option>
				<option value="200806">June '08</option>
				<option value="200805">May '08</option>
				<option value="200804">April '08</option>
				<option value="200803">March '08</option>
				<option value="200802">February '08</option>
				<option value="200801">January '08</option>
			</select>
			<br><br>
			<input class="button-primary" type="submit" onclick="loadStart()" value="Submit" />
			<br><br><br><br><br>
		</div>

		<div id="keyContainer" class="nine columns" style="text-align:center;">
			<div id="keyTitle" align="center" class="three columns" style="text-align:center; text-align:center; display:none;">Key: </div>
			<div id="keyOne" align="center" class="three columns" style="text-align:center; text-align:center; background:#5686BF; border-radius:5px; color:white;"></div>
			<div id="keyTwo" align="center" class="three columns" style="text-align:center; text-align:center; background:#A0BF62; border-radius:5px; color:white;"></div>
			<div id="keyThree" align="center" class="three columns" style="text-align:center; text-align:center; background:#F79B4F; border-radius:5px; color:white;"></div>
		</div>
		<br><br>
		<div id="keyContainerTwo" class="nine columns" style="text-align:center;">
			<div id="spacerOne" align="center" class="three columns" style="text-align:center; text-align:center; background:#FFFFFF; border-radius:5px;">&nbsp;</div>
			<div id="keyFour" align="center" class="three columns" style="text-align:center; text-align:center; background:#C25754; border-radius:5px; color:white;"></div>
			<div id="keyFive" align="center" class="three columns" style="text-align:center; text-align:center; background:#8368A4; border-radius:5px; color:white;"></div>
			<div id="spacerTwo" align="center" class="three columns" style="text-align:center; text-align:center; background:#FFFFFF; border-radius:5px;">&nbsp;</div>
		</div>

		<br><br>

		<div id="chartContainer" class="nine columns" style="text-align:center;"></div>

		<div class="loader" id="loader"></div>
	</div>
</div>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>

<script>
function loadStart(){$("#chartContainer").empty(),"undefined"!=typeof lineChart&&lineChart.destroy(),"undefined"!=typeof barChart&&barChart.destroy(),document.getElementById("keyTitle").style.display="none",$("#keyOne").empty(),$("#keyTwo").empty(),$("#keyThree").empty(),$("#keyFour").empty(),$("#keyFive").empty(),document.getElementById("showLineGraph").checked||document.getElementById("showBarGraph").checked?(document.getElementById("loader").style.display="inline",setTimeout(main,0)):alert("Please select the type(s) of graph you want!")}
function main(){for(var a=document.getElementById("articleForm"),e=[],r=0;r<a.length;r++){var l=a.elements[r].value;""!=l&&(l=l.trim(),l=l.concat("#$%"),l=l.trim(),l=l.replace("#$%",""),l=l.replace(/ /g,"_"),l=l.replace("%",""),l=l.replace("#",""),l=l.replace("&","%26"),l=l.replace("+","%2B"),""!=l&&e.push(l))}var o=document.getElementById("date"),t=o.value,i=[];if(e.length>=1){var s=$.ajax({url:"grabJSON.php?date="+t+"&article="+e[0],async:!1});i.push(s.responseText)}if(e.length>=2){var n=$.ajax({url:"grabJSON.php?date="+t+"&article="+e[1],async:!1});i.push(n.responseText)}if(e.length>=3){var g=$.ajax({url:"grabJSON.php?date="+t+"&article="+e[2],async:!1});i.push(g.responseText)}if(e.length>=4){var h=$.ajax({url:"grabJSON.php?date="+t+"&article="+e[3],async:!1});i.push(h.responseText)}if(5==e.length){var p=$.ajax({url:"grabJSON.php?date="+t+"&article="+e[4],async:!1});i.push(p.responseText)}var b=extractViews(i),d=[];if(0!=e.length){document.getElementById("keyTitle").style.display="inline";for(var r=0;r<e.length;r++)e[r]=e[r].replace("%26","&"),e[r]=e[r].replace("%2B","+"),e[r]=e[r].replace('"',"&quot;"),e[r]=e[r].replace("_","&nbsp;");if(1==e.length){var v=[],C=0,k=b[0];for(var w in k)d.push(w),v.push(k[w]),C+=k[w];$("#keyOne").append('<a class="key" href="http://en.wikipedia.org/wiki/'+e[0]+'">'+e[0]+"</a><br><h6>Total Views: "+C+"</h6>")}else if(2==e.length){var v=[],f=[],C=0,c=0,k=b[0];for(var w in k)d.push(w),v.push(k[w]),C+=k[w];var y=b[1];for(var w in y)f.push(y[w]),c+=y[w];$("#keyOne").append('<a class="key" href="http://en.wikipedia.org/wiki/'+e[0]+'">'+e[0]+"</a><br><h6>Total Views: "+C+"</h6>"),$("#keyTwo").append('<a class="key" href="http://en.wikipedia.org/wiki/'+e[1]+'">'+e[1]+"</a><br><h6>Total Views: "+c+"</h6>")}else if(3==e.length){var v=[],f=[],u=[],C=0,c=0,m=0,k=b[0];for(var w in k)d.push(w),v.push(k[w]),C+=k[w];var y=b[1];for(var w in y)f.push(y[w]),c+=y[w];var P=b[2];for(var w in P)u.push(P[w]),m+=P[w];$("#keyOne").append('<a class="key" href="http://en.wikipedia.org/wiki/'+e[0]+'">'+e[0]+"</a><br><h6>Total Views: "+C+"</h6>"),$("#keyTwo").append('<a class="key" href="http://en.wikipedia.org/wiki/'+e[1]+'">'+e[1]+"</a><br><h6>Total Views: "+c+"</h6>"),$("#keyThree").append('<a class="key" href="http://en.wikipedia.org/wiki/'+e[2]+'">'+e[2]+"</a><br><h6>Total Views: "+m+"</h6>")}else if(4==e.length){var v=[],f=[],u=[],T=[],C=0,c=0,m=0,B=0,k=b[0];for(var w in k)d.push(w),v.push(k[w]),C+=k[w];var y=b[1];for(var w in y)f.push(y[w]),c+=y[w];var P=b[2];for(var w in P)u.push(P[w]),m+=P[w];var V=b[3];for(var w in V)T.push(V[w]),B+=V[w];$("#keyOne").append('<a class="key" href="http://en.wikipedia.org/wiki/'+e[0]+'">'+e[0]+"</a><br><h6>Total Views: "+C+"</h6>"),$("#keyTwo").append('<a class="key" href="http://en.wikipedia.org/wiki/'+e[1]+'">'+e[1]+"</a><br><h6>Total Views: "+c+"</h6>"),$("#keyThree").append('<a class="key" href="http://en.wikipedia.org/wiki/'+e[2]+'">'+e[2]+"</a><br><h6>Total Views: "+m+"</h6>"),$("#keyFour").append('<a class="key" href="http://en.wikipedia.org/wiki/'+e[3]+'">'+e[3]+"</a><br><h6>Total Views: "+B+"</h6>")}else if(5==e.length){var v=[],f=[],u=[],T=[],x=[],C=0,c=0,m=0,B=0,E=0,k=b[0];for(var w in k)d.push(w),v.push(k[w]),C+=k[w];var y=b[1];for(var w in y)f.push(y[w]),c+=y[w];var P=b[2];for(var w in P)u.push(P[w]),m+=P[w];var V=b[3];for(var w in V)T.push(V[w]),B+=V[w];var I=b[4];for(var w in I)x.push(I[w]),E+=I[w];$("#keyOne").append('<a class="key" href="http://en.wikipedia.org/wiki/'+e[0]+'">'+e[0]+"</a><br><h6>Total Views: "+C+"</h6>"),$("#keyTwo").append('<a class="key" href="http://en.wikipedia.org/wiki/'+e[1]+'">'+e[1]+"</a><br><h6>Total Views: "+c+"</h6>"),$("#keyThree").append('<a class="key" href="http://en.wikipedia.org/wiki/'+e[2]+'">'+e[2]+"</a><br><h6>Total Views: "+m+"</h6>"),$("#keyFour").append('<a class="key" href="http://en.wikipedia.org/wiki/'+e[3]+'">'+e[3]+"</a><br><h6>Total Views: "+B+"</h6>"),$("#keyFive").append('<a class="key" href="http://en.wikipedia.org/wiki/'+e[4]+'">'+e[4]+"</a><br><h6>Total Views: "+E+"</h6>")}for(var r=0;r<d.length;r++){var O=d[r].length;d[r]=d[r].substring(O-2,O)}if(1==e.length)var j={labels:d,datasets:[{label:"Pageviews",fillColor:"rgba(86,134,191,0.0)",strokeColor:"rgba(86,134,191,1)",pointColor:"rgba(86,134,191,1)",data:v}]},J={labels:d,datasets:[{label:"Pageviews",fillColor:"rgba(86,134,191,1)",strokeColor:"rgba(86,134,191,1)",data:v}]};else if(2==e.length)var j={labels:d,datasets:[{label:"Pageviews",fillColor:"rgba(86,134,191,0.0)",strokeColor:"rgba(86,134,191,1)",pointColor:"rgba(86,134,191,1)",data:v},{label:"Pageviews2",fillColor:"rgba(160,191,98,0.0)",strokeColor:"rgba(160,191,98,1)",pointColor:"rgba(160,191,98,1)",data:f}]},J={labels:d,datasets:[{label:"Pageviews",fillColor:"rgba(86,134,191,1)",strokeColor:"rgba(86,134,191,1)",data:v},{label:"Pageviews2",fillColor:"rgba(160,191,98,1)",strokeColor:"rgba(160,191,98,1)",data:f}]};else if(3==e.length)var j={labels:d,datasets:[{label:"Pageviews",fillColor:"rgba(86,134,191,0.0)",strokeColor:"rgba(86,134,191,1)",pointColor:"rgba(86,134,191,1)",data:v},{label:"Pageviews2",fillColor:"rgba(160,191,98,0.0)",strokeColor:"rgba(160,191,98,1)",pointColor:"rgba(160,191,98,1)",data:f},{label:"Pageviews3",fillColor:"rgba(247,155,79,0.0)",strokeColor:"rgba(247,155,79,1)",pointColor:"rgba(247,155,79,1)",data:u}]},J={labels:d,datasets:[{label:"Pageviews",fillColor:"rgba(86,134,191,1)",strokeColor:"rgba(86,134,191,1)",data:v},{label:"Pageviews2",fillColor:"rgba(160,191,98,1)",strokeColor:"rgba(160,191,98,1)",data:f},{label:"Pageviews3",fillColor:"rgba(247,155,79,1)",strokeColor:"rgba(247,155,79,1)",data:u}]};else if(4==e.length)var j={labels:d,datasets:[{label:"Pageviews",fillColor:"rgba(86,134,191,0.0)",strokeColor:"rgba(86,134,191,1)",pointColor:"rgba(86,134,191,1)",data:v},{label:"Pageviews2",fillColor:"rgba(160,191,98,0.0)",strokeColor:"rgba(160,191,98,1)",pointColor:"rgba(160,191,98,1)",data:f},{label:"Pageviews3",fillColor:"rgba(247,155,79,0.0)",strokeColor:"rgba(247,155,79,1)",pointColor:"rgba(247,155,79,1)",data:u},{label:"Pageviews4",fillColor:"rgba(194,87,84,0.0)",strokeColor:"rgba(194,87,84,1)",pointColor:"rgba(194,87,84,1)",data:T}]},J={labels:d,datasets:[{label:"Pageviews",fillColor:"rgba(86,134,191,1)",strokeColor:"rgba(86,134,191,1)",data:v},{label:"Pageviews2",fillColor:"rgba(160,191,98,1)",strokeColor:"rgba(160,191,98,1)",data:f},{label:"Pageviews3",fillColor:"rgba(247,155,79,1)",strokeColor:"rgba(247,155,79,1)",data:u},{label:"Pageviews4",fillColor:"rgba(194,87,84,1)",strokeColor:"rgba(194,87,84,1)",data:T}]};else if(5==e.length)var j={labels:d,datasets:[{label:"Pageviews",fillColor:"rgba(86,134,191,0.0)",strokeColor:"rgba(86,134,191,1)",pointColor:"rgba(86,134,191,1)",data:v},{label:"Pageviews2",fillColor:"rgba(160,191,98,0.0)",strokeColor:"rgba(160,191,98,1)",pointColor:"rgba(160,191,98,1)",data:f},{label:"Pageviews3",fillColor:"rgba(247,155,79,0.0)",strokeColor:"rgba(247,155,79,1)",pointColor:"rgba(247,155,79,1)",data:u},{label:"Pageviews4",fillColor:"rgba(194,87,84,0.0)",strokeColor:"rgba(194,87,84,1)",pointColor:"rgba(194,87,84,1)",data:T},{label:"Pageviews5",fillColor:"rgba(131,104,164,0.0)",strokeColor:"rgba(131,104,164,1)",pointColor:"rgba(131,104,164,1)",data:x}]},J={labels:d,datasets:[{label:"Pageviews",fillColor:"rgba(86,134,191,1)",strokeColor:"rgba(86,134,191,1)",data:v},{label:"Pageviews2",fillColor:"rgba(160,191,98,1)",strokeColor:"rgba(160,191,98,1)",data:f},{label:"Pageviews3",fillColor:"rgba(247,155,79,1)",strokeColor:"rgba(247,155,79,1)",data:u},{label:"Pageviews4",fillColor:"rgba(194,87,84,1)",strokeColor:"rgba(194,87,84,1)",data:T},{label:"Pageviews5",fillColor:"rgba(131,104,164,1)",strokeColor:"rgba(131,104,164,1)",data:x}]};if(document.getElementById("showLineGraph").checked&&document.getElementById("showBarGraph").checked){$("#chartContainer").append('<canvas id="topChart" width="800" height="500" style="vertical-align: bottom;"></canvas>'),$("#chartContainer").append('<canvas id="bottomChart" width="800" height="500" style="vertical-align: bottom;"></canvas>');var N=document.getElementById("topChart").getContext("2d"),S=document.getElementById("bottomChart").getContext("2d");lineChart=new Chart(N).Line(j,{responsive:!0}),barChart=new Chart(S).Bar(J,{responsive:!0})}else if(document.getElementById("showLineGraph").checked){$("#chartContainer").append('<canvas id="topChart" width="800" height="500" style="vertical-align: bottom;"></canvas>');var N=document.getElementById("topChart").getContext("2d");lineChart=new Chart(N).Line(j,{responsive:!0})}else if(document.getElementById("showBarGraph").checked){$("#chartContainer").append('<canvas id="topChart" width="800" height="500" style="vertical-align: bottom;"></canvas>');var N=document.getElementById("topChart").getContext("2d");barChart=new Chart(N).Bar(J,{responsive:!0})}}else alert("Please enter at least one article to analyze.");document.getElementById("loader").style.display="none"}
function sortArrayByKeys(r){var n=[];for(var o in r)n.push(o);n.sort();for(var t=[],a=0;a<n.length;a++)t[n[a]]=r[n[a]];return t}
function extractViews(r){for(var e=[],t=new Object,a=0;a<r.length;a++){var n=JSON.parse(r[a]);for(var s in n)n.hasOwnProperty(s)&&(s.toString(),"daily_views"==s&&(t=n[s]));t=sortArrayByKeys(t),e.push(t)}return e}
</script>

<script src="js/Chart.min.js"></script>

</body>
</html>
