function checklist(){
	$("#divDialogTaskViewer").dialog({
		autoOpen: false,
		resizable: false,
		position: 'center',
		width: 400,
		height:'auto',
		modal: true,
		buttons: [
		          {
		        	  text: 'Salvar',
		        	  click: function() {
		        	  	$(this).dialog('close');
		        	  }
		          },
		          {
		        	  text:	'Cancelar',
		        	  click: function() {
		        	  	$(this).dialog('close');
		        	  }
		          }
		         ]
	});
}

function viewTask(task_id)
{
	$.ajax({
		url: siteUrl + "/dashboard/task_viewer",
		data: "task_id=" + task_id,
		type: "POST",
		dataType: "html",
		success: function(response) {
			$("#divDialogTaskViewerContent").html(response);
			$("#divDialogTaskViewer").dialog('option', 'position', 'center');
			$("#divDialogTaskViewer").dialog('open');
		}
	});
}

