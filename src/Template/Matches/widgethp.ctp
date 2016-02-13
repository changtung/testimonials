<?php
header("Content-type: text/plain");
header("Content-Disposition: attachment; filename=homepage.txt");
?>
<link rel="stylesheet" property="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<style>
.hbox,.hbl,.hbr {
float: left;
}
.hbox {
width: 124px;
height: 50px;
background-color: #aaa;
color: #fff;
border-right: #ccc;
border: 2px solid #ddd;
}

.fin {
    background-color: #000;

}
.clear {
clear: both;
}
.tm {
    text-align: right;
    margin: 4px 0 0 1px;
    font-weight: bold;
}
.tbl {
    width: 44px;
    height: 26px;
    margin: 7px 6px 0 5px;
    padding: 9px 0 0 6px;
    border: 2px solid #ddd;
    background-color: #ccc;
}
.ar {
}
.commercial {
    width: 602px;
    height: 119px;
}
/* slider */
input[type="radio"] { display: none; }

input[type="radio"]:checked + section { display: block; }

body {
  font-family: 'Open Sans', sans-serif;
  font-weight: lighter;
}
.holder {
margin: 0 auto;
width: 602px;
height: 238px;
position: relative;
}
.container {
  position: absolute;
 /* left: 50%;
  margin-left: -200px;
  top: 50%;
  margin-top: -225px;*/
  width: 602px;
  height: 54px;
}

.container section {
  display: none;
  height: 100%;
  padding: 15px 15px 15px 45px;
  background: #449df5;
  color: #fff;
  text-align: center;
}

.container section h1 {
  margin-bottom: 0;
  font-family: 'Nunito', sans-serif;
  font-weight: lighter;
  font-size: 2em;
}

.container section p {
  width: 75%;
  margin: 0 auto;
  padding: 10px;
}

.container section label {
  position: absolute;
  display: inline-block;
  cursor: pointer;
  font-size: 1.5em;
  bottom: 0;
}

.container section label:nth-child(odd) { right: 8px; }

.container section label:nth-child(even) { left: 8px; }

.container section > i {
  font-size: 6em !important;
  margin-top: 50px;
  margin-bottom: 25px;
}
</style>

<div class="holder">
    <div class="commercial">
    </div>
    <div class="container" id="fbtick">
    </div>
