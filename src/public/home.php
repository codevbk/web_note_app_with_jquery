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
$(document).on("click","#note_save",function() {
    var noteList = $('#note_list');
    var noteEditElement = $(this).parent().parent();
    var noteEditContent = $(noteEditElement).find('#note_edit_content');
    var noteID = $(noteEditElement).attr("data-id");
    if(noteID === ''){
        var noteClone = $(noteList).find(">:first-child").clone();
        $(noteClone).attr("style","display:block;");
        $(noteClone).attr("data-id", count);
        $(noteClone).find("#note_title").text(datetime_now());
        $(noteClone).find("#note_content").text($(noteEditContent).val());
        $(noteEditElement).attr("data-id","");
        $(noteEditElement).find("#note_edit_title").text("");
        $(noteEditContent).val("");
        $(noteList).append(noteClone);
        count++
    }else{
        var noteElement = $(noteList).find( "[data-id='"+noteID+"']" );
        $(noteElement).find("#note_title").text(datetime_now());
        $(noteElement).find("#note_content").text($(noteEditContent).val());
        $(noteEditElement).attr("data-id","");
        $(noteEditElement).find("#note_edit_title").text("");
        $(noteEditContent).val("");
        //console.log($(noteElement).html());
    }
    //console.log($(noteList).find(">:first-child").html());


});
$(document).on("click","#note_edit",function() {
    var noteList = $('#note_list');
    var noteEditContent = $('#note_edit_content');
    var noteEditElement = $(noteEditContent).parent().parent();
    var noteElement = $(this).parent().parent().parent();
    var noteElementID = $(noteElement).attr("data-id");
    var noteElementTitle = $(noteElement).find("#note_title").text();
    var noteElementContent = $(noteElement).find("#note_content").text();
    $(noteEditElement).attr("data-id", noteElementID);
    $(noteEditElement).find("#note_edit_title").text(noteElementTitle);
    $(noteEditElement).find("#note_edit_content").val(noteElementContent);
    //console.log(noteID);
});
$(document).on("click","#note_delete",function() {
    var noteList = $('#note_list');
    var noteElement = $(this).parent().parent().parent();
    var noteID = $(noteElement).attr("data-id");
    noteElement.remove();
    var noteEditContent = $('#note_edit_content');
    var noteEditElement = $(noteEditContent).parent().parent();
    $(noteEditElement).attr("data-id","");
    $(noteEditElement).find("#note_edit_title").text("");
    $(noteEditContent).val("");
    //console.log(noteID);
});

</script>
</body>
</html>