<?php
header("Content-type: text/plain");
header("Content-Disposition: attachment; filename=".$name.".txt");
?>
<style>
/*
Generic Styling, for Desktops/Laptops
*/
table {
  width: 100%;
  border-collapse: collapse;
}
/* Zebra striping */
tr:nth-of-type(odd) {
 /* background: #eee;*/
}
th {

  /*background: #333;
  color: white;*/
  font-weight: bold;
}
td, th {
border: none;
  padding: 6px;
  text-align: left;
}
tr.secondary {
  background: #ccc;
}
tr.secondary:nth-of-type(odd) {
  /*background: #aaa;*/
}
table.host {
float: left;width: 50%;
}
table.host tr td,table.host tr th {
text-align: right;
}
table.guest {
float: right;width: 50%;
}
.yellowcard{
    background-color:yellow;
}
.redcard {
    background-color:red;
}
.goal,.subs {
margin: 0 -1px 0 0;
font-weight: bold;
z-index: 3;
}
#hostscore,#guestscore {
margin: 0 5px 0 5px;
background-color: #000;
color: white;
width: 10px;
height: 7px;
font-weight: bold;
font-size: 1.2em;
}
.rating {
font-weight: bold;
}
</style>
<table class="host">
	<thead>
	<tr>
		<th><h2><div id="hostname"></div><b id="hostscore"></b></h2></th>
	</tr>
	</thead>
	<tbody id="hostbody">
    <tr class="formations">
		<td id="hostformation"></td>
	</tr>

	</tbody>
</table>
<table class="guest">
	<thead>
	<tr>
		<th><h2><div id="guestname"></div><b id="guestscore"></b></h2></th>
	</tr>
	</thead>
	<tbody id="guestbody">
	</tbody>