</div>
<script type="text/javascript">
var xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET", 'http://itaxe.pl/clients/football/matches.json');
xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == XMLHttpRequest.DONE) {
        if(xmlhttp.status == 200){
            //console.log('Response: ' + xmlhttp.responseText );
            var res_matches = JSON.parse(xmlhttp.responseText).matches;


            var xmlhttp2=new XMLHttpRequest();
            xmlhttp2.open("GET", 'http://itaxe.pl/clients/football/players.json');
            xmlhttp2.onreadystatechange = function() {
                if (xmlhttp2.readyState == XMLHttpRequest.DONE) {
                    if(xmlhttp2.status == 200){
                        //console.log('Response: ' + xmlhttp2.responseText );
                        var res_players = JSON.parse(xmlhttp2.responseText).players;
                        //console.log('mp',res_matches,res_players);

                        var elements = [];
                        var count = 0;
                        var found = false;
                        for ( var i = res_matches.length -1 ; i >= 0 ; i--)
                        {
                            if ( count == 10 )
                                break;
                            found = false;
                            var team = null;
                            var match = null;
                            var added = true;
                            var hostteam;
                            var guestteam;
                            for ( var k = res_players.length -1 ; k >= 0 ; k-- )
                            {
                                    if ( added == false ){
                                        break;
                                    }
                                    if ( res_matches[i].id == res_players[k].match.id )
                                    {
                                        if ( ( team == null ) && ( match == null ) )
                                        {
                                            team = res_players[k].team;
                                            match = res_players[k].match;
                                        }
                                        else{
                                            if ( res_players[k].team.id != team.id  ){
                                                //different teams

                                                if ( team.host == true )
                                                    {
                                                        hostteam = team;
                                                        guestteam = res_players[k].team;
                                                    }
                                                    else
                                                    {
                                                        hostteam = res_players[k].team;
                                                        guestteam = team;
                                                    }
                                                //console.log('team goals',team.goals);
                                                if ( team.goals.length > 0 )
                                                    {
                                                        added = true;
                                                    }
                                                else{
                                                    //console.log('added = false');
                                                    added = false;
                                                    break;
                                                }

                                                //console.log('began match:h,g',match.id,hostteam.goals,guestteam.goals);
                                                found = true;
                                                count++;
                                                //add view
                                                var elem = "<div class=\"hbox fin\"><div class=\"hbl\"><div class=\"tm\">";
                                                elem += hostteam.clubname.substring(0,3)+"   "+hostteam.goals;
                                                elem += "</div><div class=\"tm\">";
                                                elem += guestteam.clubname.substring(0,3)+"   "+guestteam.goals;
                                                elem += "</div></div><div class=\"hbr\"><div class=\"tbl\">";
                                                elem += "Fin";
                                                elem += "</div></div></div>";
                                                elements.push(elem);
                                                break;

                                            }
                                        }
                                    }
                            }
                            //console.log('addeed',added);

                            if ( found == false )
                            {
                                //we have unbegan match

                            }//remove
                            if ( added == false ){
                                //nie ma goli a sa druzyny
                                count++;
                                //console.log('unbegan: ',res_matches[i].id)
                                var elem = "<div class=\"hbox\"><div class=\"hbl\"><div class=\"tm\">";
                                elem += hostteam.clubname.substring(0,3)+"   0";
                                elem += "</div><div class=\"tm\">";
                                elem += guestteam.clubname.substring(0,3)+"   0";
                                elem += "</div></div><div class=\"hbr\"><div class=\"tbl\">";
                                elem += match.matchdate.substring(11,16);
                                elem += "</div></div></div>";
                                elements.push(elem);
                            }
                        }
                        //fill gaps
                        for ( var i = elements.length ; i <= 9 ; i++ ){
                            var elem = "<div class=\"hbox\"><div class=\"hbl\"><div class=\"tm\">";
                            elem += "-";
                            elem += "</div><div class=\"tm\">";
                            elem += "-";
                            elem += "</div></div><div class=\"hbr\"><div class=\"tbl\">";
                            elem += "-";
                            elem += "</div></div></div>";
                            elements.push(elem);
                        }
                        var content = "";
                            for ( var i = 0 ; i < elements.length ; i++){
                                if ( i == 0){
                                    content += "<input id=\"rad1\" type=\"radio\" name=\"rad\" checked><section style=\"background: #000\">";
                                }
                                if ( i == 4){
                                    content += "<input id=\"rad2\" type=\"radio\" name=\"rad\"><section style=\"background: #000\">";
                                }
                                if ( i == 8){
                                    content += "<input id=\"rad3\" type=\"radio\" name=\"rad\"><section style=\"background: #000\">";
                                }
                                content += elements[i];
                                if ( i == 3){
                                    content += "<div class=\"clear\"></div><label for=\"rad3\"><i class=\"fa fa-chevron-left\"></i></label><label for=\"rad2\"><i class=\"fa fa-chevron-right\"></i></label></section>";
                                }
                                if ( i == 7){
                                    content += "<div class=\"clear\"></div><label for=\"rad1\"><i class=\"fa fa-chevron-left\"></i></label><label for=\"rad3\"><i class=\"fa fa-chevron-right\"></i></label></section>";
                                }
                                if ( i == 9){
                                    content += "<div class=\"clear\"></div><label for=\"rad2\"><i class=\"fa fa-chevron-left\"></i></label><label for=\"rad1\"><i class=\"fa fa-chevron-right\"></i></label></section>";
                                }

                                //console.log(elements[i]);
                            }
                            document.getElementById("fbtick").innerHTML = content;

                                    //    document.getElementById("hostname").innerHTML = res_match.match.name;
                                    // /    document.getElementById("hostscore").innerHTML = JSON.stringify(res_match)+JSON.stringify(res_t1)+JSON.stringify(res_t2);
                                }else{
                                    //console.log('Error: ' + xmlhttp2.statusText )
                                }
                            }
                        }
                        xmlhttp2.send({});

                    }else{
                        //console.log('Error: ' + xmlhttp.statusText )
                    }
                }
            }
            xmlhttp.send({});
            //render
</script>
