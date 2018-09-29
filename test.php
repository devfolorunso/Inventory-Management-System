<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<div id="externalbox" style="width:5in">
<div id="codeDisplay"></div>
</div>
<div> <input type="text" id="inputData" /></div>
<div><input type="button" onclick="getBarCd('inputData','codeDisplay')" /> </div>

<script type="text/javascript">
	
function get_object(id) {
     var object = null;
     if (document.layers) {
      object = document.layers[id];
     } else if (document.all) {
      object = document.all[id];
     } else if (document.getElementById) {
      object = document.getElementById(id);
     }
     return object;
    }
    function get_object2(id) {
     var object = null;
     if (document.layers) {
      object = document.layers[id];
     } else if (document.all) {
      object = document.all[id];
     } else if (document.getElementById) {
      object = document.getElementById(id);
     }
     return object;
    }


    function getBarCd(from, to) {
      get_object(to).innerHTML =DrawCode39Barcode(get_object2(from).value,0)
    }


</script>


</body>
</html>
