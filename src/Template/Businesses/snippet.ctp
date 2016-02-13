<?php
header("Content-type: text/plain");
header("Content-Disposition: attachment; filename=".$name.".txt");
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<div id="testi" class="container content">
</div>
<script type="text/javascript">
var xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET", 'http://itaxe.pl/clients/testimonial/businesses/view/<?php echo $id; ?>.json');
xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == XMLHttpRequest.DONE) {
        if(xmlhttp.status == 200){
            //console.log('Response: ' + xmlhttp.responseText );
            var business = JSON.parse(xmlhttp.responseText);
            var content = "";
            for ( var i = 0 ; i < business.business.testimonials.length ; i++ ){
                content += '<div class="row"><div class="col-md-6 col-md-offset-3"><div class="testimonials"><div class="active item"><blockquote><p>';
                content += business.business.testimonials[i].description;
                content += '</p></blockquote><div class="carousel-info"><div class="pull-left"><span class="testimonials-name">'+business.business.testimonials[i].client_name;
                content += '</span></div></div> </div> </div></div></div>';
            }
            document.getElementById("testi").innerHTML = content;
        }else{
            //console.log('Error: ' + xmlhttp.statusText )
        }
    }
}
xmlhttp.send({});
</script>
