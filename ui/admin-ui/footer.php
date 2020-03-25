<footer></footer>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->

<script>
// Get the modal
var modal = document.getElementById('view-order-accepted');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
/*var span = document.getElementsByClassName("close")[0];
*/
// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<script>
    var modal_vieworder_btn = document.getElementById("myModal");
   var mymodal = document.getElementById('view-order-btn'); 
   mymodal.onclick = function() {
  modal_vieworder_btn.style.display = "none";
}
    var modal_vieworder1 = document.getElementById("view-order-initial");
   var btn1 = document.getElementById('btn1'); 
   var btn2 = document.getElementById('btn2'); 
   btn1.onclick = function() {
  modal_vieworder1.style.display = "none";
}
btn2.onclick = function() {
  modal_vieworder1.style.display = "none";
}
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>  $(window).load(function(){        
   $('#myModal').modal('show');
    }); 
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<script>
    function showDropDelivery(){
        var element = document.getElementById('dropdown-content-delivery');
        if (element.style.display == 'none') {
            element.style.display = 'block';} else{element.style.display = 'none';}
    }
</script>


<script>
    $(document).ready(function() {
        $('img[src$=".svg"]').each(function() {
            var $img = jQuery(this);
            var imgURL = $img.attr('src');
            var attributes = $img.prop("attributes");

            $.get(imgURL, function(data) {
                // Get the SVG tag, ignore the rest
                var $svg = jQuery(data).find('svg');

                // Remove any invalid XML tags
                $svg = $svg.removeAttr('xmlns:a');

                // Loop through IMG attributes and apply on SVG
                $.each(attributes, function() {
                    $svg.attr(this.name, this.value);
                });

                // Replace IMG with SVG
                $img.replaceWith($svg);
            }, 'xml');
        });
    });
</script>

<script>
    function increaseValue() {
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('number').value = value;
    }

    function decreaseValue() {
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value < 1 ? value = 1 : '';
        value--;
        document.getElementById('number').value = value;
    }
</script>

</body>
</html>