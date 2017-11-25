$(document).ready(function() {
  $('#pic').on('change', function() {
    const file = this.files? this.files[0] : null;
    if(!window.FileReader)
      return console.error('FileReader API is not supported by your browser.');
    if (file.type.match('image.*')) {
      const fr = new FileReader();
      fr.onload = function() {
        $("#img").attr("src", fr.result);
      };
      fr.readAsDataURL( file );
    }
  });

  $('#catalogId').on('change', function() {
    const v = $('#catalogId').val();
    if(v == 'other') {
      const other = '<input type="text" name="otherCat" id="otherCat" class="input" required>';
      $('#otherCat').html(other);
    }
    else {
      $('#otherCat').html("");
    }
  });

  $('#brandId').on('change', function() {
    const v = $('#brandId').val();
    if(v == 'other') {
      const other = '<input type="text" name="otherBrand" id="otherBrand" class="input" required>';
      $('#otherBrand').html(other);
    }
    else {
      $('#otherBrand').html("");
    }
  });
});