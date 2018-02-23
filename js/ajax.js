function mencari(keyword){
  $.ajax({
    url  : '../admin/pages/md/search.php?keyword='+keyword,
    // type : 'GET',
    // data : $("#keyword").val(),
    success : function(response){
      var $apalah = $(response);
      $("#btn-search").html("Cari").removeAttr("disabled");
      $("#view").html($apalah.html());
    },
    error : function (xhr, ajaxOptions, thrownError){
      alert(xhr.responseText);
    }
  });
}
$(document).ready(function(){
  $("#btn-search").click(
    function() {
      $(this).html("Mencari...").attr("disabled","disabled");
      mencari($("#keyword").val())
    }
  );
});
