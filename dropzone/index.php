<html>
 
<head>
	<link href="dropzone.css" type="text/css" rel="stylesheet" />
	<script src="dropzone.js"></script>
	<script src="jquery.js"></script>
</head>
 
<body>
	<div method="post" id="my-awesome-dropzone" action="vvupload.php" class="dropzone">
	</div>
	<a href=""><div onClick="javascript:this.form.submit();">Submit</div></a>
	<input type="hidden" id="_2nd_file" name="data[StudyResource][file]">
	
</body>

<script>
	
	Dropzone.options.myAwesomeDropzone = {
	  /*renameFilename: function (filename) 
	  	{                
	  		fileN = new Date().getTime() + '_' + filename
	  		document.getElementById("_2nd_file").value =fileN;
	  	},*/
	  acceptedFiles: ".pdf",
	  init: function() {
	    this.on("success", 
	    	function(file, paramName) 
	    	{ 
	    		document.getElementById("_2nd_file").value = paramName;
	    	}
	    );
	  }
	 
	};
</script>
 
</html>