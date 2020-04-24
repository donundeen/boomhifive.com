<html>

<head>
<script language="JavaScript">


function init()
{
  // generic (browser-independent) DOM code that builds a simple HTML table
  var nodes = xmlDoc.getElementsByTagName('node');

  alert(nodes.length);

  
  
}

</script>

<xml id="xmlDoc">
<allData>
<nodes>
<node>
<g class="node" id="node1" onmouseover='addNode(evt);' >
<circle  cx="0" cy="0" r="10" fill="blue" />
<text x="0" y="0">Hello</text>
</g>
</node>
<node>
<g id="node2" >
<circle  cx="0" cy="0" r="10" fill="blue" />
<text x="0" y="0">goodbye</text>
</g>
</node>

</nodes>
<woods>
  <wood colour="light">cedar</wood>
  <wood colour="dark">oak</wood>
  <wood colour="light">pine</wood>
  <wood colour="medium">maple</wood>
</woods>
</allData>
</xml>
<head>

<body onload="init();">
<div id="writeroot"></div>
</body></html>