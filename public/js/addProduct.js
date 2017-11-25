$(document).ready(function() {
  $('#catalogId').on('change', function() {
    const v = $('#catalogId').val();
    if(v == 'other') {
      const other = '<input type="text" name="otherCat" id="otherCat" class="input" required>';
      $('#otherCat').html(other);
    }
    else {
      $('#otherCat').html();
    }
  });

  $('#brandId').on('change', function() {
    const v = $('#brandId').val();
    if(v == 'other') {
      const other = '<input type="text" name="otherBrand" id="otherBrand" class="input" required>';
      $('#otherBrand').html(other);
    }
    else {
      $('#otherBrand').html();
    }
  });
});