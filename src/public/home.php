<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Web Note App</title>
<?php
$i = 0;
while(isset(ASSETS_ONLINE_CSS[$i])){
    if(ONLINE == true){
        ?>
        <link rel="stylesheet" type="text/css" href="<?php echo ASSETS_ONLINE_CSS[$i]; ?>">
        <?php
    }else{
        ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $urlHost.ASSETS_CSS."/".ASSETS_OFFLINE_CSS[$i]; ?>">
        <?php
    }
    ++$i;
}
?>
</head>
<body>
<?php
include DOCUMENT_PUBLIC."/list.php";
?>
<?php
$i = 0;
while(isset(ASSETS_ONLINE_JS[$i])){
    if(ONLINE == true){
        ?>
        <script src="<?php echo ASSETS_ONLINE_JS[$i]; ?>"></script>
        <?php
    }else{
        ?>
        <script src="<?php echo $urlHost.ASSETS_JS."/".ASSETS_OFFLINE_JS[$i]; ?>"></script>
        <?php
    }
    ++$i;
}
?>
<script>
var count = 0;
function datetime_now(){
    var date = new Date();
    var dateStr =
    date.getFullYear() + "-" +("00" + (date.getMonth() + 1)).slice(-2) + "-" +("00" + date.getDate()).slice(-2) + " " +
    ("00" + date.getHours()).slice(-2) + ":" +
    ("00" + date.getMinutes()).slice(-2) + ":" +
    ("00" + date.getSeconds()).slice(-2);
    return dateStr;
}
//console.log(datetime_now());
// Model
class NoteModel {
	constructor() {
        this.NoteCount = 0;
		this.NoteList = [];
	}

	addNoteItem(noteID,noteTitle,NoteContent) {
        this.NoteList.push([]);
		this.NoteList[this.NoteCount].push(this.NoteCount);
		this.NoteList[this.NoteCount].push(noteTitle);
		this.NoteList[this.NoteCount].push(NoteContent);
        this.NoteCount++;
	}

	getNoteList() {
		return this.NoteList;
	}
}

//View
class NoteView {
	constructor(noteModel) {
		this.noteModel = noteModel;
		this.noteListElement = $("#note_list");
		this.noteContentElement = $("#note_edit_content");
		this.noteSaveElement = $("#note_save");
	}

	renderNoteList() {
		this.noteListElement.empty();
		var noteList = this.noteModel.getNoteList();
        for (var i = 0; i < noteList.length; i++) {
            this.noteListElement.append(
                '<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4" data-id="'+noteList[i][0]+'">\
                    <div class="card">\
                    <div class="card-header">\
                        Note :\
                    </div>\
                    <div class="card-body">\
                        <h5 class="card-title">Note : <span id="note_title"> ' +noteList[i][1]+'</span></h5>\
                        <p class="card-text" id="note_content">'+noteList[i][2]+'</p>\
                    </div>\
                    </div>\
                </div>'
            );
        }
	}

	getNoteInputValue() {
		return this.noteContentElement.val();
	}

	clearNoteInput() {
		this.noteContentElement.val("");
	}

	addNoteItemHandler(callback) {
		this.noteSaveElement.click(callback);
	}
}

// Controller
class NoteController {
	constructor(noteModel, noteView) {
		this.noteModel = noteModel;
		this.noteView = noteView;
		this.noteView.addNoteItemHandler(this.addNoteItem.bind(this));
		this.renderNoteList();
	}

	renderNoteList() {
		this.noteView.renderNoteList();
	}

	addNoteItem() {
		var noteContent = this.noteView.getNoteInputValue();
        this.noteModel.addNoteItem(null,datetime_now(),noteContent);
        this.renderNoteList();
        this.noteView.clearNoteInput();
	}
}

var noteModel = new NoteModel();
var noteView = new NoteView(noteModel);
var noteController = new NoteController(noteModel, noteView);

</script>
</body>
</html>