</table>
<script type="text/javascript">
var xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET", 'http://itaxe.pl/clients/football/matches/view/<?php echo $id; ?>.json');
xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == XMLHttpRequest.DONE) {
        if(xmlhttp.status == 200){
            //console.log('Response: ' + xmlhttp.responseText );
            var res_match = JSON.parse(xmlhttp.responseText);

            //find teams
            var count = 0;
            var t1,t2;
            for ( var i = 0 ; i < res_match.match.players.length ; i++ )
            {
                if ( count == 0 )
                    {
                        t1 = res_match.match.players[i].team_id;
                        count++;
                    }
                if ( count == 1 )
                    {
                        if ( t1 != res_match.match.players[i].team_id )
                        {
                            t2 = res_match.match.players[i].team_id;
                            count++;
                        }
                    }
                if ( count == 2 )
                    break;
            }


            var xmlhttp2=new XMLHttpRequest();
            xmlhttp2.open("GET", 'http://itaxe.pl/clients/football/teams/view/'+t1+'.json');
            xmlhttp2.onreadystatechange = function() {
                if (xmlhttp2.readyState == XMLHttpRequest.DONE) {
                    if(xmlhttp2.status == 200){
                        //console.log('Response: ' + xmlhttp2.responseText );
                        var res_t1 = JSON.parse(xmlhttp2.responseText);

                        var xmlhttp3=new XMLHttpRequest();
                        xmlhttp3.open("GET", 'http://itaxe.pl/clients/football/teams/view/'+t2+'.json');
                        xmlhttp3.onreadystatechange = function() {
                            if (xmlhttp3.readyState == XMLHttpRequest.DONE) {
                                if(xmlhttp3.status == 200){
                                    //console.log('Response: ' + xmlhttp3.responseText );
                                    var res_t2 = JSON.parse(xmlhttp3.responseText);

                                    //console.log('t1,t2',t1,t2);
                                    //console.log('rest_t1,rest_t2,res_match',res_t1,res_t2,res_match);


                                    //here we go having all data

                                    //1 determine which one is host
                                    if ( res_t1.team.host == true )
                                        {
                                            var hostteam = res_t1.team;
                                            var guestteam = res_t2.team;
                                        }
                                        else
                                        {
                                            var hostteam = res_t2.team;
                                            var guestteam = res_t1.team;
                                        }
                                    document.getElementById("hostname").innerHTML = hostteam.clubname;
                                    document.getElementById("guestname").innerHTML = guestteam.clubname;
                                    document.getElementById("hostscore").innerHTML = hostteam.goals;
                                    document.getElementById("guestscore").innerHTML = guestteam.goals;

                                    //document.getElementById("hostformation").innerHTML = hostteam.formation;
                                    //document.getElementById("guestformation").innerHTML = guestteam.formation;

                                    //heaaders set, then host players in primary squad

                                    var plists = "<tr class=\"formations\"><td id=\"hostformation\">"+hostteam.formation+"</td></tr>";


                                    for ( var k = 0 ; k < hostteam.players.length ; k++ )
                                    {

                                        if ( hostteam.players[k].primary_squad == true)
                                            {
                                                var player = "<tr class=\"players\"><td>";
                                                var stats = "";
                                                //substitution,assist,injuries,goals,rating
                                                if ( hostteam.players[k].substitution.length > 0 )
                                                    stats += "<span class=\"subs\">'"+hostteam.players[k].substitution+"</span><img height=\"13px\" src=\"http://itaxe.pl/clients/icons/subs_down.png\"></img>";
                                                if ( hostteam.players[k].assist.length > 0 )
                                                    stats += "<img height=\"13px\" src=\"http://itaxe.pl/clients/icons/assist.png\"></img>";
                                                if ( hostteam.players[k].injuries.length > 0 )
                                                    stats += "<img height=\"13px\" src=\"http://itaxe.pl/clients/icons/injury.png\"></img>";
                                                if ( hostteam.players[k].goals.length > 0 ){
                                                    var goals_arr = hostteam.players[k].goals.split(",");
                                                    var goal_time = "'"+hostteam.players[k].goals;
                                                    stats += "<span class=\"goal\">"+goals_arr.length+"</span><img height=\"13px;\" src=\"http://itaxe.pl/clients/icons/goal.png\"></img>"+goal_time;
                                                }
                                                if ( hostteam.players[k].penalty_failed.length > 0 ){
                                                    var goals_arr = hostteam.players[k].penalty_failed.split(",");
                                                    stats += "<span class=\"penalty_failed\">"+goals_arr.length+"</span><img height=\"13px;\" src=\"http://itaxe.pl/clients/icons/penalty_failed.png\"></img>";
                                                }
                                                if ( hostteam.players[k].penalty_keeped.length > 0 ){
                                                    var goals_arr = hostteam.players[k].penalty_keeped.split(",");
                                                    stats += "<span class=\"penalty_keeped\">"+goals_arr.length+"</span><img height=\"13px;\" src=\"http://itaxe.pl/clients/icons/penalty_keeped.png\"></img>";
                                                }
                                                if ( hostteam.players[k].rating.length > 0 )
                                                    stats += "<span class=\"rating\">("+hostteam.players[k].rating+")</span>";
                                                //red yellow cards
                                                if ( hostteam.players[k].squad_number.length == 1 )
                                                    if ( hostteam.players[k].yellow.length > 0 )
                                                    {
                                                        player += hostteam.players[k].name + stats +"  <span class=\"yellowcard\">" + hostteam.players[k].squad_number+"</span>";
                                                    }
                                                    else if ( hostteam.players[k].red.length > 0 ){
                                                        player += hostteam.players[k].name + stats +"  <span class=\"redcard\">" + hostteam.players[k].squad_number+"</span>";
                                                    }
                                                    else{
                                                        player += hostteam.players[k].name + stats +"  " + hostteam.players[k].squad_number;
                                                    }
                                                if ( hostteam.players[k].squad_number.length > 1 )
                                                    if ( hostteam.players[k].yellow.length > 0 )
                                                    {
                                                        player += hostteam.players[k].name + stats +" <span class=\"yellowcard\">" + hostteam.players[k].squad_number+"</span>";
                                                    }
                                                    else if ( hostteam.players[k].red.length > 0 ){
                                                        player += hostteam.players[k].name + stats +" <span class=\"redcard\">" + hostteam.players[k].squad_number+"</span>";
                                                    }
                                                    else{
                                                        player += hostteam.players[k].name + stats +" " + hostteam.players[k].squad_number;
                                                    }

                                                    player += "</td></tr>";
                                                    plists += player;
                                            }
                                    }
                                    for ( var k = 0 ; k < hostteam.players.length ; k++ )
                                    {

                                        if ( hostteam.players[k].primary_squad == false)
                                            {
                                                var player = "<tr class=\"secondary\"><td>";
                                                var stats = "";
                                                //substitution,assist,injuries,goals,rating
                                                if ( hostteam.players[k].substitution.length > 0 )
                                                    stats += "<span class=\"subs\">'"+hostteam.players[k].substitution+"</span><img height=\"13px\" src=\"http://itaxe.pl/clients/icons/subs_up.png\"></img>";
                                                if ( hostteam.players[k].assist.length > 0 )
                                                    stats += "<img height=\"13px\" src=\"http://itaxe.pl/clients/icons/assist.png\"></img>";
                                                if ( hostteam.players[k].injuries.length > 0 )
                                                    stats += "<img height=\"13px\" src=\"http://itaxe.pl/clients/icons/injury.png\"></img>";
                                                if ( hostteam.players[k].goals.length > 0 ){
                                                    var goals_arr = hostteam.players[k].goals.split(",");
                                                    var goal_time = "'"+hostteam.players[k].goals;
                                                    stats += "<span class=\"goal\">"+goals_arr.length+"</span><img height=\"13px;\" src=\"http://itaxe.pl/clients/icons/goal.png\"></img>"+goal_time;
                                                }
                                                if ( hostteam.players[k].penalty_failed.length > 0 ){
                                                    var goals_arr = hostteam.players[k].penalty_failed.split(",");
                                                    stats += "<span class=\"penalty_failed\">"+goals_arr.length+"</span><img height=\"13px;\" src=\"http://itaxe.pl/clients/icons/penalty_failed.png\"></img>";
                                                }
                                                if ( hostteam.players[k].penalty_keeped.length > 0 ){
                                                    var goals_arr = hostteam.players[k].penalty_keeped.split(",");
                                                    stats += "<span class=\"penalty_keeped\">"+goals_arr.length+"</span><img height=\"13px;\" src=\"http://itaxe.pl/clients/icons/penalty_keeped.png\"></img>";
                                                }
                                                if ( hostteam.players[k].rating.length > 0 )
                                                    stats += "<span class=\"rating\">("+hostteam.players[k].rating+")</span>";
                                                //red yellow cards
                                                if ( hostteam.players[k].squad_number.length == 1 )
                                                    if ( hostteam.players[k].yellow.length > 0 )
                                                    {
                                                        player += hostteam.players[k].name + stats +"  <span class=\"yellowcard\">" + hostteam.players[k].squad_number+"</span>";
                                                    }
                                                    else if ( hostteam.players[k].red.length > 0 ){
                                                        player += hostteam.players[k].name + stats +"  <span class=\"redcard\">" + hostteam.players[k].squad_number+"</span>";
                                                    }
                                                    else{
                                                        player += hostteam.players[k].name + stats +"  " + hostteam.players[k].squad_number;
                                                    }
                                                if ( hostteam.players[k].squad_number.length > 1 )
                                                    if ( hostteam.players[k].yellow.length > 0 )
                                                    {
                                                        player += hostteam.players[k].name + stats +" <span class=\"yellowcard\">" + hostteam.players[k].squad_number+"</span>";
                                                    }
                                                    else if ( hostteam.players[k].red.length > 0 ){
                                                        player += hostteam.players[k].name + stats +" <span class=\"redcard\">" + hostteam.players[k].squad_number+"</span>";
                                                    }
                                                    else{
                                                        player += hostteam.players[k].name + stats +" " + hostteam.players[k].squad_number;
                                                    }

                                                    player += "</td></tr>";
                                                    plists += player;
                                            }
                                    }
                                    document.getElementById("hostbody").innerHTML = plists;


                                    //guesst team the almost same

                                    var plists = "<tr class=\"formations\"><td id=\"guestformation\">"+guestteam.formation+"</td></tr>";


                                    for ( var k = 0 ; k < guestteam.players.length ; k++ )
                                    {

                                        if ( guestteam.players[k].primary_squad == true)
                                        {
                                        var player = "<tr class=\"players\"><td>";
                                        var stats = "";
                                        //substitution,assist,injuries,goals,rating
                                        if ( guestteam.players[k].substitution.length > 0 )
                                            stats += "<span class=\"subs\">'"+guestteam.players[k].substitution+"</span><img height=\"13px\" src=\"http://itaxe.pl/clients/icons/subs_down.png\"></img>";
                                        if ( guestteam.players[k].assist.length > 0 )
                                            stats += "<img height=\"13px\" src=\"http://itaxe.pl/clients/icons/assist.png\"></img>";
                                        if ( guestteam.players[k].injuries.length > 0 )
                                            stats += "<img height=\"13px\" src=\"http://itaxe.pl/clients/icons/injury.png\"></img>";
                                        if ( guestteam.players[k].goals.length > 0 ){
                                            var goals_arr = guestteam.players[k].goals.split(",");
                                            var goal_time = "'"+guestteam.players[k].goals;
                                            stats += "<span class=\"goal\">"+goals_arr.length+"</span><img height=\"13px;\" src=\"http://itaxe.pl/clients/icons/goal.png\"></img>"+goal_time;
                                        }
                                        if ( guestteam.players[k].penalty_failed.length > 0 ){
                                            var goals_arr = guestteam.players[k].penalty_failed.split(",");
                                            stats += "<span class=\"penalty_failed\">"+goals_arr.length+"</span><img height=\"13px;\" src=\"http://itaxe.pl/clients/icons/penalty_failed.png\"></img>";
                                        }
                                        if ( guestteam.players[k].penalty_keeped.length > 0 ){
                                            var goals_arr = guestteam.players[k].penalty_keeped.split(",");
                                            stats += "<span class=\"penalty_keeped\">"+goals_arr.length+"</span><img height=\"13px;\" src=\"http://itaxe.pl/clients/icons/penalty_keeped.png\"></img>";
                                        }
                                        if ( guestteam.players[k].rating.length > 0 )
                                            stats += "<span class=\"rating\">("+guestteam.players[k].rating+")</span>";
                                        //red yellow cards
                                        if ( guestteam.players[k].squad_number.length == 1 )
                                            if ( guestteam.players[k].yellow.length > 0 )
                                            {
                                                player += "<span class=\"yellowcard\">" + guestteam.players[k].squad_number+"</span>"+"  "+ guestteam.players[k].name + stats;;
                                            }
                                            else if ( guestteam.players[k].red.length > 0 ){
                                                player += "<span class=\"redcard\">" + guestteam.players[k].squad_number+"</span>"+"  "+ guestteam.players[k].name + stats;
                                            }
                                            else{
                                                player += guestteam.players[k].squad_number+ "  "+guestteam.players[k].name + stats;;
                                            }
                                        if ( guestteam.players[k].squad_number.length > 1 )
                                            if ( guestteam.players[k].yellow.length > 0 )
                                            {
                                                player += "<span class=\"yellowcard\">" + guestteam.players[k].squad_number+"</span>"+" "+ guestteam.players[k].name + stats;;
                                            }
                                            else if ( guestteam.players[k].red.length > 0 ){
                                                player += "<span class=\"redcard\">" + guestteam.players[k].squad_number+" </span>"+" "+ guestteam.players[k].name + stats;;
                                            }
                                            else{
                                                player += guestteam.players[k].squad_number+ " "+guestteam.players[k].name + stats;;
                                            }

                                            player += "</td></tr>";
                                            plists += player;
                                        }
                                    }
                                    for ( var k = 0 ; k < guestteam.players.length ; k++ )
                                    {

                                        if ( guestteam.players[k].primary_squad == false)
                                            {
                                                var player = "<tr class=\"secondary\"><td>";
                                                var stats = "";
                                                //substitution,assist,injuries,goals,rating
                                                if ( guestteam.players[k].substitution.length > 0 )
                                                    stats += "<span class=\"subs\">'"+guestteam.players[k].substitution+"</span><img height=\"13px\" src=\"http://itaxe.pl/clients/icons/subs_up.png\"></img>";
                                                if ( guestteam.players[k].assist.length > 0 )
                                                    stats += "<img height=\"13px\" src=\"http://itaxe.pl/clients/icons/assist.png\"></img>";
                                                if ( guestteam.players[k].injuries.length > 0 )
                                                    stats += "<img height=\"13px\" src=\"http://itaxe.pl/clients/icons/injury.png\"></img>";
                                                if ( guestteam.players[k].goals.length > 0 ){
                                                    var goals_arr = guestteam.players[k].goals.split(",");
    												var goal_time = "'"+guestteam.players[k].goals;
                                                    stats += "<span class=\"goal\">"+goals_arr.length+"</span><img height=\"13px;\" src=\"http://itaxe.pl/clients/icons/goal.png\"></img>"+goal_time;
                                                }
                                                if ( guestteam.players[k].penalty_failed.length > 0 ){
                                                    var goals_arr = guestteam.players[k].penalty_failed.split(",");
                                                    stats += "<span class=\"penalty_failed\">"+goals_arr.length+"</span><img height=\"13px;\" src=\"http://itaxe.pl/clients/icons/penalty_failed.png\"></img>";
                                                }
                                                if ( guestteam.players[k].penalty_keeped.length > 0 ){
                                                    var goals_arr = guestteam.players[k].penalty_keeped.split(",");
                                                    stats += "<span class=\"penalty_keeped\">"+goals_arr.length+"</span><img height=\"13px;\" src=\"http://itaxe.pl/clients/icons/penalty_keeped.png\"></img>";
                                                }
                                                if ( guestteam.players[k].rating.length > 0 )
                                                    stats += "<span class=\"rating\">("+guestteam.players[k].rating+")</span>";
                                                //red yellow cards
                                                if ( guestteam.players[k].squad_number.length == 1 )
                                                    if ( guestteam.players[k].yellow.length > 0 )
                                                    {
                                                        player += "<span class=\"yellowcard\">" + guestteam.players[k].squad_number+"</span>"+"  "+ guestteam.players[k].name + stats;;
                                                    }
                                                    else if ( guestteam.players[k].red.length > 0 ){
                                                        player += "<span class=\"redcard\">" + guestteam.players[k].squad_number+"</span>"+"  "+ guestteam.players[k].name + stats;;
                                                    }
                                                    else{
                                                        player += guestteam.players[k].squad_number+ "  "+guestteam.players[k].name + stats;;
                                                    }
                                                if ( guestteam.players[k].squad_number.length > 1 )
                                                    if ( guestteam.players[k].yellow.length > 0 )
                                                    {
                                                        player += "<span class=\"yellowcard\">" + guestteam.players[k].squad_number+"</span>"+" "+ guestteam.players[k].name + stats;;
                                                    }
                                                    else if ( guestteam.players[k].red.length > 0 ){
                                                        player += "<span class=\"redcard\">" + guestteam.players[k].squad_number+" </span>"+" "+ guestteam.players[k].name + stats;;
                                                    }
                                                    else{
                                                        player += guestteam.players[k].squad_number+ " "+guestteam.players[k].name + stats;;
                                                    }

                                                    player += "</td></tr>";
                                                    plists += player;
                                            }
                                    }
                                    document.getElementById("guestbody").innerHTML = plists;

                                    //    document.getElementById("hostname").innerHTML = res_match.match.name;
                                    // /    document.getElementById("hostscore").innerHTML = JSON.stringify(res_match)+JSON.stringify(res_t1)+JSON.stringify(res_t2);
                                }else{
                                    //console.log('Error: ' + xmlhttp2.statusText )
                                }
                            }
                        }
                        xmlhttp3.send({});

                    }else{
                        //console.log('Error: ' + xmlhttp2.statusText )
                    }
                }
            }
            xmlhttp2.send({});
            //render


        }else{
            //console.log('Error: ' + xmlhttp.statusText )
        }
    }
}
xmlhttp.send({});
</script>
